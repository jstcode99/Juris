
@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('listado_clientes')}}">Listado de clientes</a></li>
    @endsection  
    @section('contenedor')
        <div class="card">
            <div class="card-body">
                <h1>Listado de clientes</h1>
                <div class="table-responsive" style="width:90%;">
                    <table class="display nowrap" id="tabla_clientes" class="table table-hover table-bordered">
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
                        </thead>
                        <tbody>   
                            @isset($clientes) 
                                @foreach($clientes as $cliente)
                                    <tr>
                                    <td>{{ $cliente->tipo_documento }}</td>
                                    <td>{{ $cliente->documento }}</td>
                                    <td>{{ $cliente->primer_nombre }} {{ $cliente->segundo_nombre }}</td>
                                    <td>{{ $cliente->primer_apellido }} {{ $cliente->segundo_apellido }}</td>
                                    <td>{{ $cliente->estado }}</td>
                                    <td>{{ $cliente->estrato }}</td>
                                    <td>{{ $cliente->direccion }}</td>
                                    <td>{{ $cliente->telefono }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>
                                        <a href="{{ route('mostrar_cliente', ['documento' => $cliente->id]) }}" class="btn btn-default btn-xs" >
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
        </div>
@endsection