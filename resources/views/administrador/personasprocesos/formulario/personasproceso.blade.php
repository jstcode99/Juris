                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        @if(isset($ultimo_procesos))
                            {!! Form::label('proceso', 'Numero de proceso generado') !!}                    
                            {!! Form::number('proceso',$ultimo_procesos, ['class'=>'form-control','readonly']) !!}                        
                        @endif
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
                        <div class="col-md-6 mb-3">
                            {!! Form::label('rols', 'Roles') !!}
                            {!! Form::select('rols', array('Demandante' => 'Demandante','Demandado' => 'Demandado'), null, ['class' => 'form-control']) !!}
                        </div> 
                        <div class="col-md-6 mb-3">
                            {!! Form::label('contraparte', 'Contra parte') !!}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contraparte1">        
                                        +
                                    </button>
                                </div>       
                                {!! Form::select('contraparte', $contraparte, 0, ['class' => 'form-control']) !!}                                       
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            {!! Form::label('rols', 'Roles') !!}
                            {!! Form::select('rols1', array('Demandante' => 'Demandante','Demandado' => 'Demandado'), null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>