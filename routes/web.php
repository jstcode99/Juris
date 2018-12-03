<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/Administrador', 'HomeController@index');
        Route::get('/Administrador/Clientes', 'HomeController@index');

Route::group( ['prefix' => 'Administrador', 'middleware' => 'auth'], function () {
    
        
        
        //Clientes
        Route::get('/Clientes/Nuevo-Cliente','ClientesController@crear')->name('nuevo_cliente');
        Route::get('/Clientes/Clientes-Registrados','ClientesController@mostrar')->name('listado_clientes');        
        Route::post('/Clientes/Guardar-Cliente','ClientesController@guardar')->name('guardar_cliente');
        Route::get('/Clientes/Mostrar-Cliente/{id}','ClientesController@mostrar_cliente')->name('mostrar_cliente');
        Route::put('/Clientes/Actualizar-Cliente/{id}','ClientesController@actualizar_cliente')->name('actualizar_cliente');
    
        //Especialidades
        Route::get('Especialidades/Nueva-Especialidad', 'EspecialidadesController@crear')->name('nuevo_especialidad');
        Route::post('Especialidades/Guardar-Especialidad', 'EspecialidadesController@guardar')->name('guardar_especialidad');
        Route::get('/Especialidades/Especialidades-Registradas','EspecialidadesController@mostrar')->name('listado_especialidades');        
        Route::get('/Especialidades/Mostrar-Especialidad/{id}','EspecialidadesController@mostrar_especialidad')->name('mostrar_especialidad');
        Route::put('/Especialidades/Actualizar-Especialidad/{id}','EspecialidadesController@actualizar_especialidad')->name('actualizar_especialidad');
        
        
        //Abogados
        Route::get('/Abogados/Nuevo-Abogado','AbogadosController@crear')->name('nuevo_abogado');
        Route::post('/Abogados/Guardar-Abogado','AbogadosController@guardar')->name('guardar_abogado');
        Route::get('/Abogados/Abogados-Registrados','AbogadosController@mostrar')->name('listado_abogados');        
        Route::get('/Abogados/Mostrar-Abogado/{id}','AbogadosController@mostrar_abogado')->name('mostrar_abogado');
        Route::get('/Abogados/Ver-Abogado/{id}','AbogadosController@ver_abogado')->name('ver_abogado');
        Route::put('/Abogado/Actualizar-Cliente/{id}','AbogadosController@actualizar_abogado')->name('actualizar_abogado');
        Route::get('/Abogado/Descargar-Tarjeta/{id}','AbogadosController@dercargar_tarjeta_abogado')->name('dercargar_tarjeta_abogado');

        // Instancias
        
        Route::get('Instancias/Nueva_Instancia','InstanciasController@crear')->name('nueva_instancia');
        Route::post('Instancias/Guardar-Instancia','InstanciasController@guardar')->name('guardar_instancia');
        Route::get('/Instancias/Instancias-Registradas','InstanciasController@mostrar')->name('listado_instancias');        
        Route::get('/Instancias/Mostrar-Instancia/{id}','InstanciasController@mostrar_instancia')->name('mostrar_instancia');
        Route::put('/Instancias/Actualizar-Instancia/{id}','InstanciasController@actualizar_instancias')->name('actualizar_instancia');


        //Salarios
        Route::get('Salarios/Nuevo_Salario','SalariosController@crear')->name('nuevo_salario');
        Route::post('Salarios/Guardar-Salario','SalariosController@guardar')->name('guardar_salario');
        Route::get('/Salarios/Salarios-Registradas','SalariosController@mostrar')->name('listado_salarios');        
        Route::get('/Salarios/Mostrar-Salario/{id}','SalariosController@mostrar_salario')->name('mostrar_salario');
        Route::put('/Salarios/Actualizar-Salario/{id}','SalariosController@actualizar_salario')->name('actualizar_salario');

        //Plantillas
        Route::get('Plantillas/Nuevo_Plantilla','PlantillasController@crear')->name('nueva_plantilla');
        Route::post('Plantillas/Guardar-Plantilla','PlantillasController@guardar')->name('guardar_plantilla');
        Route::get('/Plantillas/Plantillas-Registradas','PlantillasController@mostrar')->name('listado_plantillas');        
        Route::get('/Plantillas/Mostrar-Plantilla/{id}','PlantillasController@mostrar_plantilla')->name('mostrar_plantilla');
        Route::put('/Plantillas/Actualizar-Plantilla/{id}','PlantillasController@actualizar_plantilla')->name('actualizar_plantilla');
        Route::get('/Plantillas/Descargar-Plantilla/{id}','PlantillasController@descargar_plantilla')->name('descargar_plantilla');


        //Productos
        Route::get('Productos/Nuevo_Producto','ProductosController@crear')->name('nuevo_producto');        
        Route::post('Productos/Guardar-Producto','ProductosController@guardar')->name('guardar_producto');
        Route::get('/Productos/Productos-Registrados','ProductosController@mostrar')->name('listado_productos');        
        Route::get('/Productos/Mostrar-Producto/{id}','ProductosController@mostrar_producto')->name('mostrar_producto');
        Route::put('/Productos/Actualizar-Producto/{id}','ProductosController@actualizar_producto')->name('actualizar_producto');    

        Route::post('/Productos/Productos-Especialidad','ProductosController@productos_especialidad')->name('productos_especialidad');        
        Route::post('/Productos/Productos-Cobro','ProductosController@productos_cobros')->name('productos_cobros'); 
        //Cobros 
        Route::post('Cobros/Guardar-Cobro','CobrosController@guardar')->name('guardar');
        Route::post('Cobros/Mostrar-Cobro','CobrosController@productos_especialidad')->name('productos_especialidad');


        //Casos        
        Route::get('Casos/Nuevo-Caso','CasosController@crear')->name('nuevo_caso');
        Route::post('Casos/Guardar-Caso','CasosController@guardar')->name('guardar_caso');
        Route::get('/Casos/Casos-Registrados','CasosController@mostrar')->name('listado_casos');  
        Route::get('/Casos/Mostrar-Caso/{id}','CasosController@mostrar_caso')->name('mostrar_caso');
        Route::put('/Casos/Actualizar-caso/{id}','CasosController@actualizar_caso')->name('actualizar_caso');    
        Route::get('/Casos/Ver-caso/{id}','CasosController@ver_caso')->name('ver_caso');



        //Procesos        
        Route::get('Procesos/Nuevo-Proceso','ProcesosController@crear')->name('nuevo_proceso');
        Route::post('Procesos/Guardar-Proceso','ProcesosController@guardar')->name('guardar_proceso');
        Route::get('/Procesos/Procesos-Registrados','ProcesosController@mostrar')->name('listado_procesos');  
        Route::get('/Procesos/Mostrar-Proceso/{id}','ProcesosController@mostrar_proceso')->name('mostrar_proceso');
        Route::put('/Procesos/Actualizar-Proceso/{id}','ProcesosController@actualizar_proceso')->name('actualizar_proceso');    
        Route::get('/Procesos/Ver-Proceso/{id}','ProcesosController@ver_proceso')->name('ver_proceso');
        //ContraParte
        Route::get('ContraParte/Nuevo-ContraParte','ContraParteController@crear')->name('nuevo_contra_parte');
        Route::post('ContraParte/Guardar-ContraParte','ContraParteController@guardar')->name('guardar_ontra_parte');

        //PersonasProcesos
        Route::post('PersonasProcesos/Guardar-PersonasProcesos','PersonasProcesosController@guardar')->name('guardar_personasproceso');
        Route::get('PersonasProcesos/Crear-PersonasProcesos','PersonasProcesosController@crear')->name('crear_personasproceso');
              
        //Categorias        
        Route::get('Categorias/Nueva-Categoria', 'CategoriasController@crear')->name('nueva_categoria');
        Route::post('Categorias/Guardar-Categoria', 'CategoriasController@guardar')->name('guardar_categoria');        
        Route::put('Categorias/Actualizar-Categoria/{id}','CategoriasController@actualizar_categoria')->name('actualizar_categoria');
        Route::get('Categorias/Mostrar-Categoria/{id}', 'CategoriasController@mostrar_categoria')->name('mostrar_categoria');
    }); 


Route::get('/logout', function(){
        Auth::logout();
        $exitCode = Artisan::call('cache:clear');
        return Redirect::to('login');
     })->name('logout');
