<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abogados;
use Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
class AbogadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function crear()
    {        
        return  view('administrador.abogados.nuevo_abogado');
    }

    public function guardar(Request $request)
    {        
        $datos = $request->validate([
            'tipo_documento' => 'required|string|max:100',
            'documento' => 'required|unique:personas|max:20',
            'primer_nombre' => 'required|string|max:100', 
            'segundo_nombre' => 'required|string|max:100',
            'primer_apellido' => 'required|string|max:100',
            'segundo_apellido' => 'required|string|max:100', 
            'estrato' => 'required',
            'direccion' => 'required|string|max:100|min:10',
            'telefono' => 'required|string|min:6',
            'email' => 'required|email|unique:personas|string|max:255',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
            'tarjeta_profesional' => 'required|file|min:2required|mimes:png',
        ]);

        $abogados = new Abogados;

        $abogados->tipo_documento = $request->tipo_documento;
        $abogados->documento = $request->documento;
        $abogados->primer_nombre = strtoupper($request->primer_nombre);
        $abogados->segundo_nombre = strtoupper($request->segundo_nombre);
        $abogados->primer_apellido = strtoupper($request->primer_apellido);
        $abogados->segundo_apellido = strtoupper($request->segundo_apellido);
        $abogados->estado = 'ACTIVO';
        $abogados->estrato = $request->estrato;
        $abogados->direccion = strtoupper($request->direccion);
        $abogados->telefono = $request->telefono;
        $abogados->name = 'ABOGADO';
        $abogados->email = $request->email;
        $abogados->password = Hash::make($request->password);
        $url = $request->file('tarjeta_profesional')->store('public/tarjetas_profesionales/');
        $abogados->tarjeta_profesional = $url;
        $abogados->save();        

        if($abogados){
            return back()->with('success', 'El Abogado ha sido registrado con exito!' );            
        }
        
    }
    public function mostrar()
    {
        $clientes = DB::table('personas')->where('name','=','ABOGADO')->get();

        return view('administrador.abogados.listado_abogados', ['abogados' => $clientes]);
        
    }
    public function mostrar_abogado($id)
    {         
        $abogado = Abogados::find($id);  
        if(isset($abogado))
        {
            return view('administrador.abogados.mostrar_abogado',['abogado' => $abogado]);              
        }else{
            return redirect('Administrador/Abogados/Abogados-Registrados')->with('warning', 'Debe seleccionar un abogado de la lista de abogados');
        }      
        
    }

    public function actualizar_abogado(Request $request,$id)
    {    
        $abogados = Abogados::find($id);
        
        $datos = $request->validate([
            'primer_nombre' => 'required|string|max:100', 
            'segundo_nombre' => 'required|string|max:100',
            'primer_apellido' => 'required|string|max:100',
            'segundo_apellido' => 'required|string|max:100', 
            'estrato' => 'required',
            'direccion' => 'required|string|max:100|min:10',
            'telefono' => 'required|string|min:6',
            'email' => 'required|email|string|max:255',
        ]);

        if(!empty($request->password))
        {
            $datos = $request->validate([
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:8'
            ]);
            $abogados->password = Hash::make($request->password);
        }
        if(!empty($request->tarjeta_profesional))
        {
            $datos = $request->validate([
                'tarjeta_profesional' => 'required|mimes:png,'
            ]);
            $url_actualizar = $request->file('tarjeta_profesional')->store('public/tarjetas_profesionales');
            $abogados->tarjeta_profesional = $url_actualizar;
            
        }
        
        $abogados->primer_nombre = strtoupper($request->primer_nombre);
        $abogados->segundo_nombre = strtoupper($request->segundo_nombre);
        $abogados->primer_apellido = strtoupper($request->primer_apellido);
        $abogados->segundo_apellido = strtoupper($request->segundo_apellido);        
        $abogados->estrato = $request->estrato;
        $abogados->direccion = strtoupper($request->direccion);
        $abogados->telefono = $request->telefono;        
        $abogados->email = $request->email;            
        $abogados->save();

        if($abogados){
            return redirect('Administrador/Abogados/Abogados-Registrados')->with('success', 'El abogado ha sido actualizado con exito!');
        }
    }

    public function  ver_abogado($id)
    {
        $abogado = Abogados::find($id);        
        if(isset($abogado))
        {
            return view('administrador.abogados.ver_abogado',['abogado' => $abogado]);
        }else{
            return redirect('Administrador/Abogados/Abogados-Registrados')->with('warning', 'Debe seleccionar un abogado de la lista de abogados');
        }    
    }
    
    public function dercargar_tarjeta_abogado($id)
    {
        $abogado = Abogados::where('id','=', $id)->first(); 
        $nombre='TarjetaProfefional'.$abogado->id.'.png';
                       
        return Storage::download($abogado->tarjeta_profesional,$nombre);//->with('success', 'Se ha descargado la tarjeta correctamente');
    }
}
