@extends('home')
    @section('contenedor')
    <div class="card">
        <div class="card-header">
            <h3>Registrar una nueva contra parte</h3>
        </div> 
        <div class="card-body">            
            {!! Form::open(array('route' => 'guardar_ontra_parte')) !!}
                
                <div class="form-row">                
                    @include('administrador.contraparte.formulario.contraparte')     
                    {{ Form::submit('Guardar', ['class'=> 'btn btn-primary pull-right']) }}
                </div>
            {{ Form::close() }}  
        </div>
    </div>     
    @endsection