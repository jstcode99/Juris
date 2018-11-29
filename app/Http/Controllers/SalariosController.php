<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salarios;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class SalariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function crear()
    {
        $salarios = DB::table('salarios')->get();

        return view('administrador.salarios.nuevo_salario', ['salarios' => $salarios]);
    }
    public function guardar(Request $request)
    {
        $salarios = new Salarios;
        $datos = $request->validate([
            'decreto' => 'required|unique:salarios|string|max:100',
            'valor' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $salarios->decreto = $request->decreto;
        $salarios->valor = $request->valor;
        $salarios->fecha = $request->fecha;

        $salarios->save();

        if($salarios){
            return back()->with('success', 'El Salario ha sido registrado con exito!');
        }
    }

    public function mostrar_salario($id)
    {
        $salarios = Salarios::find($id);
        if($salarios){
            return view('administrador.salarios.mostrar_salario', ['salarios' => $salarios]);
        }
        return Redirect('Administrador/Salarios/Nuevo_Salario')->with('warning', 'El salario selecionado no es valido o no existe!');
    }

    public function actualizar_salario(Request $request, $id)
    {
        $salario = Salarios::find($id);
        $datos = $request->validate([
            'decreto' => 'required|string|max:100',
            'valor' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $salario->decreto = $request->decreto;
        $salario->valor = $request->valor;
        $salario->fecha = $request->fecha;

        $salario->save();

        if($salario){
            return Redirect('Administrador/Salarios/Nuevo_Salario')->with('success', 'El salario ha sido actualizado con exito!');
        }
    }
}
