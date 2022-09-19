<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Emergency;//modelo para quitar partes  \App\Emergency en las funciones
use Session;//mensajes de variables al usuario
use Redirect;//redireccionar
use App\Event_type;
use App\Application_means;

class EmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {//ojete que las variables estan en plural y las de la vista en el bucle tambien
        //scope integrado
        $emergencys= Emergency::search($request->niu)
            ->join('event_type', 'event_type_idevent_type', '=', 'idevent_type')
            ->orderby('radicated_received','desc')
            ->paginate(20);//sacar todos los registros
        return view('emergency.index', [
                                        'emergencys' => $emergencys
                                        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event_type= Event_type::lists('event_type', 'idevent_type');
        $application_means= Application_means::lists('application_means', 'idapplication_means');
        return view('emergency.create', [
                                            'event_type' => $event_type,
                                            'application_means' => $application_means
                                            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Emergency::create([
            'niu' => $request['niu'],
            'application_date' => $request['application_date'],
            'time_application' => $request['time_application'],
            'day_care' => $request['day_care'],
            'hour_care' => $request['hour_care'],
            'observations' => mb_convert_case($request['observations'], MB_CASE_LOWER, "UTF-8"),
            'name_holder' => mb_convert_case($request['name_holder'], MB_CASE_LOWER, "UTF-8"),
            'address' => mb_convert_case($request['address'], MB_CASE_LOWER, "UTF-8"),
            'bill' => $request['bill'],
            'name_applicant' => mb_convert_case($request['name_applicant'], MB_CASE_LOWER, "UTF-8"),
            'identity_applicant' => $request['identity_applicant'],
            'phone' => $request['phone'],
            'emergency_network' => $request['emergency_network'],
            'users_id' => $request['users_id'],
            'user_update' => $request['user_update'],
            'event_type_idevent_type' => $request['event_type_idevent_type'],
            'application_means_idapplication_means' => $request['application_means_idapplication_means']
        ]);
            Session::flash('message', 'Emergencia creada.');
            return Redirect::to('/emergency');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($radicated_received)
    {
        $emergency=Emergency::select('radicated_received','niu','name_holder','address','bill','identity_applicant','name_applicant','address','phone','event_type','application_means','emergency_network','application_date','time_application','observations')
        ->join('event_type', 'event_type_idevent_type', '=', 'idevent_type')
            ->join('application_means', 'application_means_idapplication_means', '=', 'idapplication_means')
                ->find($radicated_received);//se busca por id
        return view('emergency.show',[
                                        'emergency' => $emergency
                                        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($radicated_received)
    {
        $event_type= Event_type::lists('event_type', 'idevent_type');
        $application_means= Application_means::lists('application_means', 'idapplication_means');
        $emergency=Emergency::find($radicated_received);//se busca por id
        return view('emergency.edit',[
                                        'emergency'=>$emergency,
                                        'event_type' => $event_type,
                                        'application_means' => $application_means
                                        ]);//se pasa la informacion
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $radicated_received)
    {
        $emergency=Emergency::find($radicated_received);//se busca por id
        $emergency->fill([
            'niu' => $request['niu'],
            'day_care' => $request['day_care'],
            'hour_care' => $request['hour_care'],
            'observations' => mb_convert_case($request['observations'], MB_CASE_LOWER, "UTF-8"),
            'name_holder' => mb_convert_case($request['name_holder'], MB_CASE_LOWER, "UTF-8"),
            'address' => mb_convert_case($request['address'], MB_CASE_LOWER, "UTF-8"),
            'bill' => $request['bill'],
            'name_applicant' => mb_convert_case($request['name_applicant'], MB_CASE_LOWER, "UTF-8"),
            'identity_applicant' => $request['identity_applicant'],
            'phone' => $request['phone'],
            'emergency_network' => $request['emergency_network'],
            'user_update' => $request['user_update'],
            'event_type_idevent_type' => $request['event_type_idevent_type'],
            'application_means_idapplication_means' => $request['application_means_idapplication_means']
        ]);
        $emergency->save();
        Session::flash('message', 'Emergencia editada.');
        return Redirect::to('/emergency');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($radicated_received)
    {
        Emergency::destroy($radicated_received);
        Session::flash('message', 'Emergencia eliminada.');
        return Redirect::to('');
    }  

}//fin
