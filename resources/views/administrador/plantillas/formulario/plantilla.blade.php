<div class="form-row">
    <div class="col-md-6 mb-3">    
        {!! Form::label('titulo', 'Titulo') !!}    
        {!! Form::text('titulo', null, ['class' => 'form-control']) !!}    
    </div>
    <div class="col-md-3 mb-3">    
        {!! Form::label('autor', 'Autor') !!}     
        {!! Form::text('autor', null, ['class' => 'form-control']) !!}  
    </div> 
    <div class="col-md-3 mb-3">
        {!! Form::label('etiquetas', 'Etiqueta') !!}    
        {!! Form::text('etiquetas', null, ['class' => 'form-control']) !!}    
    </div>
    <div class="col-md-3 mb-3">
        {!! Form::label('version', 'Versión') !!}    
        {!! Form::text('version', null, ['class' => 'form-control']) !!}    
    </div>
    <div class="col-md-3 mb-3">
        @include('administrador.especialidades.formulario.selector_especialidades')            
    </div>
    <div class="col-md-6 mb-3">
        {!! Form::label('documento', 'Seleccione un documento') !!}    
        {!! Form::file('documento', ['class'=>'form-control']) !!}    
    </div>
    
</div>