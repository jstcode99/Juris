<div class="row">                
    {!! Form::open(array('route' => 'guardar_caso','files' => true)) !!}    
    <div class="container-fluid"> 
        <div class="card"> 
            <div class="card-body"> 
                <div class="row">                 
                    <div class="col-md-12 mb-3"> 
                        {!! Form::label('etapas', 'Etapas') !!}    
                        <input name="etapas" id="etapas" type="checkbox" checked data-toggle="toggle"
                        data-on="Pre-contractual" data-off="Contractual" data-onstyle="success" data-offstyle="info">                                     
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Seleccione la etapa en la cual esta el caso. 
                        </small>
                    </div>    
                    <div class="col-sm-5 estapa">                         
                        <div class="form-row">
                            <div class="col-md-12 mb-3">                                
                                <h5 class="text-info">Pre-contractual</h5> 
                                <hr>
                            </div>
                            <div class="col-md-12 mb-3">    
                                <div class="col-md-12 mb-3">    
                                {!! Form::label('categoria', 'Categorias') !!}            
                                {!! Form::select('categoria', $categorias, null, ['class' => 'form-control']) !!}         
                                </div>
                            </div> 
                            <div class="col-md-12 mb-3">    
                                <div class="col-md-12 mb-3">    
                                {!! Form::label('cuantia', 'Cuantias') !!}            
                                {!! Form::select('cuantia', $cuantias, null, ['class' => 'form-control']) !!}         
                                </div>
                            </div>                
                            <div class="col-md-12 mb-3">    
                                <div class="col-md-12 mb-3">    
                                {!! Form::label('estrato', 'Estrato') !!}                            
                                {!! Form::select('estrato', $estrato, null, ['class' => 'form-control']) !!}         
                                </div> 
                            </div> 
                            <div class="col-md-12 mb-3">
                                <div class="col-md-12 mb-3" style="display: none" id="proceso2">                                                
                                        {!! Form::label('valor_proceso', 'Valor del proceso o negocio') !!}                            
                                        {!! Form::number('valor_proceso', null, ['class' => 'form-control']) !!}
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Ingrese el valor del negocio, ejemplo succión por un valor ($50.000.000 millones) = valor del negocio  
                                        </small>                                                                              
                                </div>
                            </div>                       
                        </div>
                    </div>
                    <div class="col-sm-5 estapa" style="display:none"> 
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <h5 class="text-info">Contractual</h5> 
                                <hr>                        
                            </div>                                                                      
                        </div>
                    </div>  
                    <div class="col-sm-7"> 
                        <div class="form-row">
                            <div class="col-md-12 mb-3">   
                                <h5>Datos del caso</h5>
                                <hr>
                            </div>                             
                            <div class="col-md-12 mb-3">
                                {!! Form::label('cliente', 'Clientes') !!}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Cliente1">+</button>
                                    </div>
                                    {!! Form::select('cliente', $clientes, null, ['class' => 'form-control']) !!} 
                                </div>                                                 
                            </div>            
                            
                            <div class="col-md-12 mb-3">    
                                {!! Form::label('descripcion', 'Descripción del caso') !!}        
                            <div class="col-md-12 mb-3">                             
                            @include('layouts.word')                            
                            </div>                                 
                                {!! Form::textarea('descripcion', null, ['class' => 'form-control word','rows' => '8']) !!}                                   
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                Ingrese información puntual del caso... 
                                </small>
                            </div>                            
                            <div class="col-md-12 mb-3">
                                {!! Form::label('audio', 'Seleccione la grabación') !!}   
                                
                                {!! Form::file('audio', ['class' => 'form-control', 'id' => 'audio', 'accept'=> '.mp3']) !!}                                    
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                Archivos extension .mp3, tamaño maximo 20mb
                                </small>
                            </div>     
                            <div class="col-md-12 mb-3">                            
                                {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-lg  pull-right']) !!}                        
                            </div>                
                        </div>     
                    </div>
                </div>   
            </div>  
        </div>  
    </div>          
    {!! Form::close() !!}    
</div>