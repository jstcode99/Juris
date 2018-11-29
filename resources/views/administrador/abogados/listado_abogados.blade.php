
@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('listado_abogados')}}">Listado de abogados</a></li>
    @endsection  
    @section('contenedor')
    <div class="card">
        <div class="card-header">
            <h3>Listado de abogados</h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive" style="width:99%;">
                <table class="display" id="tabla_abogados" class="table table-hover table-bordered">
                        <thead>
                            <th>T.Doc</th>
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>        
                            <th>Estado</th>
                            <th>Estrato</th>
                            <th>Dirección</th>
                            <th>Télefono</th>
                            <th>Correo</th>
                            <th>Editar</th>
                            <th>Ver</th>
                        </thead>
                        <tbody>   
                            @isset($abogados) 
                                @foreach($abogados as $abogado)
                                    <tr>
                                    <td>{{ $abogado->tipo_documento }}</td>
                                    <td>{{ $abogado->documento }}</td>
                                    <td>{{ $abogado->primer_nombre }} {{ $abogado->segundo_nombre }}</td>
                                    <td>{{ $abogado->primer_apellido }} {{ $abogado->segundo_apellido }}</td>
                                    <td>{{ $abogado->estado }}</td>
                                    <td>{{ $abogado->estrato }}</td>
                                    <td>{{ $abogado->direccion }}</td>
                                    <td>{{ $abogado->telefono }}</td>
                                    <td>{{ $abogado->email }}</td>
                                    <td>
                                        <a href="{{ route('mostrar_abogado', ['documento' => $abogado->id]) }}" class="btn btn-default btn-xs" >
                                            <span class="fa fa-pencil"></span>                                                                                         
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('ver_abogado', ['documento' => $abogado->id]) }}" class="btn btn-default btn-xs" >
                                            <span class="fa fa-eye"></span>                                                                                         
                                        </a>
                                    </td>
                                    </tr>
                                @endforeach
                            @endisset                      
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection