@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nuevo_abogado')}}">Nuevo abogado</a></li>
    @endsection  
    @section('contenedor')
    {!! Form::open(array('route' => 'guardar_abogado','files' => true )) !!}
        <div class="row">
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
                                            {!! Form::label('direccion','Direcci??n') !!}                     
                                            {!! Form::text('direccion', null, ['class'=> 'form-control','placeholder'=> 'Direcci??n']) !!}        
                                    </div>

                                    <div class="col-md-5 mb-3">                        
                                            {!! Form::label('telefono','Tel??fono') !!}                     
                                            {!! Form::text('telefono', null, ['class'=> 'form-control','placeholder'=> 'Tel??fono']) !!}        
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
                            <div class="col-md-6 mb-3">                        
                                    {!! Form::label('email','Correo') !!}                     
                                    {!! Form::email('email', null, ['class'=> 'form-control','placeholder'=> 'Correo']) !!}        
                            </div>

                            <div class="col-md-6 mb-3">
                                    {!! Form::label('password','Contrase??a') !!}            
                                    {!! Form::password('password',['class'=> 'form-control','placeholder'=> 'Contrase??a']) !!}        
                            </div>
                            <div class="col-md-6 mb-3">
                                    {!! Form::label('password_confirmation','Confirmaci??n Contrase??a') !!}            
                                    {!! Form::password('password_confirmation', ['class'=> 'form-control','placeholder'=> 'Contrase??a']) !!}        
                            </div>
                            <div class="col-md-6 mb-3">
                                {!! Form::label('tarjeta_profesional', 'Seleccione un documento') !!}                
                                {!! Form::file('tarjeta_profesional', ['class' => 'form-control']) !!}
                            </div>
                            {{ Form::submit('Guardar', ['class'=> 'btn btn-primary pull-right']) }}
                        </div>
                    </div>
                </div> 
            </div>
        </div>            
{{ Form::close() }}     
    @endsection
    