@extends('home')
    @section('contenedor')
<div class="card">
  <div class="card-body">
        <h3>Actualizar especialidad ({{ $especialidad->nombre}})</h3>
        {!! Form::model($especialidad, ['route' => ['actualizar_especialidad',$especialidad->id],'method' => 'put']) !!}
        @include('administrador.especialidades.formulario.especialidad')
        {!! Form::submit('Actualizar', ['class' => 'btn btn-warning']) !!}
    {{ Form::close() }}    
    </div>
</div>
        <br>
@endsection