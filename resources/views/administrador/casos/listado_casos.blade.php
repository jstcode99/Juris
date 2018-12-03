
@extends('home')
 @section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('listado_casos')}}">Listado de casos</a></li>
    @endsection  
    @section('contenedor')
    <div class="card">
        <div class="card-body">
            <h3>Listado de casos</h3>
            <div class="table-responsive">
            <table class="display nowrap" style="width:100%" id="tabla_procesos">
                    <thead>
                        <th>N°</th>
                        <th>Cliente</th>
                        <th>Categoria</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Ver</th>
                    </thead>
                    <tbody>   
                        @isset($casos) 
                            @foreach($casos as $caso)
                                <tr>
                                    <td>{{ $caso->id }}</td>
                                    <td>{{ $caso->cliente }}</td>
                                    <td>{{ $caso->categoria}}</td>                                    
                                    <td>{{ $caso->estado }}</td>                                                            
                                    <td>
                                        <a href="{{ route('mostrar_caso', ['id' => $caso->id] ) }}" class="btn btn-default btn-xs" >
                                            <span class="fa fa-pencil"></span>                                                                                         
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('ver_caso', ['id' => $caso->id] ) }}"  class="btn btn-default btn-xs" >
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