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
        $caso = new Casos;
        if($request->cliente == '' || $request->cliente == null || $request->cliente == 0)
        {
            return back()->with('warning', 'Debe selecionar un cliente');
        }
        $datos = $request->validate([
            'descripcion' => 'required|string|max:750', 
        ]);    
        if($request->etapas=='on')
        {
            $datos = $request->validate([                
                'categoria' => 'required|numeric', 
                'estrato' => 'required|numeric', 
                'cuantia' => 'required|string|max:100', 
                'audio' => 'required',
            ]);
            $caso->etapa = 'Pre-contractual';
            $caso->estado = 'ACTIVO';
            
            $caso->descripcion1 = $request->descripcion;         
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
        ->select('casos.*','personas.*','categorias.*')->get();
        return view('administrador.casos.listado_casos', ['casos' => $casos]);        
       // return $casos;
    }

    public function mostrar_caso($id)
    {         
        $caso = casos::find($id);  
        if(isset($caso))
        {
            return view('administrador.casos.mostrar_caso',['caso' => $caso]);              
        }else{
            return redirect('/Casos/Casos-Registrados')->with('warning', 'Debe seleccionar un caso de la lista de casos');
        }      
        
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
