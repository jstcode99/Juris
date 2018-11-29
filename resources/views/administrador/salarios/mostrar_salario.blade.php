@extends('home')
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