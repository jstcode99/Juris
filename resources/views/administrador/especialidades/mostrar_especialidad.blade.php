@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nuevo_especialidad')}}">Especialidades</a></li>              
        <li class="breadcrumb-item"><a href="{{ route('mostrar_especialidad', ['documento' => $especialidad->id]) }} ">Actualizar especialidad</a></li>  
    @endsection  
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