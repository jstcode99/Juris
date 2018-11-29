<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instancias;
use Illuminate\Support\Facades\DB;
use Dotenv\Validator;


class InstanciasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function crear()
    {
        $instancias = DB::table('instancias')->get();

        return view('administrador.instancias.nueva_instancia', ['instancias' => $instancias]);
    }
    public function guardar(Request $request)
    {
            $request->validate([
                'nombre' => 'required|unique:instancias|string|max:50',
                'porcentaje' => 'required|numeric|max:100',
                'tipo' => 'required',
            ]);
            $instancia = new Instancias;

            $instancia->tipo = $request->tipo;
            $instancia->porcentaje = $request->porcentaje;
            $instancia->nombre = $request->nombre;    
            $instancia->save();
    
            if($instancia){
                return back()->with('success', 'La instancia ha sido registrada con exito!');
            }    
    }
    public function mostrar()
    {
        $instancias = DB::table('instancias')->get();
        return view('administrador.instancias.nueva_instancia', ['instancias' => $instancias]);
        
    }
    public function mostrar_instancia($id)
    {
        $instancia=Instancias::find($id);
        if($instancia)
        {            
            return view('administrador.instancias.mostrar_instancia', ['instancia' => $instancia]);
        }
        return redirect('Administrador/Instancias/Instancias-Registradas')
                        ->with('warning','La Instancia selecionada no es valida o no existe!');
        
    }
    public function actualizar_instancias($id,Request $request)
    {
        $instancia = Instancias::find($id);     
        $datos = $request->validate([
            'nombre' => 'required|string|unique:instancias|max:100', 
            'porcentaje' => 'required|numeric|', 
            'tipo' => 'required', 
        ]);    

        $instancia->nombre = $request->nombre;
        $instancia->porcentaje = $request->porcentaje;
        $instancia->tipo = $request->tipo;

        $instancia->save();
        if($instancia==true){
            return redirect('Administrador/Instancias/Instancias-Registradas')->with('success', 'La Especialidad ha sido actualizada con exito!');
        } 
    }
}
