@extends('home')
 @section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nuevo_cliente')}}">Nuevo cliente</a></li>
    @endsection  
    @section('contenedor')
     {!! Form::open(array('route' => 'guardar_cliente')) !!} 
    <div class="row">   
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Registrar un nuevo cliente</h3>
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
  {{ Form::close() }}           
@endsection
