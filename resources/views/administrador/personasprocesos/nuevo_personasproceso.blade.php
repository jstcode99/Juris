@extends('home')
    @section('contenedor')
<div class="content"> 
    <div class="col-12 col-md-12">    
            <div class="card">
                <div class="card-body">
                
                {!! Form::open(array('route' => 'guardar_personasproceso')) !!}
                
                    <h3>Asignación de Demandantes y Demandados</h3>
                    @include('administrador.personasprocesos.formulario.personasproceso')
                    <div class="col-md-12 mb-3">     
                        <button type="submit"class="btn btn-primary pull-right" >Asignar personas</button>
                    </div>
                    {!! Form::close() !!}                        
                </div>
            </div>
        </div>
 
        <div class="modal fade"bd-example-modal-lg id="Abogado" tabindex="-1" role="dialog" aria-labelledby="Abodado1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Abodado1">Registrar nuevo Abogado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                   {!! Form::open(array('route' => 'guardar_abogado','files' => true )) !!}
                        <div class="form-row">     
                                <div class="col-md-3 mb-3">
                                    {{ Form::label('tipo_documento', 'Tipo de Documento')}}
                                    {{ Form::select('tipo_documento', 
                                        array('CC' => 'Cedula de ciudadania',
                                            'TI' => 'Tarjeta de identidad',
                                            'PP' => 'Pasaporte',
                                            'CE' => 'Cedula de extranjeria'),null,['class'=> 'form-control']) }}
                                </div>
                                @include('administrador.clientes.formulario.clientes')
                                <div class="col-md-12 mb-3">
                                    {!! Form::label('tarjeta_profesional', 'Seleccione un documento') !!}                
                                    {!! Form::file('tarjeta_profesional', ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-3 mb-3">
                                    {{ Form::submit('Guardar', ['class'=> 'btn btn-primary']) }}
                                </div>
                        </div>
                    {{ Form::close() }}  
                </div>
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
                            <div class="form-row">     
                                <div class="col-md-3 mb-3">
                                {{ Form::label('tipo_documento', 'Tipo de Documento')}}
                                {{ Form::select('tipodocumento', 
                                    array('CC' => 'Cedula de ciudadania',
                                        'TI' => 'Tarjeta de identidad',
                                        'PP' => 'Pasaporte',
                                        'CE' => 'Cedula de extranjeria'),null,['class'=> 'form-control']) }}
                                </div>
                                @include('administrador.clientes.formulario.clientes')
                                 <div class="col-md-3 mb-3">
                                    {{ Form::submit('Guardar', ['class'=> 'btn btn-primary']) }}
                                </div>
                            </div>
                        {{ Form::close() }}  
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade bd-example-modal-lg1" id="demandado1" tabindex="-1" role="dialog" aria-labelledby="demandado1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demandado1">Registrar nuevo Demandado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <div class="modal-body">
                    ...
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg1" id="demandante1" tabindex="-1" role="dialog" aria-labelledby="demandante1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="demandante1">Registrar nuevo Demandante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <div class="modal-body">
                    ...
                </div>
                </div>
            </div>
        </div>
@endsection