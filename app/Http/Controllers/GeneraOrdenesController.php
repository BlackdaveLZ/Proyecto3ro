<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\GeneraOrdenes;
use DB;


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
    }

    public function generarOrdenes(Request $rq){
        // dd('estoy en generar ordenes');
        $datos=$rq->all();

        $anl_id=$datos['anl_id'];//año lectivo
        $jor_id=$datos['jor_id'];//jornada
        $mes=$datos['mes'];//mes

        // dd($datos);
        $estudiantes=DB::select("SELECT * FROM matriculas m 
                    JOIN estudiantes e ON m.est_id=e.id
                    WHERE m.anl_id=$anl_id 
                    AND jor_id=$jor_id
                    AND m.mat_estado=1");
                    // dd($estudiantes);
                   
                    foreach($estudiantes as $e)
                    {
                   $input[ 'mat_id']=; 
                   $input['codigo']=;
                   $input['fecha_registro']=;
                   $input['valor_pagar']=;
                   $input['fecha_pago']=;
                   $input['valor_pagado']=;
                   $input['estado']=;
                   $input['mes']=;
                   $input['responsable']=;
                   $input['secuencial']=;
                   $input['documento']=;  
                    }
       
     
        
    }
}
