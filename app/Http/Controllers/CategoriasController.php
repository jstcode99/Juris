<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Categorias;
class CategoriasController extends Controller
{
    public function crear()
    {
        $categorias = DB::table('categorias')->get();
        return view('administrador.categorias.nueva_categoria', ['categorias' => $categorias]);
    }
    

    public function guardar(Request $request)
    {
        $datos = $request->validate([
            'rama' => 'required|string', 
            'nombre' => 'required|string|unique:categorias|max:100', 
        ]);

        $categoria = new categorias;

        $categoria->nombre = $request->nombre;
        $categoria->rama = $request->rama;
        $categoria->save();

        if($categoria){
            return back()->with('success', 'La Categoria ha sido registrada con exito!');
        }
    }
    public function mostrar_categoria($id)
    {         
        $categoria = categorias::find($id);  
        if(isset($categoria))
        {
            return view('administrador.categorias.mostrar_categoria',['categoria' => $categoria]);              
        }else{
            return redirect('/home')->with('warning', 'Debe seleccionar una categoria de la lista');
        }              
    }

    public function actualizar_categoria(Request $request,$id)
    {         
        $categoria = categorias::find($id);     
        $datos = $request->validate([
            'nombre' => 'required|string|max:100', 
            'rama' => 'required|string|max:100',
        ]);    
        $categoria->nombre = $request->nombre;
        $categoria->rama = $request->rama;
        $categoria->save();
        if($categoria==true){
            return redirect('Administrador/categorias/Nueva-Categoria')->with('success', 'La categoria ha sido actualizada con exito!');
        }      
    }
}
