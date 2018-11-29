@extends('home')
    @section('contenedor')
        <div class="card">
            <div class="card-body">
                <h3>Actualizar plantilla ({{ $plantilla->id}})</h3>
            {!! Form::model($plantilla, ['route' => ['actualizar_plantilla',$plantilla->id],'method' => 'put','files' => true]) !!}                
                @include('administrador.plantillas.formulario.plantilla')       
                <div class="col-md-4 mb-3">   
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-warning']) !!}
                </div>
            {{ Form::close() }}  
                <br>
                <br>  
            </div>
        </div>
    <br>     
@endsection