<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Casos;

class CasosController extends Controller
{
    

    private  $procesos,$productos,$instancias,$abogados,$clientes,$contraparte,
        $demandantes,$riesgo,$lugar,$dificultad,$estrato,$tiempo,$clasificacion,$cuantias,$especialidades;

    public function __construct()
        {
            $this->middleware('auth');
            $this->especialidades = DB::table('especialidades')->pluck('nombre', 'id');
            $this->clientes = DB::table('personas')->where('name','=','CLIENTE')->pluck('documento', 'id');        
            $this->contraparte = DB::table('personas')->where('name','=','CONTRAPARTE')->pluck('documento', 'id');
            $this->instancias = DB::table('instancias')->pluck('nombre', 'id');
            $this->procesos = DB::table('procesos')->pluck('created_at', 'id');
            $this->productos = DB::table('productos')->pluck('nombre', 'id');
            $this->estrato = array(
                "" => "Selecione un estrato",
                "1" => "1",
                "2" => "2",
                "3" => "3",
                "4" => "4",
                "5" => "5",
                "6" => "6",
                "7" => "7",            
            );
    
            $this->tiempo = array(
                "" => "Selecione el nivel de dificultad",
                "Firma de poder" => "Firma de poder",
                "Tramites" => "Tramites",
                "Terminación" => "Terminación",
            );
            
    
            $this->clasificacion = array(
                "" => "Selecione una clasificación",
                "Ordinario" => "Ordinario",
            );

            $this->cuantias = array(
                "" => "Selecione una cuantia",
                "menor" => "Menor cuantia",
                "mayor" => "Mayor cuantia",
            );
        }
    public function Reporte_casos()
    {
        
    }

    public function crear()
    {
        $clientes = array_add($this->clientes, 0,"No selecionar una cliente");
        $especialidades = array_add($this->especialidades,0,"No selecione una especialidad");
        return view('administrador.casos.nuevo_caso',[
            'clientes'=> $this->clientes,
            'estrato'=> $this->estrato,
            'tiempo'=> $this->tiempo,            
            'instancias'=> $this->instancias,
            'procesos' => $this->procesos,
            'clasificacion' => $this->clasificacion,
            'cuantias' => $this->cuantias,
            'productos'=> $this->productos,
            'especialidades'=> $this->especialidades,
            ]);  
    }
    public function guardar(Request $request)
    {
        $caso = new Casos;
        if($request->cliente == '' || $request->cliente == null || $request->cliente == 0)
        {
            return back()->with('warning', 'Debe selecionar un cliente');
        }
        $datos = $request->validate([
            'descripcion' => 'required|string|max:750', 
        ]);
        
        $producto = DB::table('productos')
            ->where('productos.id' ,'=', $request->producto)
            ->join('cobros','cobros.id','=','productos.id_cobro')
            ->select('productos.*','cobros.*')->get();
        $smlmv = DB::table('salarios')->orderby('created_at','DESC')->get();
        $id_caso = DB::table('casos')->orderby('created_at','DESC')->pluck('id');
        //return $producto;
        
        switch($producto[0]->tipo_tarifa){                
            case 'CUOTA FIJA SALARIAL':
                // Procesos1                 
                $caso->valor_caso = self::Proceso1($producto[0]->n_smlmv,$smlmv[0]->valor);
            break;
            case 'CUOTA FIJA PORCENTUAL':
                // Procesos2          
                $datos = $request->validate([
                    'valor_proceso' => 'required|numeric', 
                ]);      
            break;
            case 'CUOTA LITIS SALARIAL':
                 // Procesos1                 
                $caso->valor_caso = self::Proceso1($producto[0]->n_smlmv,$smlmv[0]->valor);                
            break;            
            case 'CUOTA LITIS PORCENTUAL':
                // Procesos2    
                $datos = $request->validate([
                    'valor_proceso' => 'required|numeric', 
                ]);            
            break;
            case 'CUOTA MIXTA SALARIAL MAS PORCENTUAL':
                // Procesos3   
                $datos = $request->validate([
                    'valor_proceso' => 'required|numeric', 
                ]);                                         
            break;            
            case 'CUOTA MIXTA SALARIAL POR RANGO':   
                // Procesos4
                $datos = $request->validate([
                    'valor_proceso' => 'required|numeric', 
                ]);                                                   
            break;
            case 'CUOTA MINIMA SALARIAL':
                 // Procesos1                 
                $caso->valor_caso = self::Proceso1($producto[0]->n_smlmv,$smlmv[0]->valor);                
            break;
            case 'CUOTA PLENA SALARIAL':
                 // Procesos1                 
                $caso->valor_caso = self::Proceso1($producto[0]->n_smlmv,$smlmv[0]->valor);                
            break; 
        }
        
        
        if($request->etapas=='on')
        {
            $datos = $request->validate([                
                'id_instancia' => 'required|numeric', 
                'estrato' => 'required|numeric', 
                'cuantia' => 'required|string|max:100', 
                'clase' => 'required|string|max:100', 
            ]);
            $caso->etapa = 'Pre-contractual';
            $caso->estado = 'ACTIVO';
            $caso->descripcion1 = $request->descripcion;
            $caso->cuantia = $request->cuantia;
            $caso->clase = $request->clase;
            $caso->estrato = $request->estrato;
            $caso->id_producto = $request->producto;
            $caso->id_instancia = $request->id_instancia;
            $caso->id_persona = $request->cliente;

            $caso->save();
            if($caso){
                $caso = DB::table('casos')->orderby('created_at','DESC')->get();
                return back()->with('super_success', 'El caso ha sido registrado con exito, Codigo de caso es: '.$caso[0]->id);
            }
        }else {
            $caso->etapa = 'Contractual';
        }                                                
    }
    public function Proceso1($n_smlmv, $smlmv)
    {
        return $n_smlmv * $smlmv;
    }

    public function Proceso2($porcentaje1, $smlmv)
    {
        return $n_smlmv * $smlmv;
    }
}
