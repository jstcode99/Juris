        <div class="col-md-4 mb-3">   
            {!! Form::label('decreto', 'Decreto') !!}
            {!! Form::text('decreto', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4 mb-3">   
            {!! Form::label('valor', 'Valor') !!}
            {!! Form::text('valor', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4 mb-3">
        {!! Form::label('fecha', 'Fecha') !!}
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="fecha"><i class="fa fa-calendar"></i></span>
                </div>
                {!! Form::date('fecha', null, ['class' => 'form-control datepicker']) !!}
            </div>
        </div>