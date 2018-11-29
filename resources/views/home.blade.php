<! doctype html>
<html lang = "es">
@include('layouts.head')
<body class = "bg-light" id="pagina">        
    @include('layouts.menu')
    
    <div class="content" style="background:#0b64c4;">
        <div class="header pb-8 pt-5 pt-md-8 shadow bg-light">
            <div class="container-fluid">
                <nav class="navbar navbar-light">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @yield('breadcrumb-items')
                        </ol>
                    </nav>
                </nav>       
            </div>
        </div>
        <div class="container">
            @include('layouts.errores')
        </div>
        <div class="col-12 mb-6">
            @yield('contenedor')
            <nav class="navbar fixed-bottom navbar-light">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </nav>
        </div>        
               
    </div>  
</div>
@include('layouts.pie')
</body>
</html>