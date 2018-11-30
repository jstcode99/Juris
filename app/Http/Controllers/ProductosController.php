<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Productos;
use App\Cobros;

class ProductosController extends Controller
{
    public function crear()
    {
        $especialides = DB::table('especialidades')->pluck('nombre', 'id');
        return view('administrador.productos.nuevo_producto',['especialidades'=> $especialides]);
    }
    public function guardar(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|unique:productos',
            'descripcion' => 'required',
            'especialidad' => 'required',
            'id_cobro' => 'required',
        ]);

        $producto = new productos;
        
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->id_especialidad = $request->especialidad;
        $producto->id_cobro = $request->id_cobro;
        $producto->tipo_tarifa = $request->tipo_tarifa;

        $producto->save();

        if($producto){
            return back()->with('success', 'El producto ha sido registrado con exito!');
        } 

    }
    public function mostrar()
    {
        $productos = DB::table('productos')->join('especialidades','productos.id_especialidad','=','especialidades.id')
        ->select('productos.*','especialidades.nombre as especialidad_nombre')->get();
        return view('administrador.productos.listado_productos',['productos'=> $productos]);
    }

    public function mostrar_producto($id)
    {
        $producto = Productos::find($id);
        if($producto)
        {
            $especialidades = DB::table('especialidades')->pluck('nombre', 'id');
            return view('administrador.productos.mostrar_producto', ['producto' => $producto,  'especialidades' => $especialidades, ]);
        }
        return redirect('Administrador/Productos/Productos-Registrados')->with('warning','El producto selecionado no es valido o no existe');
        
    }
    public function actualizar_producto($id, Request $request)
    {
        $producto = Productos::find($id);
        $datos = $request->validate([           
            'descripcion' => 'required',
            'especialidad' => 'required',
            'id_cobro' => 'required|',
        ]);
        if($producto->nombre != $request->nombre){
            $datos = $request->validate([
                'nombre' => 'required|unique:productos',
                ]);
        }
        
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->id_especialidad = $request->especialidad;
        $producto->id_cobro = $request->id_cobro;
        $producto->tipo_tarifa = $request->tipo_tarifa;

        $producto->save();

        if($producto){
            return back()->with('success', 'El producto ha sido actualizado con exito!');
        } 
    }
    public function productos_especialidad(Request $request)
    {    
        if(isset($request->id) || $request->id != null)
        {
            $datos = $request->validate([           
                'id' => 'required|numeric',
            ]);
            $productos = DB::table('productos')->where('id_especialidad','=',$request->id)->get();
            return $productos;
        }else {
            return null;
        }
    }  
    public function productos_cobros(Request $request)
    {    
        if(isset($request->id) || $request->id != null)
        {
            $datos = $request->validate([           
                'id' => 'required|numeric',
            ]);
            $producto = Productos::find($request->id);
            return $producto;
        }else {
            return null;
        }
    }
     
}

