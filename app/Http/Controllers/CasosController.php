<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CasosController extends Controller
{

    public function __construct()
        {
            $this->middleware('auth');
            $this->clientes = DB::table('personas')->where('name','=','CLIENTE')->pluck('documento', 'id');        
            $this->contraparte = DB::table('personas')->where('name','=','CONTRAPARTE')->pluck('documento', 'id');
        }

    public function crear()
    {
        $clientes = array_add($this->clientes, 0,"No selecionar una cliente");
        return view('administrador.casos.nuevo_caso',['clientes'=> $this->clientes]);  
    }
    public function guardar(Request $request)
    {

    }
}
