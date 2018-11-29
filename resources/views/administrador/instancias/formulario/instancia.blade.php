        <div class="col-md-4 mb-3">   
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4 mb-3">   
            {!! Form::label('porcentaje', 'Porcentaje') !!}
            {!! Form::number('porcentaje', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4 mb-3">   
            {!! Form::label('tipo', 'Tipo') !!}            
            {!! Form::select('tipo', array('Adicion' => 'Adición', 'Reduccion' => 'Reducción'),null, ['class'=> 'form-control']) !!}            
        </div>
        