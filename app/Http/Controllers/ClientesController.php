<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
class ClientesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrar()
    {
        $clientes = DB::table('personas')->where('name','=','CLIENTE')->get();

        return view('administrador.clientes.listado_clientes', ['clientes' => $clientes]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        
        return  view('administrador.clientes.nuevo_cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {        
        $datos = $request->validate([
            'estrato' => 'required',
            'direccion' => 'required|string|max:100|min:10',
            'telefono' => 'required|string|min:6',
            'email' => 'required|email|unique:personas|string|max:255',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);
        $clientes = new Clientes;
        if($request->TipoPersona=="Persona")
        {
            $datos = $request->validate([
                'tipo_documento' => 'required',
                'documento' => 'required|numeric',
                'primer_nombre' => 'required|string|max:100', 
                'segundo_nombre' => 'required|string|max:100',
                'primer_apellido' => 'required|string|max:100',
                'segundo_apellido' => 'required|string|max:100', 
            ]);
            $clientes->tipo_documento = $request->tipo_documento;
            $clientes->documento = $request->documento;
            $clientes->primer_nombre = strtoupper($request->primer_nombre);
            $clientes->segundo_nombre = strtoupper($request->segundo_nombre);
            $clientes->primer_apellido = strtoupper($request->primer_apellido);
            $clientes->segundo_apellido = strtoupper($request->segundo_apellido);
        }
        if($request->TipoPersona=="Empresa")
        {
            $datos = $request->validate([                
                'nit' => 'required|numeric',
                'nombre' => 'required|string|max:100', 
            ]);
            $clientes->tipo_documento = 'NIT';
            $clientes->documento = $request->nit;
            $clientes->primer_nombre = strtoupper($request->nombre);
        }
        

        

        
        $clientes->estado = 'ACTIVO';
        $clientes->estrato = $request->estrato;
        $clientes->direccion = strtoupper($request->direccion);
        $clientes->telefono = $request->telefono;
        $clientes->name = 'CLIENTE';
        $clientes->email = $request->email;
        $clientes->password = Hash::make($request->password);

        $clientes->save();

        if($clientes){
            return back()->with('success', 'El cliente ha sido registrado con exito!');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar_cliente($id)
    {         
        $cliente = Clientes::find($id);  
        if(isset($cliente))
        {
            return view('administrador.clientes.mostrar_cliente',['cliente' => $cliente]);              
        }else{
            return redirect('Administrador/Clientes/Clientes-Registrados')->with('warning', 'Debe seleccionar un cliente de la lista de clientes');
        }      
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar_cliente(Request $request,$id)
    {    
        $clientes = Clientes::find($id);
        
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
            $clientes->password = Hash::make($request->password);
        }
        $clientes->primer_nombre = strtoupper($request->primer_nombre);
        $clientes->segundo_nombre = strtoupper($request->segundo_nombre);
        $clientes->primer_apellido = strtoupper($request->primer_apellido);
        $clientes->segundo_apellido = strtoupper($request->segundo_apellido);        
        $clientes->estrato = $request->estrato;
        $clientes->direccion = strtoupper($request->direccion);
        $clientes->telefono = $request->telefono;        
        $clientes->email = $request->email;        

        $clientes->save();

        if($clientes){
            return redirect('Administrador/Clientes/Clientes-Registrados')->with('success', 'El cliente ha sido actualiza con exito!');
        }
    }

    public function suspeder_cliente($id)
    {         
        $cliente = Clientes::find($id);        
        $clientes->estado = 'suspendido';

        $clientes->save();

        if($clientes){
            return back()->with('success', 'El cliente ha sido suspendido con exito!');
        }        
    }

}
