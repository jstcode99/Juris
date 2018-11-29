@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nuevo_especialidad')}}">Especialidades</a></li>       
    @endsection  
    @section('contenedor')
<div class="card">
    <div class="card-header">
         <h3>Registrar una nueva especialidad</h3>  
    </div>
    <div class="card-body">
        
    {!! Form::open(array('route' => 'guardar_especialidad')) !!}
        @include('administrador.especialidades.formulario.especialidad')
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {{ Form::close() }}  
        <br>
        <br>  
    </div>
</div>
<br>  
<div class="card">
    <div class="card-header">
         <h3>Listado de Especialidades</h3>
    </div>
    <div class="card-body">
                
<div class="table-responsive" style="width:100%;">
  <table class="display nowrap" style="width:100%" id="tabla_especialidades">
        <thead>
            <th>Especialidad</th>
            <th>Fecha Creación</th>
            <th>Editar</th>
        </thead>
        <tbody>   
            @isset($especialidades) 
                @foreach($especialidades as $especialidad)
                    <tr>
                        <td>{{ $especialidad->nombre }}</td>
                        <td>{{ $especialidad->fecha }}</td>                    
                        <td>
                            <a href="{{ route('mostrar_especialidad', ['documento' => $especialidad->id]) }}" class="btn btn-default btn-xs" >
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