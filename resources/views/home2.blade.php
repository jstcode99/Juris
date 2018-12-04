@extends('home')
    @section('breadcrumb-items')
        <li class="breadcrumb-item"><a href="{{ route('home')}}">Inicio</a></li>        
    @endsection  
    @section('contenedor')
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-content">                                
                                <h2 class="text-right">10</h2>
                                <a class="text-success"><i class="fa fa-folder-open-o fa-4x"></i></a>
                                <div class="h5">Casos activos</div>                                
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-content">                                
                                <h2 class="text-right">10</h2>
                                <a class="text-secondary"><i class="fa fa-folder-open-o fa-4x"></i></a>
                                <div class="h5">Casos inactivos</div>       
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>                         
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-content"> 
                                <div class="col-12">                               
                                    <h2 class="text-right">10</h2>
                                    <a class="text-left text-warning"><i class="fa fa-folder-open-o fa-4x"></i></a>
                                </div> 
                                <div class="h5">Casos suspendidos</div>  
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-content"> 
                                <div class="col-12">                               
                                    <h2 class="text-right">10</h2>
                                    <a class="text-left text-warning"><i class="fa fa-folder-open-o fa-4x"></i></a>
                                </div> 
                                <div class="h5">Otros</div>  
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection 