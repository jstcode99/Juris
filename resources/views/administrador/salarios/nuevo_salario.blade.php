@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nuevo_salario')}}">Salarios</a></li>                      
    @endsection 
    @section('contenedor')
<div class="card">
    <div class="card-header">
        <h3>Registrar un nuevo salario</h3>
    </div>
    <div class="card-body">    
    {!! Form::open(array('route' => 'guardar_salario')) !!}
        
        @include('administrador.salarios.formulario.salario')       
        <div class="col-md-4 mb-3">   
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        </div>
    {{ Form::close() }}  
        <br>
        <br>  
    </div>
</div>
    <br>  
<div class="card">
    <div class="card-header">
        <h3>Listado de Salarios</h3>        
    </div>
    <div class="card-body">    
<div class="table-responsive" style="width:100%;">
  <table class="display nowrap" style="width:100%" id="tabla_salarios">
        <thead>
            <th>Decreto</th>
            <th>Fecha</th>
            <th>Valor</th>
            <th>Editar</th>
        </thead>
        <tbody>   
            @isset($salarios) 
                @foreach($salarios as $salario)
                    <tr>
                        <td>{{ $salario->decreto }}</td>
                        <td>{{ $salario->fecha }}</td>                    
                        <td>${{ number_format($salario->valor , 2 , "," , ".")  }}</td>                    
                        <td>
                            <a href="{{ route('mostrar_salario', ['id' => $salario->id]) }}" class="btn btn-default btn-xs" >
                                <span class="fa fa-pencil"></span>                                                                                         
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endisset          
        </tbody>
  </table>
    </div>
</div>  
  
    <br>     
    @endsection