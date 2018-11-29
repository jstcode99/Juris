@extends('home')
    @section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nuevo_proceso')}}">Nuevo proceso</a></li>
    @endsection  
    @section('contenedor')
    {!! Form::open(array('route' => 'guardar_proceso')) !!}  
    <div class="row">            
        <div class="col-md-8">                
            <div class="card">
                <div class="card-header">
                        <h3>Registrar una nuevo proceso</h3>     
                        <h4>Datos del proceso</h4>                           
                </div>
                <div class="card-body">
                    <div class="form-row">   
                        <div class="col-md-12 mb-3">                            
                            {!! Form::checkbox('rol', null, null, ['checked data-toggle' => 'toggle', 'data-on' => 'Demandado', 'data-off' => 'Demandante', 'data-onstyle' => 'success' ,'data-offstyle' => 'danger']) !!}        
                        </div> 
                        <div class="col-md-4 mb-3">    
                            {!! Form::label('numero_asignado', 'Número de erradicado') !!}    
                            
                            {!! Form::text('numero_asignado',null, ['class' => 'form-control']) !!}         
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="fecha_presentacion">Fecha de Presentacion</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="fecha_presentacion"><i class="fa fa-calendar"></i></span>
                                    </div>                
                                    {!! Form::date('fecha_presentacion', null, ['class' => 'form-control']) !!}                
                                </div>
                        </div>
                        <div class="col-md-4 mb-3">    
                            {!! Form::label('tiempo', 'Estado') !!}    
                            
                            {!! Form::select('tiempo', $tiempo, null, ['class' => 'form-control']) !!}         
                        </div>
                        <div class="col-md-6 mb-3">    
                            {!! Form::label('producto', 'Productos') !!}            
                            {!! Form::select('producto', $productos, null, ['class' => 'form-control']) !!}         
                        </div>
                        <div class="col-md-6 mb-3">    
                            {!! Form::label('cuantia', 'Cuantias') !!}            
                            {!! Form::select('cuantia', $cuantias, null, ['class' => 'form-control']) !!}         
                        </div>
                         <div class="col-md-4 mb-3">    
                            {!! Form::label('clase', 'Clasificación') !!}    
                            
                            {!! Form::select('clase', $clasificacion, null, ['class' => 'form-control']) !!}         
                        </div>                        
                        <div class="col-md-4 mb-3">    
                            {!! Form::label('instancia', 'Instancias') !!}    
                            
                            {!! Form::select('instancia', $instancias, null, ['class' => 'form-control']) !!}         
                        </div>
                        <div class="col-md-4 mb-3">    
                            {!! Form::label('estrato', 'Estrato') !!}    
                            
                            {!! Form::select('estrato', $estrato, null, ['class' => 'form-control']) !!}         
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-md-4">             
            <div class="card">
                <div class="card-header">                      
                        <h4>Datos para clasificación</h4>                           
                </div>
                <div class="card-body">
                    <div class="form-row">                             
                        <div class="col-md-6 mb-3">    
                            {!! Form::label('riesgo', 'Riesgo') !!}    
                            
                            {!! Form::select('riesgo', $riesgo, null, ['class' => 'form-control']) !!}         
                        </div>

                        <div class="col-md-6 mb-3">    
                            {!! Form::label('lugar', 'Lugar') !!}    
                            
                            {!! Form::select('lugar', $lugar, null, ['class' => 'form-control']) !!}         
                        </div>
                        

                        
                        <div class="col-md-6 mb-3">    
                            {!! Form::label('dificultad', 'Dificultad') !!}    
                            
                            {!! Form::select('dificultad', $dificultad, null, ['class' => 'form-control']) !!}         
                        </div>
                        
                    </div>   
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}       
@endsection    
    