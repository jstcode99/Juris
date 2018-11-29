<div class="row">            
    <div class="col-md-4"> 
        <div class="form-row">                    
            <div class="col-md-12 mb-3">    
                {!! Form::label('descripcion', 'Descripción del caso') !!}                                        
                {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' => '5']) !!}                                   
                <small id="passwordHelpBlock" class="form-text text-muted">
                Ingrese información puntual del caso... 
                </small>
            </div>                    
        </div>        
    </div>
    <div class="col-md-8"> 
        <div class="form-row">                        
            <div class="col-md-6 mb-3"> 
                {!! Form::label('Etapas', 'Etapas') !!}    
                <button type="button" class="btn btn-outline-info btn-block">Pre-contractual</button> 
                <button type="button" class="btn btn-outline-success btn-block">Contractual</button>                                      
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Seleccione la etapa en la cual esta el caso. 
                </small>
            </div>
            <div class="col-md-6 mb-3">
                {!! Form::label('cliente', 'Clientes') !!}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Cliente1">+</button>
                    </div>
                    {!! Form::select('cliente', $clientes, 0, ['class' => 'form-control']) !!} 
                </div>                                                 
            </div>
        </div>
    </div>
</div>