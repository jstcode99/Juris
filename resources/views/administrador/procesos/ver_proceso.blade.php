@extends('home')
 @section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('listado_procesos')}}">Listado de proceso</a></li>
        <li class="breadcrumb-item"><a href="{{ route('ver_proceso', ['id' => $proceso[0]->id] ) }}">Ver proceso</a></li>
    @endsection  
    @section('contenedor')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <h4 class="text-muted">Proceso  #{{ $proceso[0]->id}}</h4>   
                         <h5 class="text-dark">Radicado: {{ $proceso[0]->numero_asignado}}</h5>                        
                    </div>  
                    <div class="col-2">
                        <button type="button" class="btn btn-default">Ficha tecnica <i class="fa fa-file-text"></i></button>
                    </div>
                    <div class="col-12">
                        <h6 class="text-muted">Estado
                        @if($proceso[0]->estado=="ACTIVO")
                            <a class="text-success"><i class="fa fa-circle "></i><a>
                        @endif
                        @if($proceso[0]->estado=="TERMINADO")
                            <a class="text-info"><i class="fa fa-circle "></i><a>
                        @endif
                        @if($proceso[0]->estado=="CANCELADO")
                            <a class="text-alert"><i class="fa fa-circle "></i><a>
                        @endif
                        </h6>                                             
                    </div>
                </div>                                  
                <hr>
                <div class="row">
                    <div class="col-12">                          
                         <div class="row">
                            <div class="col-12">
                                <h5 class="text-dark">Fecha de inicio: <a class="text-primary">{{ $proceso[0]->fecha_inicio}}</a> </h5>                                                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-dark">Tiempo de tramites: <a class="text-primary">{{ $proceso[0]->tiempo}}</a> </h5>                                                    
                            </div>
                        </div>                                               
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-dark">Proceso: <a class="text-primary">{{ $proceso[0]->producto_nombre}}</a> </h5>                                                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-dark">Instancia: <a class="text-primary">{{ $proceso[0]->instancia_nombre}}</a> </h5>                                                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-dark">Clasificación: <a class="text-primary">{{ $proceso[0]->clase }}</a> </h5>                                                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-dark">Cuantia: <a class="text-primary">{{ $proceso[0]->cuantia}}</a> </h5>                                                    
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                    <hr>
                        <div class="shadow-lg p-3 mb-5 bg-white rounded">
                            <h3 class="text-dark ">Personas vinculadas al proceso</h3>
                        <div class="table-responsive" style="width:100%;">
                            <table class="table tablas">
                                <thead class="thead-dark">
                                    <th scope="col">N°</th>
                                    <th scope="col">Nombre completo</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Rol</th>
                                </thead>
                                <tbody>
                                 @isset($personasproceso) 
                                    @foreach($personasproceso as $persona)
                                        <tr>
                                            <td>{{ $persona->documento }}</td>
                                            <td>{{ $persona->primer_nombre }} {{ $persona->segundo_nombre}} {{ $persona->primer_apellido}} {{ $persona->segundo_apellido}}</td>
                                            <td>{{ $persona->telefono}}</td>
                                            <td>{{ $persona->email}}</td>
                                            <td>{{ $persona->tipo}}</td>
                                            </tr>
                                    @endforeach
                                @endisset          
                                </tbody>
                            </table>
                        </div>
                        
                        </div>                                                
                    </div>
                </div>
            </div>
        </div>
    <br>     
@endsection