<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pqrnc;
use Maatwebsite\Excel\Facades\Excel;

class ExcelPqrncController extends Controller
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
    {
            $this->date_from=$request->date_from;
            $this->date_to=$request->date_to;
        
         Excel::create('Pqrnc Reporte Excel', function($excel) {
            $excel->sheet('Pqrnc Reporte', function($sheet) {
 
            $pqrncs = Pqrnc::select('code_dane', 'type_service','niu','user','address','phone','application_means_idapplication_means','answer_date','answer_pqrnc_idanswer_pqrnc','procedure_pqrnc_idprocedure_pqrnc', 'idpqrnc')
                ->whereBetween('date', [ $this->date_from, $this->date_to])
                ->get();
 
                $sheet->fromArray($pqrncs);
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
