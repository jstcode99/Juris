@extends('home')
    @section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nuevo_caso')}}">Nuevo caso</a></li>
    @endsection  
    @section('contenedor')
    {!! Form::open(array('route' => 'guardar_caso')) !!}  
    <div class="card">
        <div class="card-header">
            <h3>Registrar un nuevo caso</h3>
        </div>
        <div class="card-body">                                     
                @include('administrador.casos.formulario.caso')                      
        </div>
    </div>
    {{ Form::close() }}       


     <div class="modal fade bd-example-modal-lg1" id="Cliente1" tabindex="-1" role="dialog" aria-labelledby="Cliente1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Cliente1">Registrar nuevo cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array('route' => 'guardar_cliente')) !!}
                            <div class="form-row">     
                                @include('administrador.clientes.formulario.clientes')
                                 <div class="col-md-3 mb-3">
                                    {{ Form::submit('Guardar', ['class'=> 'btn btn-primary']) }}
                                </div>
                            </div>
                        {{ Form::close() }}  
                    </div>
                </div>
            </div>
        </div>
@endsection    

