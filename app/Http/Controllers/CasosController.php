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
            $this->categorias = DB::table('categorias')->pluck('nombre', 'id');
            $this->especialidades = DB::table('especialidades')->pluck('nombre', 'id');
            $this->clientes = DB::table('personas')->where('name','=','CLIENTE')->pluck('documento', 'id');        
            $this->contraparte = DB::table('personas')->where('name','=','CONTRAPARTE')->pluck('documento', 'id');
            $this->instancias = DB::table('instancias')->pluck('nombre', 'id');
            $this->procesos = DB::table('procesos')->pluck('created_at', 'id');
            $this->productos = DB::table('productos')->pluck('nombre', 'id');
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
        $clientes = array_add($this->clientes, 0,"Selecionar una cliente");
        $categorias = array_add($this->categorias,0,"Selecione una categoria");
        return view('administrador.casos.nuevo_caso',[
            'clientes'=> $this->clientes,
            'estrato'=> $this->estrato,
            'cuantias' => $this->cuantias,
            'categorias' => $this->categorias,
            ]);  
    }
    public function guardar(Request $request)
    {         
        $parrafos=self::dividir_parrafo($request->descripcion); 
        return $parrafos;                 
        
        
        $caso = new Casos;
        if($request->cliente == '' || $request->cliente == null || $request->cliente == 0)
        {
            return back()->with('warning', 'Debe selecionar un cliente');
        }
        $datos = $request->validate([
            'descripcion' => 'required|string|max:770|min:255', 
            'audio' => 'required|max:20000',
        ]);    
        if($request->etapas=='on')
        {
            $datos = $request->validate([                
                'categoria' => 'required|numeric', 
                'estrato' => 'required|numeric', 
                'cuantia' => 'required|string|max:100', 
                
            ]);
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
                if(isset($parrafos[3]))
                {
                    $caso->descripcion3 = $parrafos[3];
                }
            }      
            $caso->estrato = $request->estrato;     
            $caso->cuantia = $request->cuantia;
            $caso->id_persona = $request->cliente;
            $caso->id_categoria = $request->categoria;
            $url_audio = $request->file('audio')->store('public/audios_casos/');
            $caso->url_audio = $url_audio;

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
        ->select('casos.*','personas.documento','categorias.nombre as categoria')->get();
       
        //return $casos;
        return view('administrador.casos.listado_casos', ['casos' => $casos]);        
       
    }

    public function mostrar_caso($id)
    {         

        $caso = DB::table('casos')
        ->join('personas','casos.id_persona','=','personas.id')        
        ->join('categorias','casos.id_categoria','=','categorias.id')
        ->where('casos.id','=',$id)
        ->select('casos.*','personas.*','categorias.*')->get();
        $clientes = array_add($this->clientes, 0,"Selecionar una cliente");        
        $categorias = array_add($this->categorias,0,"Selecione una categoria");

        if(isset($caso) && $caso != '[]')
        {
            //return $caso;
            return view('administrador.casos.mostrar_caso',[
                'caso' => $caso,
                'clientes'=> $this->clientes,
                'estrato'=> $this->estrato,
                'cuantias' => $this->cuantias,
                'categorias' => $this->categorias,
                ]);              
        }else{
            return redirect('/Casos/Casos-Registrados')->with('warning', 'Debe seleccionar un caso de la lista de casos');
        }      
        
    }
    public function ver_caso($id){

        //return $caso;
        //return view('administrador.casos.ver_caso');

        $caso = DB::table('casos')
        ->join('personas','casos.id_persona','=','personas.id')        
        ->join('categorias','casos.id_categoria','=','categorias.id')
        ->where('casos.id','=',$id)
        ->select('casos.*','personas.*','categorias.*')->get();
        $clientes = array_add($this->clientes, 0,"Selecionar una cliente");        
        $categorias = array_add($this->categorias,0,"Selecione una categoria");

        if(isset($caso) && $caso != '[]')
        {
            //return $caso;
            return view('administrador.casos.ver_caso',[
                'caso' => $caso,
                'clientes'=> $this->clientes,
                'estrato'=> $this->estrato,
                'cuantias' => $this->cuantias,
                'categorias' => $this->categorias,
                ]);              
        }else{
            return redirect('/Casos/Casos-Registrados')->with('warning', 'Debe seleccionar un caso de la lista de casos');
        }  
    }
    public function abrir_caso(Request $request, $id)
    {
        $caso = Casos::find($id);   
        $datos = $request->validate([                
            'descripcion_s' => 'string|max:750',  
            'descripcion_a' => 'string|max:750',  
            'audio_s' => 'required|max:20000',
            'audio_a' => 'required|max:20000',
            
        ]);

        //return $caso;
               
        if(iconv_strlen($request->descripcion1_a,'UTF-8') < 255){
            $caso->descripcion1_a = $request->descripcion1_a; 
        }else{
            $parrafos=self::dividir_parrafo($request->descripcion1_a); 
            $caso->descripcion1_a = $parrafos[0];
            if(isset($parrafos[1]))
            {
                $caso->descripcion2_a = $parrafos[1];
            }
            if(isset($parrafos[3]))
            {
                $caso->descripcion3_a = $parrafos[3];
            }
        }       
        $url_audio_a = $request->file('audio_a')->store('public/audios_casos/');
        $caso->url_audio_a = $url_audio_a;


        if(iconv_strlen($request->descripcion1_s,'UTF-8') < 255){
            $caso->descripcion1_s = $request->descripcion1_s; 
        }else{
            $parrafos=self::dividir_parrafo($request->descripcion1_s); 
            $caso->descripcion1_s = $parrafos[0];
            if(isset($parrafos[1]))
            {
                $caso->descripcion2_s = $parrafos[1];
            }
            if(isset($parrafos[3]))
            {
                $caso->descripcion3_s = $parrafos[3];
            }
        } 
        $caso->descripcion1_s = $request->descripcion1_s;
        $url_audio_s = $request->file('audio_s')->store('public/audios_casos/');
        $caso->ulr_audio_s = $url_audio_s;

        $caso->save();
        if($caso){
            $caso = DB::table('casos')->orderby('created_at','DESC')->get();
            return redirect('/Casos/Casos-Registrados')->with('success', 'El caso fue modificado correctamente, caso #'.$caso[0]->id);
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
