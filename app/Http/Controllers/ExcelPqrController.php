<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pqr;
use App\Causal_detail;
use Maatwebsite\Excel\Facades\Excel;

class ExcelPqrController extends Controller
{ 
    private $date_from;
    private $date_to;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //se indica que las variables privadas son cada dato del request
        $this->date_from=$request->date_from;
        $this->date_to=$request->date_to;
            
         Excel::create('PQR Reporte Excel', function($excel) {
            $excel->sheet('PQR Reporte', function($sheet) {
        $pqrs=Pqr::select('department_code','municipality_code','settlement_type','idpqr','date','procedure_pqr_idprocedure_pqr','causal_group','causal_detail_idcausal_detail','niu','bill', 'answer_pqr_idanswer_pqr', 'answer_date', 'rta_niu', 'date_notification', 'notification_pqr_idnotification_pqr', 'sspd')
                ->join('causal_detail', 'causal_detail_idcausal_detail', '=', 'idcausal_detail')//ojete con la llave: tabla añadida - llave propia osea de pqr - llave añadida
                ->whereBetween('date', [ $this->date_from, $this->date_to])//se ponen las variables
                ->get();
           
                $sheet->fromArray($pqrs);
            });
        })->export('xls');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
