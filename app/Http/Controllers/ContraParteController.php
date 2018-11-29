<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContraParte;
class ContraParteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crear()
    {
        return  view('administrador.contraparte.nueva_contra_parte');
    }

    public function guardar(Request $request)
    { 
       
        $datos = $request->validate([             
            'estrato' => 'required',
            'direccion' => 'required|string|max:100|min:10',
            'telefono' => 'required|string|min:6',
            'email' => 'required|email|unique:personas|string|max:255',
        ]);

        $contraparte = new ContraParte;  
        if($request->TipoPersona=='Persona')
        {
            $datos = $request->validate([       
            'tipo_documento' => 'required|string|max:100',
            'documento' => 'required|unique:personas|max:20',
            'primer_nombre' => 'required|string|max:100', 
            'segundo_nombre' => 'required|string|max:100',
            'primer_apellido' => 'required|string|max:100',
            'segundo_apellido' => 'required|string|max:100',
            ]);

            $contraparte->tipo_documento = $request->tipo_documento;
            $contraparte->documento = $request->documento;
            $contraparte->primer_nombre = strtoupper($request->primer_nombre);
            $contraparte->segundo_nombre = strtoupper($request->segundo_nombre);
            $contraparte->primer_apellido = strtoupper($request->primer_apellido);
            $contraparte->segundo_apellido = strtoupper($request->segundo_apellido);
        }else
        {
            $datos = $request->validate([       
            'nit' => 'required|string|max:20',
            'nombre' => 'required|unique:personas|max:200',
            ]);
            $contraparte->tipo_documento = 'Nit';
            $contraparte->documento = $request->nit;
            $contraparte->primer_nombre = strtoupper($request->nombre);
        }                     
        $contraparte->estado = 'ACTIVO';
        $contraparte->estrato = $request->estrato;
        $contraparte->direccion = strtoupper($request->direccion);
        $contraparte->telefono = $request->telefono;
        $contraparte->name = 'CONTRAPARTE';
        $contraparte->email = $request->email;       
        $contraparte->save();

        if($contraparte){
            return back()->with('success', 'La contra parte ha sido registrada con exito!');
        }
    }
}
