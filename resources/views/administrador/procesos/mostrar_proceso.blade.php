@extends('home')
    @section('contenedor')
        <div class="card">
            <div class="card-body">
                <h1>Actualizar proceso ({{ $proceso->id}})</h1>
            {!! Form::model($proceso, ['route' => ['actualizar_proceso',$proceso->id],'method' => 'put','files' => true]) !!}                
                @include('administrador.procesos.formulario.proceso')       
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