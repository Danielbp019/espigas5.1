<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Emergency;
use Illuminate\Http\Request; //modelo para quitar partes  \App\Emergency en las funciones
use Maatwebsite\Excel\Facades\Excel;

//libreria

class ExcelEmergencyController extends Controller
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
        $this->date_from = $request->date_from;
        $this->date_to = $request->date_to;

        Excel::create('Emergencias Reporte Excel', function ($excel) {
            $excel->sheet('Emergencias Reporte', function ($sheet) {
                $emergencys = Emergency::select('radicated_received', 'niu', 'acronym', 'application_means_idapplication_means', 'application_date', 'time_application', 'day_care', 'hour_care', 'observations')
                    ->join('event_type', 'event_type_idevent_type', '=', 'idevent_type')
                    ->whereBetween('application_date', [$this->date_from, $this->date_to])
                    ->get();
                $sheet->fromArray($emergencys);
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
