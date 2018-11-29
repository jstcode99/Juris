@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nuevo_producto')}}">Nuevo producto</a></li>                      
    @endsection 
    @section('contenedor')
     <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3>Registrar un nuevo producto</h3>
                </div> 
                <div class="card-body">
                
                {!! Form::open(array('route' => 'guardar_producto','files' => true)) !!}
                    
                    @include('administrador.productos.formulario.producto')
                                        
                    <div class="col-md-4 mb-3">   
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    </div>
                {{ Form::close() }}                                              
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div style="display: none" id="proceso1">                    
                        @include('administrador.cobros.formulario.por_smlmv')
                        <button id="btn1" class="btn btn-primary" type="button" onclick="guardar_cobro_proceso(1)">Guardar cobro</button>
                    </div>

                    <div style="display: none" id="proceso2">                    
                        @include('administrador.cobros.formulario.por_porcentaje')
                        <button id="btn2" class="btn btn-primary" type="button" onclick="guardar_cobro_proceso(2)">Guardar cobro</button>
                    </div>
                    <div style="display: none" id="proceso4">                    
                            @include('administrador.cobros.formulario.por_porcentaje_smlmv_rango')                        
                    </div>
                    <div style="display: none" id="proceso3">                  
                        <button id="btn3" class="btn btn-primary" type="button" onclick="guardar_cobro_proceso(3)">Guardar cobro</button>
                    </div>
                    <div style="display: none" id="proceso5">                  
                        <button id="btn3" class="btn btn-primary" type="button" onclick="guardar_cobro_proceso(4)">Guardar cobro</button>
                    </div>
                </div>     
            </div> 
        </div>
    </div>             
@endsection
