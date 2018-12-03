<div class="form-row"> 
    <div class="col-md-6 mb-3">     
        <div class="col-md-6 mb-3">                
            {!! Form::label('Rama','Rama') !!}                                
            {!! Form::select('rama', array(
                                    '0' => 'Selecccione un rama', 
                                    'Administrativa' => 'Administrativa',                                     
                                    'Civil' => 'Civil', 
                                    'Penal' => 'Penal',
                                    ),null,['class' => 'form-control']) !!}                                              
        </div>  
        <div class="col-md-6 mb-3">                
            {!! Form::label('nombre','Nombre') !!}                    
            {!! Form::text('nombre', null, ['class'=>'form-control']) !!}                                    
        </div>
    </div>              
</div>