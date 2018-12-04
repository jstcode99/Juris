@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nueva_categoria')}}">Categoria</a></li>              
        <li class="breadcrumb-item"><a href="{{ route('mostrar_categoria', ['documento' => $categoria->id]) }} ">Actualizar categoria</a></li>  
    @endsection  
    @section('contenedor')
<div class="card">
  <div class="card-body">
        <h3>Actualizar categoria ({{ $categoria->nombre}})</h3>
        {!! Form::model($categoria, ['route' => ['actualizar_categoria',$categoria->id],'method' => 'put']) !!}
        @include('administrador.categorias.formulario.categoria')
        {!! Form::submit('Actualizar', ['class' => 'btn btn-warning']) !!}
    {{ Form::close() }}    
    </div>
</div>
@endsection