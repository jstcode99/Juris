<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;
use App\Casos;
use Illuminate\Support\Facades\Redirect;
class CasosController extends Controller
{
    

    private  $procesos,$productos,$instancias,$abogados,$clientes,$contraparte,
        $demandantes,$riesgo,$lugar,$dificultad,$estrato,$tiempo,$clasificacion,
        $cuantias,$especialidades,$categorias;

    public function __construct()
        {
            $this->middleware('auth');
            
            $this->especialidades = DB::table('especialidades')->pluck('nombre', 'id');
            $this->clientes = DB::table('personas')->where('name','=','CLIENTE')->select(DB::raw("id,CONCAT(tipo_documento,': ',documento, ' - ', primer_nombre) as identidad"))->get()->pluck('identidad','id');       
            $this->contraparte = DB::table('personas')->where('name','=','CONTRAPARTE')->pluck('documento', 'id');
            $this->instancias = DB::table('instancias')->pluck('nombre', 'id');
            $this->procesos = DB::table('procesos')->pluck('created_at', 'id');
            $this->productos = DB::table('productos')->pluck('nombre', 'id');
            $this->ramas = array(
                "" => "Selecione una rama",
                "PENAL" => "PENAL",
                "ADMINISTRATIVA" => "ADMINISTRATIVA",           
            );
            $this->categorias = array(
                null => "Selecione una categoria",     
            );
            $this->estrato = array(
                "" => "Selecione un estrato",
                "1" => "1",
                "2" => "2",
                "3" => "3",
                "4" => "4",
                "5" => "5",
                "6" => "6",
                "7" => "7",            
            );
    
            $this->tiempo = array(
                "" => "Selecione el nivel de dificultad",
                "Firma de poder" => "Firma de poder",
                "Tramites" => "Tramites",
                "Terminación" => "Terminación",
            );
            
    
            $this->clasificacion = array(
                "" => "Selecione una clasificación",
                "Ordinario" => "Ordinario",
            );

            $this->cuantias = array(
                "" => "Selecione una cuantia",
                "sin cuantia" => "Sin cuantia",
                "menor" => "Menor cuantia",
                "mayor" => "Mayor cuantia",
            );
        }
    public function Reporte_casos()
    {
        
    }

    public function crear()
    {        
        return view('administrador.casos.nuevo_caso',[
            'clientes'=> $this->clientes,        
            'cuantias' => $this->cuantias,            
            ]);  
    }
    public function guardar(Request $request)
    {                               
        $caso = new Casos;
        if($request->cliente == '' || $request->cliente == null || $request->cliente == 0)
        {
            return back()->with('warning', 'Debe selecionar un cliente');
        }
        if($request->audio == null && $request->audio == '' && $request->descripcion == null && $request->descripcion == '')
        {
            return back()->with('warning', 'Debe ingresar un audio o una descripcion');
        }
        if( $request->descripcion == null || $request->descripcion == '')
        {
            $datos = $request->validate([
                'audio' => 'required|max:20000',
            ]); 
            $url_audio = $request->file('audio')->store('public/audios_casos/');
            $caso->url_audio = $url_audio;
        }
        if( $request->audio == null || $request->audio == '')
        {
            $datos = $request->validate([
                'descripcion' => 'required|string|max:770|min:255', 
            ]); 
        }        
        $datos = $request->validate([
            'cuantia' => 'required', 
        ]);  
        if($request->etapas=='on')
        {
            $caso->etapa = 'Pre-contractual';
            $caso->estado = 'ACTIVO';     
            //return iconv_strlen($request->descripcion);       
            if(iconv_strlen($request->descripcion,'UTF-8') < 255){
                $caso->descripcion1 = $request->descripcion;
            }else{
                $parrafos=self::dividir_parrafo($request->descripcion); 
                    $caso->descripcion1 = $parrafos[0];
                if(isset($parrafos[1]))
                {
                    $caso->descripcion2 = $parrafos[1];
                }
                if(isset($parrafos[2]))
                {
                    $caso->descripcion3 = $parrafos[2];
                }
            }      
            $caso->cuantia = $request->cuantia; 
            $caso->id_persona = $request->cliente;            
            $caso->save();
            if($caso){
                $caso = DB::table('casos')->orderby('created_at','DESC')->get();
                return back()->with('super_success', 'El caso ha sido registrado con exito, Codigo de caso es: '.$caso[0]->id);
            }
        }else {
            $caso->etapa = 'Contractual';
        }   
                                                 
    }

    public function mostrar()
    {
        $casos = DB::table('casos')
        ->join('personas','casos.id_persona','=','personas.id')
        ->join('categorias','casos.id_categoria','=','categorias.id')
        ->select('casos.*','personas.documento','categorias.nombre as categoria');
       
        $casos2 = DB::table('casos')
        ->join('personas','casos.id_persona','=','personas.id')
        ->select('casos.*','personas.documento','casos.id_categoria as categoria')
        ->where('casos.id_categoria' ,'=', null)->union($casos)
        ->get();
        return view('administrador.casos.listado_casos', ['casos' => $casos2]);        
       
    }

    public function mostrar_caso($id)
    {         

    
        $caso = DB::table('casos')
        ->join('personas','casos.id_persona','=','personas.id')        
        ->select('casos.*',
                 'personas.documento','personas.tipo_documento','personas.primer_nombre',
                 'personas.segundo_nombre','personas.primer_apellido','personas.segundo_apellido',
                 'personas.telefono','personas.direccion')->where('casos.id','=',$id)->get();
                // return $caso;
                    
        $clientes = array_add($this->clientes, 0,"Selecionar una cliente");        
        $categorias = array_add($this->categorias,0,"Selecione una categoria");

        if(isset($caso[0]->descripcion1_a))
        {
            return redirect('Administrador/Casos/Casos-Registrados')->with('warning', 'El caso ya fue modificado, caso #'.$caso[0]->id);
        }
        if(isset($caso) || $caso != '[]')
        {
            //return $caso;
            return view('administrador.casos.mostrar_caso',[
                'caso' => $caso,
                'clientes'=> $this->clientes,
                'estrato'=> $this->estrato,
                'cuantias' => $this->cuantias,
                'categorias' => $this->categorias,                
                'ramas' => $this->ramas ,
                ]);              
        }else{
            return redirect('Administrador/Casos/Casos-Registrados')->with('warning', 'Debe seleccionar un caso de la lista de casos');
        }      
        
    }
    public function ver_caso($id){

        
        //return view('administrador.casos.ver_caso');
        
            $caso = DB::table('casos')
            ->join('personas','casos.id_persona','=','personas.id')        
            ->join('categorias','casos.id_categoria','=','categorias.id')
            ->where('casos.id','=',$id)
            ->select('casos.*','personas.*','categorias.*')->get();
            $clientes = array_add($this->clientes, 0,"Selecionar una cliente");        
            $categorias = array_add($this->categorias,0,"Selecione una categoria");        
        if(isset($caso[0]->id_categoria))
        {
                
                return view('administrador.casos.ver_caso',[
                    'caso' => $caso,
                    'clientes'=> $this->clientes,
                    'estrato'=> $this->estrato,
                    'cuantias' => $this->cuantias,
                    'categorias' => $this->categorias,
                    ]); 
        }else{
            
            $caso = DB::table('casos')
            ->join('personas','casos.id_persona','=','personas.id')        
            ->select('casos.*',
                     'personas.documento','personas.tipo_documento','personas.primer_nombre',
                     'personas.segundo_nombre','personas.primer_apellido','personas.segundo_apellido',
                     'personas.telefono','personas.direccion')->where('casos.id','=',$id)->get();
                     return 'el caso 2: '.$caso;
                     return view('administrador.casos.ver_caso',[
                        'caso' => $caso,
                        'clientes'=> $this->clientes,
                        'estrato'=> $this->estrato,
                        'cuantias' => $this->cuantias,
                        'categorias' => $this->categorias,
                        ])
                        ->with('warning', 'El caso no se ha abierto');
        }
        if(isset($caso) && $caso != '[]')
        {                         
        }else{
            return redirect('Administrador/Casos/Casos-Registrados')->with('warning', 'Debe seleccionar un caso de la lista de casos');
        }  
    }
    public function abrir_caso(Request $request, $id)
    {
        $caso = Casos::find($id);   
        
        if($request->audio_s == null && $request->audio_s == '' && $request->descripcion_s == null && $request->descripcion_s == '')
        {
            $datos = $request->validate([
                'audio_s' => 'required|max:20000',
            ]); 
        }
        if( $request->descripcion_s == null || $request->descripcion_s == '')
        {
            $datos = $request->validate([
                'audio_s' => 'required|max:20000',
            ]); 
            $url_audio_s = $request->file('audio_s')->store('public/audios_casos/');
            $caso->ulr_audio_s = $url_audio_s;
        }
        if( $request->audio_s == null || $request->audio_s == '')
        {
            $datos = $request->validate([
                'descripcion_s' => 'required|string|max:770|min:255', 
            ]); 

            if(iconv_strlen($request->descripcion_s,'UTF-8') < 255){
                $caso->descripcion1_s = $request->descripcion_s; 
            }else{
                $parrafos=self::dividir_parrafo($request->descripcion_s); 
                $caso->descripcion1_s = $parrafos[0];
                if(isset($parrafos[1]))
                {
                    $caso->descripcion2_s = $parrafos[1];
                }
                if(isset($parrafos[2]))
                {
                    $caso->descripcion3_s = $parrafos[2];
                }
            } 
        }       

        /**** --------------------------------------------------------------------------------------------------------------  ****/

        if($request->audio_a == null && $request->audio_a == '' && $request->descripcion_a == null && $request->descripcion_a == '')
        {
            $datos = $request->validate([
                'audio_a' => 'required|max:20000',
            ]); 
        }
        if( $request->descripcion_a == null || $request->descripcion_a == '')
        {
            $datos = $request->validate([
                'audio_a' => 'required|max:20000',
            ]); 
            $url_audio_a = $request->file('audio_a')->store('public/audios_casos/');
            $caso->url_audio_a = $url_audio_a;
            
        }
        if( $request->audio_a == null || $request->audio_a == '')
        {
            $datos = $request->validate([
                'descripcion_a' => 'required|string|max:770|min:255', 
            ]); 
            if(iconv_strlen($request->descripcion_a,'UTF-8') < 255){
                $caso->descripcion1_a = $request->descripcion_a; 
            }else{
                $parrafos=self::dividir_parrafo($request->descripcion_a); 
               
                $caso->descripcion1_a = $parrafos[0];
                if(isset($parrafos[1]))
                {
                    $caso->descripcion2_a = $parrafos[1];
                }
                if(isset($parrafos[2]))
                {
                    $caso->descripcion3_a = $parrafos[2];
                }
            }   
        } 

        $datos = $request->validate([
            'categoria' => 'required|max:20000',
        ]);
        $caso->id_categoria = $request->categoria;
    
        $caso->save();
        if($caso){
            $caso = DB::table('casos')->orderby('created_at','DESC')->get();
            return redirect('Administrador/Casos/Casos-Registrados')->with('success', 'El caso fue modificado correctamente, caso #'.$caso[0]->id);
        }
    }

    public function dividir_parrafo($parrafo)
    {
            $lenght=0;
            $parrafos = array();
            $lenght = iconv_strlen($parrafo,'UTF-8');
           // return $lenght;
            if($lenght > 255){        
                $parrafos[0] = substr($parrafo, 0, 255);
                $parrafo = substr_replace($parrafo,null,0, 255);
                for($i=1;$i<3;$i++){
                    $lenght = iconv_strlen($parrafo,'UTF-8');
                    if($lenght > 255){
                        $parrafos[$i] = substr($parrafo,0, 255);
                        $parrafo = substr_replace($parrafo,null,0, 255);
                    }else{
                        if($lenght > 0){
                        $lenght = iconv_strlen($parrafo,'UTF-8');
                        $parrafos[$i] = substr($parrafo,0, $lenght);
                        $i=100;
                        }
                    }
                }
                
            }
            return $parrafos;
    }

    
    public function Proceso1($n_smlmv, $smlmv)
    {
        return $n_smlmv * $smlmv;
    }

    public function Proceso2($porcentaje1, $smlmv)
    {
        return $n_smlmv * $smlmv;
    }
}
