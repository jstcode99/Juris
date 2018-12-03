<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;
use App\Plantillas;
class PlantillasController extends Controller
{
    public function crear()
    {
        $especialides = DB::table('especialidades')->pluck('nombre', 'id');
        return view('administrador.plantillas.nueva_plantilla',['especialidades'=> $especialides]);
    }
    public function guardar(Request $request)
    {

            $datos = $request->validate([
                'documento' => 'required|mimes:pdf,docx,dot',
                'especialidad' => 'required',
                'titulo' => 'required|unique:plantillas',
                'autor' => 'required',
                'etiquetas' => 'required',
                'version' => 'required',
            ]);

            $plantilla = new plantillas;
            $plantilla->titulo = $request->titulo;
            $plantilla->fecha = date("Y-m-d");
            $plantilla->autor = $request->autor;
            $plantilla->etiquetas = $request->etiquetas;
            $plantilla->version = $request->version;  
            $url = $request->file('documento')->store('public/platillas/');            
            $plantilla->documento = $url;                          
            $plantilla->id_especialidad = $request->especialidad;
            $plantilla->save();

            if($plantilla){
                return back()->with('success', 'La plantilla ha sido registrada con exito!');
            }

    }
    public function mostrar()
    {
        $plantillas = DB::table('plantillas')->join('especialidades','plantillas.id_especialidad','=','especialidades.id')
        ->select('plantillas.*','especialidades.nombre as especialidad_nombre')->get();
        return view('administrador.plantillas.listado_plantillas',['plantillas'=> $plantillas]);
    }

    public function mostrar_plantilla($id)
    {
        $plantilla = plantillas::find($id);
        if($plantilla)
        {
            $especialides = DB::table('especialidades')->pluck('nombre', 'id');
            return view('administrador.plantillas.mostrar_plantilla',['especialidades'=> $especialides,'plantilla' => $plantilla]);
        }
        return redirect('Administrador/Plantillas/Plantillas-Registradas')->with('warning', 'La plantilla seleccionada no es valida o no existe!');
    }

    public function actualizar_plantilla(Request $request,$id)
    {
            $plantilla = plantillas::find($id);
            $datos = $request->validate([                
                'especialidad' => 'required',
                'titulo' => 'required|unique:plantillas',
                'autor' => 'required',
                'etiquetas' => 'required',
                'version' => 'required',
            ]);
            if(!empty($request->documento))
            {
                $datos = $request->validate([                
                    'documento' => 'required|mimes:pdf,docx,dot',
                ]);          
                $url = $request->file('documento')->store('public/plantillas/');            
                $plantilla->documento = $url;        
            }            
            $plantilla->titulo = $request->titulo;
            $plantilla->fecha = date("Y-m-d");
            $plantilla->autor = $request->autor;
            $plantilla->etiquetas = $request->etiquetas;
            $plantilla->version = $request->version;                                  
            $plantilla->id_especialidad = $request->especialidad;
            $plantilla->save();

            if($plantilla){
                return redirect('Administrador/Plantillas/Plantillas-Registradas')->with('success', 'La plantilla ha sido actualizada con exito!');
            }

    }
    public function descargar_plantilla($id)
    {
        $plantilla = plantillas::find($id);
        $nombre=$plantilla->titulo;  
        $version=$plantilla->version;           
        
        $pos = strpos($plantilla->documento,'.');
        $formato=substr($plantilla->documento, $pos, -1);
        $nombre_completo=$nombre.'-V'.$version.$formato;      
        return Storage::download($plantilla->documento,$nombre_completo);
    }
}
