<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonasProcesos;
use DB;
class PersonasProcesosController extends Controller
{
    private  $clientes,$contraparte;        

        public function __construct()
        {
            $this->middleware('auth');
            $this->clientes = DB::table('personas')->where('name','=','CLIENTE')->pluck('documento', 'id');        
            $this->contraparte = DB::table('personas')->where('name','=','CONTRAPARTE')->pluck('documento', 'id');
        }
    public function crear(Request $request)
    {
        $proceso=DB::table('procesos')->where('id','=',$request->ultimo_procesos)->first();
        if(isset($proceso))
        {
            //$contraparte = array_add($this->contraparte, 0,"Selecione una contraparte");
            $contraparte = array_add($this->contraparte, 0,"No selecionar una contraparte");
            //$clientes = array_add($this->clientes, 0,"Selecione una cliente");   
            $clientes = array_add($this->clientes, 0,"No selecionar una cliente");            
            return view('administrador.personasprocesos.nuevo_personasproceso',[
                'ultimo_procesos' =>$request->ultimo_procesos,
                'clientes'=> $this->clientes,             
                'contraparte' => $this->contraparte,
            ]); 
        }
        return redirect('/home')->with('warning','El proceso no coincide con nuestros registros');
           
    }
    public function guardar(Request $request)
    {

            $datos = $request->validate([
                'proceso' => 'required|numeric',
                'contraparte' => 'numeric',
                'cliente' => 'numeric',
            ]);
            if($request->rols1=='Demandante' &&  $request->rols=='Demandante')
            {
                return back()->with('warning', 'Solo un puede ser demandante');
            }
            if($request->rols1=='Demandado' &&  $request->rols=='Demandado')
            {
                return back()->with('warning', 'Solo un puede ser Demandado');
            }

            $Demandado = DB::table('personasprocesos')->where([
                                                                ['id','=',$request->proceso],
                                                                ['tipo','=', 'Demandado'],])->get();
            $Demandante = DB::table('personasprocesos')->where([
                                                                ['id','=',$request->proceso],
                                                                ['tipo','=', 'Demandante'],])->get();
            if($Demandado=='[]' || $Demandado==null){
                if($request->rols1=='Demandado' && $request->contraparte > 0 || $request->rols=='Demandado' && $request->cliente){
                      
                }else{
                    return back()->with('warning', 'No hay un demandado registrado, debe asignar uno');  
                }
            }
            if($Demandante=='[]' || $Demandante==null){
                if($request->rols1=='Demandante' && $request->contraparte > 0 || $request->rols=='Demandante' && $request->cliente){
                      
                }else{
                    return back()->with('warning', 'No hay un demandante registrado, debe asignar uno'); 
                }
            }


           

            if(isset($request->contraparte))
            {
                $personas_proceso = new PersonasProcesos;
                $personas_proceso->id_proceso = $request->proceso;
                $personas_proceso->id_persona = $request->contraparte;
                $personas_proceso->tipo = $request->rols1;
                $personas_en_proceso = DB::table('personasprocesos')
                ->where([
                    ['id_proceso', '=', $request->proceso],
                    ['id_persona', '=', $request->contraparte],
                        ])->get();
                if($personas_en_proceso=='[]' ){
                    $personas_proceso->save();   
                }else{                           
                    return back()->with('warning', 'La contra parte ya hasido registrada a este proceso' );      
                }                
            }
            if(isset($request->cliente))
            {
                $personas_proceso = new PersonasProcesos;
                $personas_proceso->id_proceso = $request->proceso;
                $personas_proceso->id_persona = $request->cliente;
                $personas_proceso->tipo = $request->rols;
                $personas_en_proceso = DB::table('personasprocesos')->where([['id_proceso','=',$request->proceso],['id_persona','=',$request->cliente],])->get();
                if($personas_en_proceso=='[]'){
                    $personas_proceso->save(); 
                    
                }else{
                    return back()->with('warning', 'El cliente ya hasido registrada a este proceso' );      
                }               
            }        
           
    
            if($personas_proceso){
                return back()->with('success', 'Las personas se han sido registrada con exito, puede seguir agredando personas!');
            }    
    }
}
