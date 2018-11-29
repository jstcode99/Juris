@extends('home')
@section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('listado_abogados')}}">Listado de abogados</a></li>
        <li class="breadcrumb-item"><a href="{{ route('ver_abogado', ['documento' => $abogado->id]) }}">Ver abogado</a></li>
    @endsection  
    @section('contenedor')      

    <div class="card border-info">
        <div class="card-body">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <h5 class="card-title">Información</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$abogado->primer_nombre}} {{$abogado->segundo_apellido}}</h6>                
            </div>
            <div class="shadow p-3 mb-5 bg-white rounded">
                <h5 class="card-title">Datos de personales</h5>
                <a class="text-primary">Estado:</a>
                    @if($abogado->estado == 'ACTIVO' )
                        <a class="text-primary"><i class="fa fa-circle"></i></a>                    
                    @endif
                    @if($abogado->estado == 'INACTIVO' )
                        <a class="text-danger"><i class="fa fa-circle"></i></a>
                    @endif
                    <p class="text-dark">Documento de identidad: {{$abogado->tipo_documento}} : {{$abogado->documento}}</p>
                    <p class="text-dark">Nombres: {{ $abogado->primer_nombre }} {{ $abogado->segundo_nombre }}</p>
                    <p class="text-dark">Apellidos: {{$abogado->primer_apellido}}</p>
                    <p class="text-dark">Teléfono: {{$abogado->telefono}}</p>
                    <p class="text-dark">Dirección: {{$abogado->direccion}}</p>                    
            </div>

            <div class="col-sm-6 md-3">  
                <h4 class="text-dark">Tarjeta Profesional</h4><br>        
                <img width="150px" src="{{Storage::url($abogado->tarjeta_profesional)}}" alt="Tarjeta profesional" class="img-thumbnail">                    
            </div>
            <div class="col-md-2 mb-3">                
                <label for="validationCustom01">Descargar documento</label>
                <a href="{{ route('dercargar_tarjeta_abogado', ['documento' => $abogado->id]) }}" class="btn btn-primary btn-block" >
                            <span class="fa fa-download"></span>                                                                                         
                </a>                        
            </div>
        </div>
        
        <div class="card-footer">

        </div>        
    </div>
    @endsection
