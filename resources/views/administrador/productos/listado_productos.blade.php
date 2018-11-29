
@extends('home')
    @section('contenedor')
<div class="card">
    <div class="card-header">
            <h3>Listado de productos</h3>
    </div>     
    <div class="card-body">           
        <div class="table-responsive" style="width:100%;">
            <table id="tabla_productos" class="table table-hover table-bordered">
                <thead>
                    <th>N°</th>
                    <th>Titulo</th>
                    <th>Descripción</th>            
                    <th>Tarifa</th>            
                    <th>Especialidad</th>
                    <th>Editar</th>  
                </thead>
                <tbody>   
                    @isset($productos) 
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->descripcion}}</td>
                                <td>{{ $producto->tipo_tarifa}}</td>        
                                <td>{{ $producto->especialidad_nombre }}</td>        
                                <td>
                                    <a href="{{ route('mostrar_producto', ['id' => $producto->id]) }}" class="btn btn-default btn-xs" >
                                        <span class="fa fa-pencil"></span>                                                                                         
                                    </a>
                                </td>                                                    
                            </tr>
                        @endforeach
                    @endisset  
                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection