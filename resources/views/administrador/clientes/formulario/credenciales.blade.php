                <div class="col-md-12 mb-3">                        
                        {!! Form::label('email','Correo') !!}                     
                        {!! Form::email('email', null, ['class'=> 'form-control','placeholder'=> 'Correo']) !!}        
                </div>

                <div class="col-md-12 mb-3">
                        {!! Form::label('password','Contraseña') !!}            
                        {!! Form::password('password',['class'=> 'form-control','placeholder'=> 'Contraseña']) !!}        
                </div>
                <div class="col-md-12 mb-3">
                        {!! Form::label('password_confirmation','Confirmación Contraseña') !!}            
                        {!! Form::password('password_confirmation', ['class'=> 'form-control','placeholder'=> 'Contraseña']) !!}        
                </div>