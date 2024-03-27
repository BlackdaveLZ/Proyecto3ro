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
    public function index()
    {
        $jornadas=DB::select("SELECT * FROM jornadas");
        $periodos=DB::select("SELECT * FROM aniolectivo");
        $meses=$this->meses();
        $ordenes=DB::select("SELECT o.secuencial, o.fecha_registro,j.jor_descripcion, o.mes,a.anl_descripcion
                            FROM ordenes_generadas o
                            JOIN matriculas m ON m.id=o.mat_id
                            JOIN jornadas j ON j.id=m.jor_id
                            JOIN aniolectivo a ON a.id=m.anl_id 
                            GROUP BY o.secuencial, o.fecha_registro,j.jor_descripcion,o.mes,a.anl_descripcion;");
        // $estudiantes =$this->generarOrdenes();

        foreach ($ordenes as $orden) {
            $orden->mes = $meses[$orden->mes];
        }

        return view('generaOrdenes.index')
        ->with('meses', $meses)
        ->with('jornadas', $jornadas)
        ->with('periodos', $periodos)
        ->with('ordenes', $ordenes); // Pasa los estudiantes a la vista
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
       

    public function mesesLetras($nmes){
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
        $datos=$rq->all();
        $anl_id=$datos["anl_id"];
        $jor_id=$datos["jor_id"];
        $mes=$datos["mes"];


        $nmes=$this->mesesLetras($mes);
        $campus="G";
        $secuenciales=DB::selectone("SELECT max(secuencial) as secuencial from ordenes_generadas");
        $sec=$secuenciales->secuencial+1;


        $estudiantes=DB::select("SELECT *, m.id as mat_id FROM matriculas m
                                JOIN estudiantes e ON m.est_id=e.id
                                JOIN jornadas j ON m.jor_id=j.id
                                JOIN cursos c ON m.cur_id=c.id
                                JOIN especialidades es ON m.esp_id=es.id
                                WHERE m.anl_id=$anl_id 
                                AND m.jor_id=$jor_id
                                AND m.mat_estado=1");
        $valor_pagar=75;
       
        
        
        foreach($estudiantes as $e){ 
            $input['mat_id']=$e->mat_id;  //id de la matricula
            $input['codigo']=$nmes.$campus.$e->jor_obs.$e->cur_obs.$e->esp_obs."-".$e->mat_id;  //MGM3IF-6546
            $input['fecha_registro']=date('Y-m-d');//
            $input['valor_pagar']=$valor_pagar;
            $input['fecha_pago']=null;
            $input['valor_pagado']=0;     
            $input['estado']=0;
            $input['mes']=$mes;
            $input['responsable']=Auth::user()->username; // Aquí debes proporcionar el ID del usuario
            $input['secuencial']=$sec; // Asigna un valor para el secuencial
            $input['documento']=null; // Asigna un valor para el documento

            GeneraOrdenes::create($input);
            
        }
            return redirect(route('genera_ordenes.index'));
            
    }

}
