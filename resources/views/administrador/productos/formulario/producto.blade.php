<div class="form-row">
    <div class="col-md-4 mb-3">    
        {!! Form::label('nombre', 'Nombre') !!}    
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}    
    </div>
    <div class="col-md-4 mb-3">
        @include('administrador.especialidades.formulario.selector_especialidades')            
    </div>
    <div class="col-md-4 mb-3">
        {!! Form::label('tipo_tarifa', 'Tipo de tarifa') !!}            
        {!! Form::select('tipo_tarifa',array(   
                                        '10' => 'Seleccione un tarifa',                    
                                        'CUOTA FIJA SALARIAL' => 'CUOTA FIJA SALARIAL', 
                                        'CUOTA FIJA PORCENTUAL' => 'CUOTA FIJA PORCENTUAL',
                                        'CUOTA LITIS SALARIAL' => 'CUOTA LITIS SALARIAL',
                                        'CUOTA LITIS PORCENTUAL' => 'CUOTA LITIS PORCENTUAL',
                                        'CUOTA MIXTA SALARIAL MAS PORCENTUAL' => 'CUOTA MIXTA SALARIAL MAS PORCENTUAL',
                                        'CUOTA MIXTA SALARIAL POR RANGO' => 'CUOTA MIXTA SALARIAL POR RANGO',
                                        'CUOTA MINIMA SALARIAL' => 'CUOTA MINIMA SALARIAL',
                                        'CUOTA PLENA SALARIAL' => 'CUOTA PLENA SALARIAL',
                                        'CUOTA PLENA PORCENTUAL' => 'CUOTA PLENA PORCENTUAL',
        ) ,null, ['class' => 'form-control' , 'id' => 'tipo_tarifa' ]) !!}        
    </div>    
    <div class="col-md-6 mb-3">    
        {!! Form::label('descripcion', 'Descripcion') !!}     
        {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' => 3]) !!}  
    </div>               
    <div class="col-md-6 mb-3">
      {!! Form::label('id_cobro', 'Cobro') !!} 
      <div class="input-group">
        <div class="input-group-prepend">
            <a class="btn btn-secondary" onclick='agregar_cobro();' >+</a>            
        </div>
        {!! Form::select('id_cobro', array('' => 'Seleccione un cobro'), null, ['class' => 'form-control']) !!}                 
      </div>
    </div>
</div>


