@extends('home')
    @section('contenedor')
<div class="card">
    <div class="card-header">
         <h3>Registrar una nueva instancia</h3>
    </div>
    <div class="card-body">       
    {!! Form::open(array('route' => 'guardar_instancia')) !!}
        
        @include('administrador.instancias.formulario.instancia')       
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
         <h3>Listado de Especialidades</h3>   
    </div>
    <div class="card-body">             
<div class="table-responsive" style="width:100%;">
  <table class="display nowrap" style="width:100%" id="tabla_instancias">
        <thead>
            <th>Instanci</th>
            <th>Porcentaje</th>
            <th>Tipo</th>
            <th>Editar</th>
        </thead>
        <tbody>   
            @isset($instancias) 
                @foreach($instancias as $instancia)
                    <tr>
                        <td>{{ $instancia->nombre }}</td>
                        <td>{{ $instancia->porcentaje }}</td>                    
                        <td>{{ $instancia->tipo }}</td>                    
                        <td>
                            <a href="{{ route('mostrar_instancia', ['documento' => $instancia->id]) }}" class="btn btn-default btn-xs" >
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