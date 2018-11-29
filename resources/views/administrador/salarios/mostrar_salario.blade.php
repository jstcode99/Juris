@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nuevo_salario')}}">Salarios</a></li>                      
        <li class="breadcrumb-item"><a href="{{ route('mostrar_salario', ['id' => $salarios->id]) }}">Actualizar salario</a></li>                      
        
    @endsection 
    @section('contenedor')
<div class="card">
    <div class="card-body">
        <h3>Registrar un nuevo salario</h3>
    {!! Form::model($salarios, ['route' => ['actualizar_salario',$salarios->id],'method' => 'put']) !!}
        
        @include('administrador.salarios.formulario.salario')       
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