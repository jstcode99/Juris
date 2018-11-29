 
                <div class="col-md-12 mb-3">            
                {{ Form::label('TipoPersona', 'Tipo de Persona') }}
                {{ Form::select('TipoPersona', array(
                                'Persona' => 'Persona','Empresa' => 'Empresa'),null,['class'=> 'form-control', 'id' => 'TipoPersona']) }}                    
                </div>
                <div class="col-md-6 mb-3 tipo">  
                        {{ Form::label('documento', 'Documento')}}
                        {{ Form::text('documento', null,['class'=> 'form-control','placeholder'=> 'Documento']) }}                
                </div>
                <div class="col-md-6 mb-3 tipo">  
                        {{ Form::label('tipo_documento', 'Tipo de documento')}}                        
                        {{ Form::select('tipo_documento', 
                                array('CC' => 'Cedula de ciudadania',
                                'TI' => 'Tarjeta de identidad',
                                'PP' => 'Pasaporte',
                                'CE' => 'Cedula de extranjeria'),null,['class'=> 'form-control']) }}
                </div>  
                <div class="col-md-6 mb-3 tipo" style="display:none">
                        {{ Form::label('nit', 'Nit')}}
                        {{ Form::text('nit', null,['class'=> 'form-control','placeholder'=> 'Nit']) }}
                </div>
                <div class="col-md-6 mb-3 tipo" style="display:none">  
                        {{ Form::label('nombre', 'Razon social')}}
                        {{ Form::text('nombre', null,['class'=> 'form-control','placeholder'=> 'Razon social']) }}                
                </div>        
                <div class="col-md-3 mb-3"> 
                        {{ Form::label('primer_nombre', 'Primer Nombre')}}
                        {{ Form::text('primer_nombre', null,['class'=> 'form-control','placeholder'=> 'Primer Nombre']) }}                  
                </div>

                <div class="col-md-3 mb-3">                            
                     {!! Form::label('segundo_nombre','Segundo Nombre') !!}                     
                     {!! Form::text('segundo_nombre', null, ['class'=> 'form-control','placeholder'=> 'Segundo Nombre']) !!}                                          
                </div>

                <div class="col-md-3 mb-3">     
                        {!! Form::label('primer_apellido','Primer Apellido') !!}                     
                        {!! Form::text('primer_apellido', null, ['class'=> 'form-control','placeholder'=> 'Primer Apellido']) !!} 
                </div>

                <div class="col-md-3 mb-3">     
                        {!! Form::label('segundo_apellido','Segundo Apellido') !!}                     
                        {!! Form::text('segundo_apellido', null, ['class'=> 'form-control','placeholder'=> 'Segundo Apellido']) !!} 
                </div>

                <div class="col-md-2 mb-3">
                        {!! Form::label('estrato','Estrato') !!}
                       {{  Form::selectRange('estrato', 1, 6, null, ['class'=> 'form-control'])}}
                </div>

                <div class="col-md-5 mb-3">                        
                        {!! Form::label('direccion','Dirección') !!}                     
                        {!! Form::text('direccion', null, ['class'=> 'form-control','placeholder'=> 'Dirección']) !!}        
                </div>

                <div class="col-md-5 mb-3">                        
                        {!! Form::label('telefono','Teléfono') !!}                     
                        {!! Form::text('telefono', null, ['class'=> 'form-control','placeholder'=> 'Teléfono']) !!}        
                </div>
                