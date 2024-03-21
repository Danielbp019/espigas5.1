<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application_means;
use App\Models\Emergency; //modelo para quitar partes  \App\Emergency en las funciones
use App\Models\Event_type;
use Illuminate\Http\Request;
use Redirect; //redireccionar
use Session; //mensajes de variables al usuario

class EmergencyController extends Controller
{
    public function index(Request $request)
    { //ojete que las variables estan en plural y las de la vista en el bucle tambien
        //scope integrado
        $emergencys = Emergency::search($request->niu)
            ->join('event_type', 'event_type_idevent_type', '=', 'idevent_type')
            ->orderby('radicated_received', 'desc')
            ->paginate(20); //sacar todos los registros
        return view('emergency.index', [
            'emergencys' => $emergencys,
        ]);
    }

    public function create()
    {
        $event_type = Event_type::orderBy('event_type')->lists('event_type', 'idevent_type');
        $application_means = Application_means::orderBy('application_means')->lists('application_means', 'idapplication_means');
        return view('emergency.create', [
            'event_type' => $event_type,
            'application_means' => $application_means,
        ]);
    }

    public function store(Request $request)
    {
        try {
            Emergency::create([
                'niu' => $request['niu'],
                'application_date' => $request['application_date'],
                'time_application' => $request['time_application'],
                'day_care' => $request['day_care'],
                'hour_care' => $request['hour_care'],
                'observations' => $this->mb_ucfirst(trim($request['observations']), "UTF-8", true),
                'name_holder' => $this->mb_ucfirst(trim($request['name_holder']), "UTF-8", true),
                'address' => $this->mb_ucfirst(trim($request['address']), "UTF-8", true),
                'bill' => $request['bill'],
                'name_applicant' => $this->mb_ucfirst(trim($request['name_applicant']), "UTF-8", true),
                'identity_applicant' => $request['identity_applicant'],
                'phone' => $request['phone'],
                'emergency_network' => $request['emergency_network'],
                'users_id' => $request['users_id'],
                'user_update' => $request['user_update'],
                'event_type_idevent_type' => $request['event_type_idevent_type'],
                'application_means_idapplication_means' => $request['application_means_idapplication_means'],
            ]);
            Session::flash('message', 'Emergencia creada.');
            return Redirect::to('/emergency');
        } catch (\Exception $e) {
            Session::flash('error', 'Hubo un problema al crear la Emergencia. Por favor, inténtalo de nuevo.');
            return Redirect::to('/emergency');
        }
    }

    public function show($radicated_received)
    {
        $emergency = Emergency::select('radicated_received', 'niu', 'name_holder', 'address', 'bill', 'identity_applicant', 'name_applicant', 'address', 'phone', 'event_type', 'application_means', 'emergency_network', 'application_date', 'time_application', 'observations')
            ->join('event_type', 'event_type_idevent_type', '=', 'idevent_type')
            ->join('application_means', 'application_means_idapplication_means', '=', 'idapplication_means')
            ->find($radicated_received); //se busca por id
        return view('emergency.show', [
            'emergency' => $emergency,
        ]);
    }

    public function edit($radicated_received)
    {
        $event_type = Event_type::orderBy('event_type')->lists('event_type', 'idevent_type');
        $application_means = Application_means::orderBy('application_means')->lists('application_means', 'idapplication_means');
        $emergency = Emergency::find($radicated_received); //se busca por id
        return view('emergency.edit', [
            'emergency' => $emergency,
            'event_type' => $event_type,
            'application_means' => $application_means,
        ]); //se pasa la informacion
    }

    public function update(Request $request, $radicated_received)
    {
        try {
            $emergency = Emergency::find($radicated_received);
            $emergency->fill([
                'niu' => $request['niu'],
                'day_care' => $request['day_care'],
                'hour_care' => $request['hour_care'],
                'observations' => $this->mb_ucfirst(trim($request['observations']), "UTF-8", true),
                'name_holder' => $this->mb_ucfirst(trim($request['name_holder']), "UTF-8", true),
                'address' => $this->mb_ucfirst(trim($request['address']), "UTF-8", true),
                'bill' => $request['bill'],
                'name_applicant' => $this->mb_ucfirst(trim($request['name_applicant']), "UTF-8", true),
                'identity_applicant' => $request['identity_applicant'],
                'phone' => $request['phone'],
                'emergency_network' => $request['emergency_network'],
                'user_update' => $request['user_update'],
                'event_type_idevent_type' => $request['event_type_idevent_type'],
                'application_means_idapplication_means' => $request['application_means_idapplication_means'],
            ]);
            $emergency->save();
            Session::flash('message', 'Emergencia editada.');
            return Redirect::to('/emergency');
        } catch (\Exception $e) {
            Session::flash('error', 'Hubo un problema al editar la Emergencia. Por favor, inténtalo de nuevo.');
            return Redirect::to('/emergency');
        }
    }

    public function destroy($radicated_received)
    {
        try {
            Emergency::destroy($radicated_received);
            Session::flash('message', 'Emergencia eliminada.');
            return Redirect::to('/emergency');
        } catch (\Exception $e) {
            Session::flash('error', 'Hubo un problema al eliminar la Emergencia. Por favor, inténtalo de nuevo.');
            return Redirect::to('/emergency');
        }
    }

    //Convertir solo la primera letra en mayuscula de una texto o parrafo.
    public function mb_ucfirst($str, $encoding = "UTF-8", $lower_str_end = false)
    {
        $first_letter = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding);
        $str_end = "";
        if ($lower_str_end) {
            $str_end = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encoding), $encoding), $encoding);
        } else {
            $str_end = mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
        }
        $str = $first_letter . $str_end;
        return $str;
    }

} //fin