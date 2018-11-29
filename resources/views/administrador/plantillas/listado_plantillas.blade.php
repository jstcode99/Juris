
@extends('home')
    @section('contenedor')
    <div class="card">
        <div class="card-header">
                <h3>Listado de plantillas / Documentos</h3>
        </div>     
        <div class="card-body">   
            <div class="table-responsive">
            <table class="display" id="tabla_plantillas" class="table table-hover table-bordered">
                    <thead>
                        <th>N°</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Etiquetas</th>        
                        <th>Versión</th>
                        <th>Especialidad</th>
                        <th>Editar</th>
                        <th>Descargar</th>
                    </thead>
                    <tbody>   
                        @isset($plantillas) 
                            @foreach($plantillas as $plantilla)
                                <tr>
                                    <td>{{ $plantilla->id }}</td>
                                    <td>{{ $plantilla->titulo }}</td>
                                    <td>{{ $plantilla->autor}}</td>
                                    <td>{{ $plantilla->etiquetas}}</td>
                                    <td>{{ $plantilla->version }}</td>
                                    <td>{{ $plantilla->especialidad_nombre }}</td>                                                            
                                    <td>
                                        <a href="{{ route('mostrar_plantilla', ['documento' => $plantilla->id]) }}" class="btn btn-default btn-xs" >
                                            <span class="fa fa-pencil"></span>                                                                                         
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('descargar_plantilla', ['documento' => $plantilla->id]) }}" class="btn btn-default btn-xs" >
                                            <span class="fa fa-cloud-download"></span>                                                                                         
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset  
                    
                    </tbody>
            </table>
            </div>
        </div>
@endsection