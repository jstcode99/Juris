@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nueva_categoria')}}">Categorias</a></li>       
    @endsection  
    @section('contenedor')
<div class="card">
    <div class="card-header">
         <h3>Registrar una nueva categoria</h3>  
    </div>
    <div class="card-body">
        
    {!! Form::open(array('route' => 'guardar_categoria')) !!}
        @include('administrador.categorias.formulario.categoria')
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {{ Form::close() }}  
        <br>
        <br>  
    </div>
</div>
<br>  
<div class="card">
    <div class="card-header">
         <h3>Listado de Categorias</h3>
    </div>
    <div class="card-body">
                
<div class="table-responsive" style="width:100%;">
  <table class="display nowrap" style="width:100%" id="tabla_especialidades">
        <thead>
            <th>Categoria</th>
            <th>Rama</th>
            <th>Editar</th>
        </thead>
        <tbody>   
            @isset($categorias) 
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->rama }}</td>                    
                        <td>
                            <a href="{{ route('mostrar_categoria', ['id' => $categoria->id]) }}" class="btn btn-default btn-xs" >
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