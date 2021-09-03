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
                    <div class="col-sm-12"> 
                        <div class="form-row">
                            <div class="col-md-12 mb-3 estapa" style="display:none">
                                <h5 class="text-info">Contractual</h5>                                                         
                            </div>  
                            <div class="col-md-12 mb-3 estapa">                                
                                <h5 class="text-info">Pre-contractual</h5>                                 
                            </div>    
                            <div class="col-md-12 mb-3">   
                                <h5>Datos del caso</h5>
                                <hr>
                            </div>                             
                            <div class="col-md-7 mb-3">
                                {!! Form::label('cliente', 'Clientes') !!}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Cliente1">+</button>
                                    </div>
                                    {!! Form::select('cliente', $clientes, null, ['class' => 'form-control', 'id' => 'cliente']) !!} 
                                </div>                                                 
                            </div>            
                            <div class="col-md-7 mb-3">
                                {!! Form::label('audio', 'Seleccione la grabación') !!}   
                                
                                {!! Form::file('audio', ['class' => 'form-control', 'id' => 'audio', 'accept'=> '.mp3']) !!}                                    
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                Archivos extension .mp3, tamaño maximo 20mb
                                </small>
                            </div>  
                            <div class="col-md-6 mb-3 pull-ro">    
                                {!! Form::label('cuantia', 'Cuantia') !!}            
                                {!! Form::select('cuantia', $cuantias, "0", ['class' => 'form-control', 'id' => 'categoria']) !!}         
                            </div> 
                            <div class="col-md-8 mb-3">    
                                {!! Form::label('descripcion', 'Descripción del caso') !!}        
                            <div class="col-md-8 mb-3">                             
                            @include('layouts.word')                            
                                </div>                                 
                                    {!! Form::textarea('descripcion', null, ['class' => 'form-control word','rows' => '8']) !!}                                   
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                    Ingrese información puntual del caso... 
                                    </small>
                                </div>                                                          
                            <div class="col-md-12 mb-3">     
                                <div class="col-md-8 mb-3">                       
                                {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-lg  pull-right']) !!}                        
                                </div> 
                            </div>                
                        </div>     
                    </div>
                </div>   
            </div>  
        </div>  
    </div>          
    {!! Form::close() !!}    
</div>