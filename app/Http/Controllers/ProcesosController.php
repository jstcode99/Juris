<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Procesos;
use DB;
class ProcesosController extends Controller
{
        private  $procesos,$productos,$instancias,$abogados,$clientes,$contraparte,
        $demandantes,$riesgo,$lugar,$dificultad,$estrato,$tiempo,$clasificacion,$cuantias;
        
        public function mostrar()
        {
            $procesos = DB::table('procesos')
            ->join('instancias','procesos.id_instancia','=','instancias.id')
            ->join('productos','procesos.id_producto','=','productos.id')
            ->select('procesos.*','instancias.nombre as instancia_nombre','productos.nombre as producto_nombre')->get();
            return view('administrador.procesos.listado_procesos', ['procesos' => $procesos]);
        }

        public function __construct()
        {
            $this->middleware('auth');
        
            $this->procesos = DB::table('procesos')->pluck('created_at', 'id');
            $this->productos = DB::table('productos')->pluck('nombre', 'id');
            $this->instancias = DB::table('instancias')->pluck('nombre', 'id');
            $this->abogados = DB::table('personas')->where('name','=','ABOGADO')->pluck('documento', 'id');
            
            $this->clientes = DB::table('personas')->where('name','=','CLIENTE')->pluck('documento', 'id');        
            $this->contraparte = DB::table('personas')->where('name','=','CONTRAPARTE')->pluck('documento', 'id');
            
            $this->riesgo = array(
                "" => "Selecione el nivel de riego",
                "Alto" => "Alto",
                "Medio" => "Medio",
                "Bajo" => "Bajo",
            );
    
            $this->lugar = array(
                "" => "Selecione un lugar",
                "Internacional" => "Internacional",
                "Nacional" => "Nacional",
                "Regional" => "Regional",
                "Departamental" => "Departamental",
                "Municipal" => "Municipal",
            );
            
            $this->dificultad = array(
                "" => "Selecione el nivel de dificultad",
                "Alto" => "Alto",
                "Medio" => "Medio",
                "Bajo" => "Bajo",
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
                "menor" => "Menor cuantia",
                "mayor" => "Mayor cuantia",
            );
        
        }
            
    public function crear()
    {        
        return view('administrador.procesos.nuevo_proceso',[
            'productos'=> $this->productos,
            'riesgo'=> $this->riesgo,
            'lugar'=> $this->lugar,
            'dificultad'=> $this->dificultad,
            'estrato'=> $this->estrato,
            'tiempo'=> $this->tiempo,            
            'instancias'=> $this->instancias,
            'procesos' => $this->procesos,
            'clasificacion' => $this->clasificacion,
            'cuantias' => $this->cuantias,
            
        ]);
    }

    public function guardar(Request $request)
    {
        
        $datos = $request->validate([
            'producto'=> 'required|numeric',
            'riesgo'=> 'required|string',
            'lugar'=> 'required|string',
            'dificultad'=> 'required|string',
            'estrato'=> 'required|numeric',
            'tiempo'=> 'required|',            
            'instancia'=> 'required|numeric',                                   
            'clase' => 'required|string',                     
            'numero_asignado' => 'required|numeric|unique:procesos',
            'fecha_presentacion' => 'required|',
            'cuantia'=> 'required|',
        ]);
        $proceso = new procesos; 
        $proceso->numero_asignado = $request->numero_asignado;
        $proceso->estado = 'ACTIVO';
        $proceso->fecha_inicio = date("Y-m-d H:i:s");
        $proceso->tiempo = $request->tiempo;
        $proceso->id_instancia = $request->instancia;
        $proceso->id_producto = $request->producto;
        $proceso->riesgo = $request->riesgo;
        $proceso->lugar = $request->lugar;       
        $proceso->cuantia = $request->cuantia;       
        if($request->rol=='on'){
            $proceso->rol = 'Demandado';
        }
        if(empty($request->rol)){
            $proceso->rol = 'Demandante';
        }
        $proceso->clase = $request->clase;
        $proceso->dificultad = $request->dificultad;
        $proceso->estrato = $request->estrato;
        $proceso->fecha_presentacion = $request->fecha_presentacion;        
        $proceso->save();
        $ultimo_procesos=DB::table('procesos')->orderByRaw('created_at desc')->pluck('id')->first();            
       
        if($proceso){
            return redirect()->route('crear_personasproceso', [
                'ultimo_procesos' =>$ultimo_procesos,
            ]);                            
        }                  
    }

    public function mostrar_proceso($id)
    {
        $proceso = procesos::find($id);
        if($proceso)
        {           
            return view('administrador.procesos.mostrar_proceso',
            [   'productos'=> $this->productos,
                'riesgo'=> $this->riesgo,
                'lugar'=> $this->lugar,
                'dificultad'=> $this->dificultad,
                'estrato'=> $this->estrato,
                'tiempo'=> $this->tiempo,            
                'instancias'=> $this->instancias,
                'procesos' => $this->procesos,
                'clasificacion' => $this->clasificacion,
                'cuantias' => $this->cuantias,
                'proceso' => $proceso,
            ]);
        }
        return redirect('Administrador/Procesos/Procesos-Registradss')->with('warning', 'La proceso seleccionado no es valida o no existe!');
    }
    public function ver_proceso($id){
        $proceso = procesos::find($id);
        if($proceso)
        {          
            $proceso = DB::table('procesos')
            ->join('instancias','procesos.id_instancia','=','instancias.id')
            ->join('productos','procesos.id_producto','=','productos.id')->where('procesos.id','=',$id)
            ->select('procesos.*','instancias.nombre as instancia_nombre','productos.nombre as producto_nombre')->get();
           
            $personasproceso = DB::table('procesos')->where('procesos.id','=',$id)
            ->join('personasprocesos','procesos.id','=','personasprocesos.id_proceso')
            ->join('personas','personas.id','=','personasprocesos.id_persona')
            ->select('personas.*','personasprocesos.tipo as tipo')->get();
           // return $proceso;
           
            
            return view('administrador.procesos.ver_proceso',[
                'proceso'=> $proceso,
                'personasproceso' => $personasproceso
            ]);            
        }
        return redirect('Administrador/Procesos/Procesos-Registradss')->with('warning', 'La proceso seleccionado no es valida o no existe!');
    }
}
