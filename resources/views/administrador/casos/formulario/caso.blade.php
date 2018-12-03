<div class="row">                
    {!! Form::open(array('route' => 'guardar_caso','files' => true)) !!}    
    <div class="col-md-4"> 
        <div class="card"> 
            <div class="card-body"> 
                <div class="form-row">
                    <div class="col-md-12 mb-3">   
                        <h5>Datos del caso</h5>
                         <hr>
                    </div> 
                    <div class="col-md-12 mb-3"> 
                        {!! Form::label('etapas', 'Etapas') !!}    
                        <input name="etapas" id="etapas" type="checkbox" checked data-toggle="toggle"
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
                    <div class="col-md-12 mb-3">
                        {!! Form::label('audio', 'Seleccione la grabación (archivos .mp3) ') !!}                
                        {!! Form::file('audio', ['class' => 'form-control']) !!}
                    </div>                 
                </div>        
            </div>  
        </div>  
    </div>   
    <div class="col-md-8 estapa"> 
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-12 mb-3">                                
                        <h5 class="text-info">Pre-contractual</h5> 
                        <hr>
                    </div>
                    <div class="col-md-4 mb-3">    
                        {!! Form::label('categoria', 'Categorias') !!}            
                        {!! Form::select('categoria', $categorias, 0, ['class' => 'form-control']) !!}         
                    </div> 
                    <div class="col-md-4 mb-3">    
                        {!! Form::label('cuantia', 'Cuantias') !!}            
                        {!! Form::select('cuantia', $cuantias, null, ['class' => 'form-control']) !!}         
                    </div>                 
                    <div class="col-md-4 mb-3">    
                        {!! Form::label('estrato', 'Estrato') !!}    
                        
                        {!! Form::select('estrato', $estrato, null, ['class' => 'form-control']) !!}         
                    </div> 
                    <div class="col-md-12 mb-3">
                        <div class="col-md-6 mb-3" style="display: none" id="proceso2">                                                
                                {!! Form::label('valor_proceso', 'Valor del proceso o negocio') !!}                            
                                {!! Form::number('valor_proceso', null, ['class' => 'form-control']) !!}
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Ingrese el valor del negocio, ejemplo succión por un valor ($50.000.000 millones) = valor del negocio  
                                </small>                                                                              
                        </div>
                    </div>                       
                    <div class="col-md-6 mb-3">                            
                        {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-block']) !!}                        
                    </div>               
                </div> 
            </div> 
        </div>
    </div>
    <div class="col-md-8 md-3 estapa" style="display:none"> 
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <h5 class="text-info">Contractual</h5> 
                        <hr>                        
                    </div> 
                    <div class="col-md-6 mb-3">                            
                        {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-block']) !!}                        
                    </div>                                             
                </div>
            </div>
        </div>
    </div>    
    {!! Form::close() !!}    
</div>