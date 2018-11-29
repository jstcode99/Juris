<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cobros;
use DB;
class CobrosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function guardar(Request $request)
    {                                                                                                                       
        $cobro = new Cobros;
        switch($request->tipo_tarifa){
            case 'CUOTA FIJA SALARIAL':
                $request->validate([
                    'n_smlmv' => 'required|numeric',
                ]);
                $cobro->n_smlmv = $request->n_smlmv;            
                $cobro->tipo_tarifa = 'CUOTA FIJA SALARIAL';
            break;
            
            case 'CUOTA FIJA PORCENTUAL':
                $request->validate([
                    'porcentaje' => 'required|numeric',
                ]);
                $cobro->porcentaje1 = $request->porcentaje; 
                $cobro->tipo_tarifa = 'CUOTA FIJA PORCENTUAL';
            break;

            case 'CUOTA LITIS SALARIAL':
                $request->validate([
                    'n_smlmv' => 'required|numeric',
                ]);
                $cobro->n_smlmv = $request->n_smlmv; 
                $cobro->tipo_tarifa = 'CUOTA LITIS SALARIAL';
            break;

            case 'CUOTA LITIS PORCENTUAL':
                $request->validate([
                    'porcentaje' => 'required|numeric',
                ]);
                $cobro->porcentaje1 = $request->porcentaje; 
                $cobro->tipo_tarifa = 'CUOTA LITIS PORCENTUAL';
            break;

            case 'CUOTA MIXTA SALARIAL MAS PORCENTUAL':
                $request->validate([
                    'porcentaje' => 'required|numeric',
                    'n_smlmv' => 'required|numeric',
                ]);
                $cobro->porcentaje1 = $request->porcentaje; 
                $cobro->n_smlmv = $request->n_smlmv; 
                $cobro->tipo_tarifa = 'CUOTA MIXTA SALARIAL MAS PORCENTUAL';
            break;


            case 'CUOTA MIXTA SALARIAL POR RANGO':
                $request->validate([
                    'porcentaje1' => 'required|numeric',
                    'rango1' => 'required|numeric',
                    'n_smlmv' => 'required|numeric',
                ]);
                $cobro->porcentaje1 = $request->porcentaje1; 
                $cobro->porcentaje2 = $request->porcentaje2;
                $cobro->porcentaje3 = $request->porcentaje3;
                $cobro->porcentaje4 = $request->porcentaje4;
                $cobro->porcentaje5 = $request->porcentaje5;



                $cobro->rango1 = $request->rango1;
                $cobro->rango2 = $request->rango2;
                $cobro->rango3 = $request->rango3;
                $cobro->rango4 = $request->rango4;
                $cobro->rango5 = $request->rango5;

                $cobro->n_smlmv = $request->n_smlmv; 
                $cobro->tipo_tarifa = 'CUOTA MIXTA SALARIAL POR RANGO';

            break;



            case 'CUOTA MINIMA SALARIAl':
                $request->validate([
                    'n_smlmv' => 'required|numeric',
                ]);
                $cobro->n_smlmv = $request->n_smlmv;            
                $cobro->tipo_tarifa = 'CUOTA MINIMA SALARIAl';
            break;
            
            case 'CUOTA PLENA SALARIAL':
                $request->validate([
                    'n_smlmv' => 'required|numeric',
                ]);
                $cobro->n_smlmv = $request->n_smlmv;            
                $cobro->tipo_tarifa = 'CUOTA PLENA SALARIAL';
            break;

            case 'CUOTA PLENA PORCENTUAL':
                $request->validate([
                    'porcentaje' => 'required|numeric',
                ]);
                $cobro->porcentaje1 = $request->porcentaje; 
                $cobro->tipo_tarifa = 'CUOTA PLENA PORCENTUAL';
            break;
            default:
            break;
        }

        $cobro->save();

        if($cobro){
            return 'true';
        }
        
    }



    public function mostrar_cobro(Request $request)
    {
        $cobros = null;
        switch($request->id){
            case 'CUOTA FIJA SALARIAL':
                $cobros = DB::table('cobros')->where('tipo_tarifa','=', 'CUOTA FIJA SALARIAL')->get();      
            break;
            
            case 'CUOTA FIJA PORCENTUAL':
                $cobros = DB::table('cobros')->where('tipo_tarifa','=', 'CUOTA FIJA PORCENTUAL')->get();   
            break;

            case 'CUOTA LITIS SALARIAL':
                $cobros = DB::table('cobros')->where('tipo_tarifa','=', 'CUOTA LITIS SALARIAL')->get();   
            break;

            case 'CUOTA LITIS PORCENTUAL':
                $cobros = DB::table('cobros')->where('tipo_tarifa','=', 'CUOTA LITIS PORCENTUAL')->get();   
            break;


            case 'CUOTA MIXTA SALARIAL MAS PORCENTUAL':
                $cobros = DB::table('cobros')->where('tipo_tarifa','=', 'CUOTA MIXTA SALARIAL MAS PORCENTUAL')->get();   
            break;

            case 'CUOTA MIXTA SALARIAL POR RANGO':
                $cobros = DB::table('cobros')->where('tipo_tarifa','=', 'CUOTA MIXTA SALARIAL POR RANGO')->get();   
            break;

            case 'CUOTA MINIMA SALARIAL':
                $cobros = DB::table('cobros')->where('tipo_tarifa','=', 'CUOTA MINIMA SALARIAL')->get();   
            break;


            case 'CUOTA PLENA SALARIAL':
                $cobros = DB::table('cobros')->where('tipo_tarifa','=', 'CUOTA PLENA SALARIAL')->get();   
            break;


            case 'CUOTA PLENA PORCENTUAL':
                $cobros = DB::table('cobros')->where('tipo_tarifa','=', 'CUOTA PLENA PORCENTUAL')->get();   
            break;

            default:
            break;
        }
        return $cobros;
    }

    
    
}
