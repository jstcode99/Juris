<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class EspecialidadesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function crear()
    {
        $especialidades = DB::table('especialidades')->get();
        return  view('administrador.especialidades.nueva_especialidad', ['especialidades' => $especialidades]);
    }

    public function guardar(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|unique:especialidades|max:100', 
        ]);

        $especialidad = new Especialidades;

        $especialidad->nombre = $request->nombre;
        $especialidad->fecha = date("Y-m-d");
        $especialidad->save();

        if($especialidad){
            return back()->with('success', 'La Especialidad ha sido registrada con exito!');
        }
    }

    public function mostrar()
    {
        $especialidades = DB::table('especialidades')->get();
        return  view('administrador.especialidades.nueva_especialidad', ['especialidades' => $especialidades]);
    }

    public function mostrar_especialidad($id)
    {         
        $especialidad = Especialidades::find($id);  
        if(isset($especialidad))
        {
            return view('administrador.especialidades.mostrar_especialidad',['especialidad' => $especialidad]);              
        }else{
            return redirect('/home')->with('warning', 'Debe seleccionar un especialidad de la lista de especialidades');
        }              
    }

    public function actualizar_especialidad($id, Request $request)
    {         
        $especialidad = Especialidades::find($id);     
        $datos = $request->validate([
            'nombre' => 'required|string|unique:especialidades|max:100', 
        ]);    
        $especialidad->nombre = $request->nombre;
        $especialidad->save();
        if($especialidad==true){
            return redirect('Administrador/Especialidades/Especialidades-Registradas')->with('success', 'La Especialidad ha sido actualizada con exito!');
        }      
    }
}
