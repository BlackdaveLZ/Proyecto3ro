<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\GeneraOrdenes;
use DB;
use Auth;

class GeneraOrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $rq)
    {
        //
        $periodos=DB::select("SELECT * FROM aniolectivo");
        $jornadas=DB::select("SELECT * FROM jornadas");
        $meses=$this->meses();
        return view('generaOrdenes.index')
        ->with('periodos', $periodos)
        ->with('jornadas', $jornadas)
        ->with('meses', $meses)
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function meses(){
        return[
            '1' => 'Enero',
            '2' => 'Febrero',
            '3' => 'Marzo',
            '4' => 'Abril',
            '5' => 'Mayo',
            '6' => 'Junio',
            '7' => 'Julio',
            '8' => 'Agosto',
            '9' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre'



        ];
              return $meses;
    }
       

    public function mesesLetra($nmes){
        $result="";
       $nmes==1?$result="E":"";
       $nmes==2?$result="F":"";
       $nmes==3?$result="M":"";
       $nmes==4?$result="A":"";
       $nmes==5?$result="MY":"";
       $nmes==6?$result="J":"";
       $nmes==7?$result="JL":"";
       $nmes==8?$result="AG":"";
       $nmes==9?$result="O":"";
       $nmes==10?$result="S":"";
       $nmes==11?$result="N":"";
       $nmes==12?$result="D":"";
       
    }

    public function generarOrdenes(Request $rq){
        // dd('estoy en generar ordenes');
        $datos=$rq->all();

        $anl_id=$datos['anl_id'];//año lectivo
        $jor_id=$datos['jor_id'];//jornada
        $mes=$datos['mes'];//mes

        // dd($datos);
        $estudiantes=DB::select("SELECT * , m.id as mat_id FROM matriculas m 
                    JOIN estudiantes e ON m.est_id=e.id
                    WHERE m.anl_id=$anl_id 
                    AND jor_id=$jor_id
                    AND m.mat_estado=1");
                    // dd($estudiantes);


                    $valor_pagar=75;
         
                    foreach($estudiantes as $e)
                    {
                        
                   $input[ 'mat_id']=$e->mat_id;            //id de la matricula
                   $input['codigo']=;             // codigo ejemplo :  GMG
                   $input['fecha_registro']=date('Y-m-d');
                   $input['valor_pagar']=$valor_pagar;
                   $input['fecha_pago']=null;
                   $input['valor_pagado']=0;     
                   $input['estado']=0;         //// pendiente -> 0   ------ pagado -> 1
                   $input['mes']=$mes;
                   $input['responsable']=Auth::user()->usu_nombres;
                   $input['secuencial']=;  // secuencial de la orden
                   $input['documento']=null;    
                    }
       
     
        
    }
}
