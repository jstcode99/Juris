@extends('home')
    @section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('mostrar_caso', ['id' => $caso[0]->id] ) }}">Abrir caso</a></li>
    @endsection  
    @section('contenedor')        
    <div class="container.fluid">
        <div class="card">  
            <div class="card-header">
               <h5 class="card-title">Caso # {{$caso[0]->id}}</h5>
            </div>
            <div class="card-body">
            {!! Form::model($caso, ['route' => ['abrir_caso',$caso[0]->id],'method' => 'put','files' => true]) !!}             
                <div class="row">                    
                    <div class="col-sm-4">
                        <h5 class="card-title">Cliente</h5>
                        <hr>
                        <p class="text-dark"><strong>Documento de identidad:</strong> {{$caso[0]->tipo_documento}} : {{$caso[0]->documento}}</p>
                        <p class="text-dark"><strong>Nombres:</strong> {{ $caso[0]->primer_nombre }} {{ $caso[0]->segundo_nombre }}</p>
                        <p class="text-dark"><strong>Apellidos:</strong> {{$caso[0]->primer_apellido}}</p>
                        <p class="text-dark"><strong>Teléfono:</strong> {{$caso[0]->telefono}}</p>
                        <p class="text-dark"><strong>Dirección:</strong> {{$caso[0]->direccion}}</p>   
                    </div>
                    <div class="col-sm-8">
                        <div class="col-sm-12">
                            <h5 class="card-title">Información del caso</h5>
                            <hr>
                            <div class="row">
                                    <div class="col-sm-6">
                                        <div class="col-md-12 mb-3">    
                                        {!! Form::label('descripcion_a', 'Descripción juridica') !!}   
                                         <div class="col-md-12 mb-3">                             
                                @include('layouts.word')                            
                                </div>                                            
                                        {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' => '5','placeholder' => 'Descripción juridica']) !!}                                   
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                        Ingrese información puntual del caso... 
                                        </small>
                                    </div>    
                                    <div class="col-md-12 mb-3">
                                        {!! Form::label('audio_a', 'Seleccione la grabación') !!}   
                                        
                                        {!! Form::file('audio_a', ['class' => 'form-control', 'id' => 'audio', 'accept'=> '.mp3']) !!}                                    
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                        Archivos extension .mp3, tamaño maximo 20mb
                                        </small>
                                    </div>    
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm-12">
                                        <div class="col-md-12 mb-3">    
                                        {!! Form::label('descripcion_s', 'Solución juridica') !!}  
                                         <div class="col-md-12 mb-3">                             
                                        @include('layouts.word')                            
                                        </div>                                             
                                        {!! Form::textarea('descripcion_s', null, ['class' => 'form-control word','rows' => '5','placeholder' => 'Solución juridica']) !!}                                   
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                        Ingrese información puntual del caso... 
                                        </small>
                                    </div>    
                                    <div class="col-md-12 mb-3">
                                        {!! Form::label('audio_s', 'Seleccione la grabación') !!}   
                                        
                                        {!! Form::file('audio_s', ['class' => 'form-control', 'id' => 'audio', 'accept'=> '.mp3']) !!}                                    
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                        Archivos extension .mp3, tamaño maximo 20mb
                                        </small>
                                    </div> 
                                </div>
                                <div class="col-sm-12">                                    
                                    {!! Form::submit('Guardar', ['class'=>'btn btn-primary pull-right']) !!}                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>

     <div class="modal fade bd-example-modal-lg1" id="Cliente1" tabindex="-1" role="dialog" aria-labelledby="Cliente1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Cliente1">Registrar nuevo cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array('route' => 'guardar_cliente')) !!} 
                            <div class="row">   
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Registrar un nuevo cliente</h3>
                                        </div>
                                        <div class="card-body">                    
                                            <div class="form-row">                    
                                                @include('administrador.clientes.formulario.clientes')                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Registrar un nuevo cliente</h3>
                                        </div>
                                        <div class="card-body">                            
                                            <div class="form-row">                    
                                                @include('administrador.clientes.formulario.credenciales')
                                                {{ Form::submit('Guardar', ['class'=> 'btn btn-primary']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>      
                        {{ Form::close() }}   
                    </div>
                </div>
            </div>
        </div>
@endsection    

