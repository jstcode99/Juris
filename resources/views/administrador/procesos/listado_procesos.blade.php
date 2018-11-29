
@extends('home')
 @section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('listado_procesos')}}">Listado de proceso</a></li>
    @endsection  
    @section('contenedor')
    <div class="card">
        <div class="card-body">
            <h3>Listado de procesos</h3>
            <div class="table-responsive">
            <table class="display nowrap" style="width:100%" id="tabla_procesos">
                    <thead>
                        <th>N°</th>
                        <th>Radicado</th>
                        <th>Categoria</th>
                        <th>Instancia</th>        
                        <th>Clase</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Ver</th>
                    </thead>
                    <tbody>   
                        @isset($procesos) 
                            @foreach($procesos as $proceso)
                                <tr>
                                    <td>{{ $proceso->id }}</td>
                                    <td>{{ $proceso->numero_asignado }}</td>
                                    <td>{{ $proceso->producto_nombre}}</td>
                                    <td>{{ $proceso->instancia_nombre}}</td>                        
                                    <td>{{ $proceso->clase }}</td>
                                    <td>{{ $proceso->estado }}</td>                                                            
                                    <td>
                                        <a href="{{ route('mostrar_proceso', ['id' => $proceso->id] ) }}" class="btn btn-default btn-xs" >
                                            <span class="fa fa-pencil"></span>                                                                                         
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('ver_proceso', ['id' => $proceso->id] ) }}"  class="btn btn-default btn-xs" >
                                            <span class="fa fa-eye"></span>                                                                                         
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset  
                    
                    </tbody>
            </table>
                <br>
                <br>
            </div>
        </div>
    </div>    
@endsection