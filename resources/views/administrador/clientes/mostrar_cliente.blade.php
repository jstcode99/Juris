@extends('home')
    @section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Inicio</a></li>
        
        <li class="breadcrumb-item"><a href="{{ route('listado_clientes')}}">Listado de clientes</a></li>
        <li class="breadcrumb-item"><a href="{{ route('mostrar_cliente', ['documento' => $cliente->id]) }}">Actualizar cliente</a></li>
    @endsection 
    @section('contenedor')                   
        {!! Form::model($cliente, ['route' => ['actualizar_cliente',$cliente->id],'method' => 'put']) !!}
            <div class="row">   
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3>Actualizar el registro  ({{$cliente->id }})</h3>
                        </div>
                        <div class="card-body">                    
                            <div class="form-row">                    
                                @include('administrador.clientes.formulario.clientes')                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Registrar un nuevo cliente</h3>
                        </div>
                        <div class="card-body">                            
                            <div class="form-row">                    
                                @include('administrador.clientes.formulario.credenciales')
                                {{ Form::submit('Guardar', ['class'=> 'btn btn-primary']) }}
                            </div>
                        </div>
                    </div>
                </div>    
        </div>  
        {!! Form::close() !!}            
    @endsection
