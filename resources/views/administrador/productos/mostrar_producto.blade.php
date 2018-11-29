@extends('home')
    @section('contenedor')
        <div class="card">
            <div class="card-header">
                <h3>Actualizar producto ({{ $producto->id}})</h3>
            </div>
            <div class="card-body">                
            {!! Form::model($producto, ['route' => ['actualizar_producto',$producto->id],'method' => 'put']) !!}                
                @include('administrador.productos.formulario.producto')       
                <div class="col-md-4 mb-3">   
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-warning']) !!}
                </div>
            {{ Form::close() }}  
                <br>
                <br>  
            </div>
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
                </div>     
            </div>
        </div>
    <br>     
@endsection