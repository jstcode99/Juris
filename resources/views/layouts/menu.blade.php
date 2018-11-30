<nav class="navbar navbar-expand-lg navbar-expand-sm navbar-dark shadow" style="background:#0b64c4">
    <a class="sidebar-toggle mr-4" href="#">
        <i class="fa fa-bars"></i>
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <h4 class="navbar-brand" href="{{ route('home')}}">Juris</h4>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home')}}">Home <span class="sr-only">(current)</span></a>
      </li>

        <li class="nav-item dropdown">         
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Parametros
          </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('nuevo_especialidad') }}">Especialidades</a>              
                <a class="dropdown-item" href="{{ route('nueva_instancia') }}">Instancias</a>              
            </div>  
        </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown"
         href="#" role="button" aria-haspopup="true" aria-expanded="false">Personas</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" data-feather="shopping-cart" href="">
            Clientes
            
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('nuevo_cliente') }}">
            Nuevo cliente  
            <i class="fa fa-user-plus"></i>        
          </a>
          <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('listado_clientes') }}">
            Listado de cliente
            <i class="fa fa-list-ol"></i>
          </a>
            <div class="dropdown-divider"></div>
          <a class="dropdown-item" data-feather="shopping-cart" href="">
            Abogados
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('nuevo_abogado') }}">
            Nuevo abogado 
            <i class="fa fa-address-card-o"></i>
          </a>
          <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('listado_abogados') }}">
            Listado de Abogados
            <i class="fa fa-list-ol"></i>
          </a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav">     
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>   
      <li class="nav-item dropdown">         
          <a class="nav-link" href="/">
            {{ Auth::user()->email }}  <i class="fa fa-user"></i>
        </a>
        <li class="nav-item dropdown">         
          <a class="nav-link" href="{{ route('logout') }}">
            Salir <i class="fa fa-sign-out"></i>
        </a>
      </li> 
      </li>    
    </ul>
  </div>
</nav>  

<div class = "d-flex">
    <div class = "sidebar sidebar-dark bg-dark list-unstyled">
            <ul class="navbar-nav">
            <li>
                <a href="{{ route('home')}}">
                <i class="fa fa-dashboard">
                </i> Inicio</a>
                <hr class="bg-light">
            </li>

            <li>
                <a class="fa fa-folder-open-o" data-toggle="collapse"  href="#collapseExample7"  role="button" aria-expanded="false" aria-controls="collapseExample">
                     Casos y Procesos   
                </a>            
                <ul class="list-unstyled collapse" id="collapseExample7">
                    <li>
                        <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('nuevo_caso')}}">
                        Nuevo caso  
                        <i class="fa fa-clipboard"></i> 
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('nuevo_proceso')}}">
                        Nuevo proceso  
                        <i class="fa fa-folder"></i> 
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('listado_procesos') }}">
                            Listado de procesos
                            <i class="fa fa-list-ol"></i>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="fa fa-user-plus" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Personas
                </a>
                <ul class="list-unstyled collapse" id="collapseExample">
                    <li>
                        <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('nuevo_cliente') }}">
                        Nuevo cliente  
                        <i class="fa fa-user-plus"></i> 
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('listado_clientes') }}">
                            Listado de cliente
                            <i class="fa fa-list-ol"></i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('nuevo_contra_parte') }}">
                        Nueva persona  
                        <i class="fa fa-user-plus"></i> 
                        </a>
                    </li>                
                    <li>
                        <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('nuevo_abogado') }}">
                            Nuevo abogado 
                            <i class="fa fa-address-card-o"></i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" data-feather="shopping-cart" href="{{ route('listado_abogados') }}">
                            Listado de Abogados
                            <i class="fa fa-list-ol"></i>
                        </a>
                    </li>
                </ul>
            </li>            

            <li>
                <a class="fa fa-gear"  data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Parametros
                </a>
                <ul class="list-unstyled collapse" id="collapseExample3">
                    <li>
                        <a class="dropdown-item" href="{{ route('nuevo_especialidad') }}">
                            Especialidades                        
                            <i class="fa fa-graduation-cap"></i>
                        </a>                        
                    </li>                    
                    <li>
                        <a class="dropdown-item" href="{{ route('nueva_instancia') }}">
                            Instancias                        
                            <i class="fa fa-list"></i>
                        </a>                        
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('nuevo_salario') }}">
                            Salarios                        
                            <i class="fa fa-money"></i>
                        </a>                        
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('nueva_plantilla') }}">
                            Nueva plantilla                        
                            <i class="fa fa-file-o plus"></i>
                        </a>                        
                    </li>                    
                    <li>
                        <a class="dropdown-item" href="{{ route('listado_plantillas') }}">
                            Listado de plantillas                        
                            <i class="fa fa-list"></i>
                        </a>                        
                    </li>
                     <li>
                        <a class="dropdown-item" href="{{ route('nuevo_producto') }}">
                            Nuevo producto                        
                            <i class="fa fa-cube"></i>
                        </a>                        
                    </li>                    
                    <li>
                        <a class="dropdown-item" href="{{ route('listado_productos') }}">
                            Listado de productos                      
                            <i class="fa fa-list"></i>
                        </a>                        
                    </li>                           
                <li>            
            </li>            
        </ul>
    </div>
    