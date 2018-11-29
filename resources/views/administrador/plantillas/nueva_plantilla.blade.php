@extends('home')
    @section('contenedor')
        <div class="card">
            <div class="card-header">
            <h3>Registrar una nueva plantilla</h3>
            </div>
            <div class="card-body">                
            {!! Form::open(array('route' => 'guardar_plantilla','files' => true)) !!}
                
                @include('administrador.plantillas.formulario.plantilla')       
                <div class="col-md-4 mb-3">   
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                </div>
            {{ Form::close() }}  
                <br>
                <br>  
            </div>
        </div>
    <br>     
@endsection