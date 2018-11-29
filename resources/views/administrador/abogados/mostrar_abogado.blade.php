@extends('home')
    @section('contenedor') 
{!! Form::model($abogado, ['route' => ['actualizar_abogado',$abogado->id],'method' => 'put','files' => true]) !!}
 <div class="row">
            <br>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Datos personales</h4>                        
                    </div> 
                    <div class="card-body">            
                        
                            <div class="form-row">     
                                    <div class="col-md-6 mb-3">
                                        {{ Form::label('tipo_documento', 'Tipo de Documento')}}
                                        {{ Form::select('tipo_documento', 
                                            array('CC' => 'Cedula de ciudadania',
                                                'TI' => 'Tarjeta de identidad',
                                                'PP' => 'Pasaporte',
                                                'CE' => 'Cedula de extranjeria'),null,['class'=> 'form-control']) }}
                                    </div>

                                    <div class="col-md-6 mb-3">  
                                        {{ Form::label('documento', 'Documento')}}
                                        {{ Form::text('documento', null,['class'=> 'form-control','placeholder'=> 'Documento']) }}                
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
                            </div>                                
                    </div>
                </div>   
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Credenciales de acceso</h4>
                    </div> 
                    <div class="card-body"> 
                        <div class="form-row">  
                            <div class="col-md-3 mb-3">                        
                                    {!! Form::label('email','Correo') !!}                     
                                    {!! Form::email('email', null, ['class'=> 'form-control','placeholder'=> 'Correo']) !!}        
                            </div>

                            <div class="col-md-6 mb-3">
                                    {!! Form::label('password','Contraseña') !!}            
                                    {!! Form::password('password',['class'=> 'form-control','placeholder'=> 'Contraseña']) !!}        
                            </div>
                            <div class="col-md-6 mb-3">
                                    {!! Form::label('password_confirmation','Confirmación Contraseña') !!}            
                                    {!! Form::password('password_confirmation', ['class'=> 'form-control','placeholder'=> 'Contraseña']) !!}        
                            </div>
                            <div class="col-md-12 mb-3">
                                {!! Form::label('tarjeta_profesional', 'Seleccione un documento') !!}                
                                {!! Form::file('tarjeta_profesional', ['class' => 'form-control']) !!}
                            </div>
                             <div class="col-md-12 mb-3">
                                {{ Form::submit('Guardar', ['class'=> 'btn btn-warning']) }}
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>  
    {!! Form::close() !!}          
@endsection     