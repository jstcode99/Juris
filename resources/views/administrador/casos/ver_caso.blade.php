@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('listado_casos')}}">Listado de casos</a></li>
        <li class="breadcrumb-item"><a href="">Ver caso</a></li>
    @endsection  
    @section('contenedor')   
        <div class="container.fluid">
        <div class="card">  
            <div class="card-header">
               <h5 class="card-title">Caso (# {{$caso[0]->id}})</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">                    
                        <div class="col-sm-12 ">
                            <h5 class="card-title">Cliente</h5>
                            <hr>
                            <p class="text-dark"><strong>Documento de identidad:</strong> {{$caso[0]->tipo_documento}} : {{$caso[0]->documento}}</p>
                            <p class="text-dark"><strong>Nombres:</strong> {{ $caso[0]->primer_nombre }} {{ $caso[0]->segundo_nombre }}</p>
                            <p class="text-dark"><strong>Apellidos:</strong> {{$caso[0]->primer_apellido}}</p>
                            <p class="text-dark"><strong>Teléfono:</strong> {{$caso[0]->telefono}}</p>
                            <p class="text-dark"><strong>Dirección:</strong> {{$caso[0]->direccion}}</p>   
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="col-sm-12">
                            <h5 class="card-title">Información del caso</h5>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                <p class="text-dark"><strong>Fecha de registro:</strong> {{$caso[0]->created_at}}</p> 
                                <p class="text-dark"><strong>Rama:</strong> {{$caso[0]->rama}}</p> 
                                <p class="text-dark"><strong>Categoria:</strong> {{$caso[0]->nombre}}</p> 
                                </div>
                                <div class="col-sm-6">
                                <p class="text-dark"><strong>Estapa:</strong> {{$caso[0]->etapa}}</p> 
                                <p class="text-dark"><strong>Cuantia:</strong> {{$caso[0]->cuantia}}</p> 
                                </div>                                                                                          
                            </div>
                            <div class="col-md-12">
                                <h5 class="text-info">Descripción del caso</h5> 
                                 <textarea class="form-control rounded"  rows="10">{{$caso[0]->descripcion1}}{{$caso[0]->descripcion2}}{{$caso[0]->descripcion3}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
