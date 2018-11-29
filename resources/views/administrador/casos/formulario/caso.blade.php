<div class="row">            
    <div class="col-md-4"> 
        <div class="card"> 
            <div class="card-body"> 
                <div class="form-row">
                    <div class="col-md-12 mb-3">   
                        <h5>Datos del caso</h5>
                        <hr> 
                    </div> 
                    <div class="col-md-12 mb-3"> 
                        {!! Form::label('Etapas', 'Etapas') !!}    
                        <input type="checkbox" checked data-toggle="toggle"
                        data-on="Pre-contractual" data-off="Contractual" data-onstyle="success" data-offstyle="info">                                     
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Seleccione la etapa en la cual esta el caso. 
                        </small>
                    </div> 
                    <div class="col-md-12 mb-3">
                        {!! Form::label('cliente', 'Clientes') !!}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Cliente1">+</button>
                            </div>
                            {!! Form::select('cliente', $clientes, 0, ['class' => 'form-control']) !!} 
                        </div>                                                 
                    </div>            
                    <div class="col-md-12 mb-3">    
                        {!! Form::label('descripcion', 'Descripción del caso') !!}                                        
                        {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' => '5']) !!}                                   
                        <small id="passwordHelpBlock" class="form-text text-muted">
                        Ingrese información puntual del caso... 
                        </small>
                    </div>                    
                </div>        
            </div>  
        </div>  
    </div>   
    <div class="col-md-8"> 
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-12 mb-3">                                
                        <h5 class="text-info">Cotización</h5> 
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
    <div class="col-md-8 md-3"> 
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <h5>Pre-contractual</h5> 
                        <hr>  
                    </div>                                             
                </div>
            </div>
        </div>
    </div>
</div>