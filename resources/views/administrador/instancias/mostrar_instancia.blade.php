@extends('home')
    @section('contenedor')
<div class="card">
  <div class="card-body">
        <h3>Actualizar instancia ({{ $instancia->id}})</h3>
        {!! Form::model($instancia, ['route' => ['actualizar_instancia',$instancia->id],'method' => 'put']) !!}
        @include('administrador.instancias.formulario.instancia')
        <div class="col-md-4 mb-3">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-warning']) !!}
        </div>
    {{ Form::close() }}    
    </div>
</div>
        <br>
@endsection