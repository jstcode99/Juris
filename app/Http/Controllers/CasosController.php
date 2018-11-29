<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CasosController extends Controller
{
    private  $procesos,$productos,$instancias,$abogados,$clientes,$contraparte,
        $demandantes,$riesgo,$lugar,$dificultad,$estrato,$tiempo,$clasificacion,$cuantias;

    public function __construct()
        {
            $this->middleware('auth');
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

    public function crear()
    {
        $clientes = array_add($this->clientes, 0,"No selecionar una cliente");
        return view('administrador.casos.nuevo_caso',[
            'clientes'=> $this->clientes,
            'estrato'=> $this->estrato,
            'tiempo'=> $this->tiempo,            
            'instancias'=> $this->instancias,
            'procesos' => $this->procesos,
            'clasificacion' => $this->clasificacion,
            'cuantias' => $this->cuantias,
            'productos'=> $this->productos,
            ]);  
    }
    public function guardar(Request $request)
    {

    }
}