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
                    <div class="col-sm-12">                    
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
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <h5 class="card-title">Información del caso</h5>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-dark"><strong>Fecha de registro:</strong> {{$caso[0]->created_at}}</p>                                     
                                    <p class="text-dark"><strong>Rama:</strong>
                                        @if(isset($caso[0]->rama))
                                            {{$caso[0]->rama}}                                            
                                        @elseif(isset($caso[0]->rama) == false)
                                        Rama sin asignar
                                        @endif    
                                    </p>                    
                                    <p class="text-dark"><strong>Categoria:</strong>
                                        @if(isset($caso[0]->nombre))
                                            {{$caso[0]->nombre}}                                       
                                        @elseif(isset($caso[0]->nombre) == false)
                                        Categoria sin asignar
                                        @endif  
                                    </p>   
                                </div>
                                <div class="col-sm-6">
                                    <p class="text-dark"><strong>Estapa:</strong> {{$caso[0]->etapa}}</p> 
                                    <p class="text-dark"><strong>Cuantia:</strong> {{$caso[0]->cuantia}}</p> 
                                </div>   
                                    <div class="col-sm-4">                                    
                                        <h5 class="text-dark">Descripción del caso</h5> 
                                        <hr>
                                        <div class="col-md-12 mb-3">                             
                                            @include('layouts.word')  
                                            <button type="button" onclick="text_print('descripcion');" class="btn btn-secondary"> <i class="fa fa-print"></i></button>                          
                                        </div>   
                                            <textarea class="form-control rounded" id="descripcion"  rows="10">{{$caso[0]->descripcion1}}{{$caso[0]->descripcion2}}{{$caso[0]->descripcion3}}</textarea>
                                    </div>
                                    <div class="col-sm-4">
                                    
                                        <h5 class="text-dark">Problema juridico</h5> 
                                        <hr>
                                        <div class="col-md-12 mb-3">                             
                                            @include('layouts.word')  
                                            <button type="button" onclick="text_print('descripcion');" class="btn btn-secondary"> <i class="fa fa-print"></i></button>                          
                                        </div>   
                                            <textarea class="form-control rounded" id="descripcion_a"  rows="10">{{$caso[0]->descripcion1_a}}{{$caso[0]->descripcion2_a}}{{$caso[0]->descripcion3_a}}</textarea>
                                    </div>
                                    <div class="col-sm-4">
                                        <br>
                                        <h5 class="text-dark">Solución juridica proyectada</h5> 
                                        <hr>
                                        <div class="col-md-12 mb-3">                             
                                            @include('layouts.word')  
                                            <button type="button" onclick="text_print('descripcion');" class="btn btn-secondary"> <i class="fa fa-print"></i></button>                          
                                        </div>   
                                            <textarea class="form-control rounded" id="descripcion_a"  rows="10">{{$caso[0]->descripcion1_s}}{{$caso[0]->descripcion2_s}}{{$caso[0]->descripcion3_s}}</textarea>
                                    </div>
                            </div>                                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
