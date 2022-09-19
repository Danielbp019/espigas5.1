<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pqr;
use Session;
use Redirect;
use App\Procedure_pqr;
use App\Causal_detail;
use App\Answer_pqr;
use App\Notification_pqr;
use App\Planilla;
use App\Application_means;


class PqrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pqrs= Pqr::search($request->niu)
                    ->pending($request->pending)
                    ->orderby('idpqr','desc')
                    ->paginate(20);
        return view('pqr.index', [
                                    'pqrs' => $pqrs
                                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {//selects
        $application_means= Application_means::lists('application_means', 'idapplication_means');
        $procedure_pqr= Procedure_pqr::lists('procedure_pqr', 'idprocedure_pqr');
        $causal_detail= Causal_detail::lists('causal_detailcol', 'idcausal_detail');
        $answer_pqr= Answer_pqr::lists('answer_pqr', 'idanswer_pqr');
        $notification_pqr= Notification_pqr::lists('notification_pqr', 'idnotification_pqr');
        $planilla= Planilla::distinct()->lists('mes', 'mes');//mes del form
        return view('pqr.create', [
                                    'procedure_pqr' => $procedure_pqr,
                                    'causal_detail' => $causal_detail,
                                    'answer_pqr' => $answer_pqr,
                                    'notification_pqr' => $notification_pqr,
                                    'planilla' => $planilla,
                                    'application_means' => $application_means
                                    ]);//pasar la informacion al form
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pqr::create([
            'month' => $request['month'],
            'niu' => $request['niu'],
            'user' => mb_convert_case($request['user'], MB_CASE_LOWER, "UTF-8"),
            'address' => mb_convert_case($request['address'], MB_CASE_LOWER, "UTF-8"),
            'bill' => $request['bill'],
            'name_applicant' => mb_convert_case($request['name_applicant'], MB_CASE_LOWER, "UTF-8"),
            'identity_applicant' => $request['identity_applicant'],
            'address_applicant' => mb_convert_case($request['address_applicant'], MB_CASE_LOWER, "UTF-8"),
            'phone' => $request['phone'],
            'application_means_idapplication_means' => $request['application_means_idapplication_means'],
            'additional_information' => mb_convert_case($request['additional_information'], MB_CASE_LOWER, "UTF-8"),
            'treatment' => mb_convert_case($request['treatment'], MB_CASE_LOWER, "UTF-8"),
            'date' => $request['date'],
            'time' => $request['time'],
            'pending' => $request['pending'],
            'sspd' => $request['sspd'],
            'answer_date' => $request['answer_date'],
            'rta_niu' => $request['rta_niu'],
            'date_notification' => $request['date_notification'],
            'department_code' => $request['department_code'],
            'municipality_code' => $request['municipality_code'],
            'settlement_type' => $request['settlement_type'],
            'causal_detail_idcausal_detail' => $request['causal_detail_idcausal_detail'],
            'answer_pqr_idanswer_pqr' => $request['answer_pqr_idanswer_pqr'],
            'procedure_pqr_idprocedure_pqr' => $request['procedure_pqr_idprocedure_pqr'],
            'notification_pqr_idnotification_pqr' => $request['notification_pqr_idnotification_pqr'],
            'users_id' => $request['users_id'],
            'user_update' => $request['user_update']
        ]);
            Session::flash('message', 'Pqr creada.');
            return Redirect::to('/pqr');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idpqr)
    {
        $pqr=Pqr::select('idpqr','niu','user','address','bill','identity_applicant','name_applicant','address','phone','application_means','procedure_pqr','causal_detail_idcausal_detail','causal_detailcol','causal_group','additional_information','treatment','answer_pqr','pending','notification_pqr','created_at')
        ->join('answer_pqr', 'answer_pqr_idanswer_pqr', '=', 'idanswer_pqr')
            ->join('procedure_pqr', 'procedure_pqr_idprocedure_pqr', '=', 'idprocedure_pqr')
            ->join('application_means', 'application_means_idapplication_means', '=', 'idapplication_means')
            ->join('causal_detail', 'causal_detail_idcausal_detail', '=', 'idcausal_detail')
            ->join('notification_pqr', 'notification_pqr_idnotification_pqr', '=', 'idnotification_pqr')
            ->find($idpqr);
        return view('pqr.show',[
                                'pqr'=>$pqr
                                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idpqr)
    {
        $application_means= Application_means::lists('application_means', 'idapplication_means');
        $procedure_pqr= Procedure_pqr::lists('procedure_pqr', 'idprocedure_pqr');
        $causal_detail= Causal_detail::lists('causal_detailcol', 'idcausal_detail');
        $answer_pqr= Answer_pqr::lists('answer_pqr', 'idanswer_pqr');
        $notification_pqr= Notification_pqr::lists('notification_pqr', 'idnotification_pqr');
        $planilla= Planilla::distinct()->lists('mes', 'mes');//mes del form
        $pqr=Pqr::find($idpqr);
        return view('pqr.edit',[
                                'pqr'=>$pqr,
                                'procedure_pqr' => $procedure_pqr,
                                'causal_detail' => $causal_detail,
                                'answer_pqr' => $answer_pqr,
                                'notification_pqr' => $notification_pqr,
                                'planilla' => $planilla,
                                'application_means' => $application_means
                                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idpqr)
    {
        $pqr=Pqr::find($idpqr);//se busca por id
        $pqr->fill([
            'month' => $request['month'],
            'niu' => $request['niu'],
            'user' => mb_convert_case($request['user'], MB_CASE_LOWER, "UTF-8"),
            'address' => mb_convert_case($request['address'], MB_CASE_LOWER, "UTF-8"),
            'bill' => $request['bill'],
            'name_applicant' => mb_convert_case($request['name_applicant'], MB_CASE_LOWER, "UTF-8"),
            'identity_applicant' => $request['identity_applicant'],
            'address_applicant' => mb_convert_case($request['address_applicant'], MB_CASE_LOWER, "UTF-8"),
            'phone' => $request['phone'],
            'application_means_idapplication_means' => $request['application_means_idapplication_means'],
            'additional_information' => mb_convert_case($request['additional_information'], MB_CASE_LOWER, "UTF-8"),
            'treatment' => mb_convert_case($request['treatment'], MB_CASE_LOWER, "UTF-8"),
            'pending' => $request['pending'],
            'sspd' => $request['sspd'],
            'answer_date' => $request['answer_date'],
            'rta_niu' => $request['rta_niu'],
            'date_notification' => $request['date_notification'],
            'department_code' => $request['department_code'],
            'municipality_code' => $request['municipality_code'],
            'settlement_type' => $request['settlement_type'],
            'causal_detail_idcausal_detail' => $request['causal_detail_idcausal_detail'],
            'answer_pqr_idanswer_pqr' => $request['answer_pqr_idanswer_pqr'],
            'procedure_pqr_idprocedure_pqr' => $request['procedure_pqr_idprocedure_pqr'],
            'notification_pqr_idnotification_pqr' => $request['notification_pqr_idnotification_pqr'],
            'user_update' => $request['user_update']
        ]);
        $pqr->save();
        Session::flash('message', 'Pqr editada.');
        return Redirect::to('/pqr');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpqr)
    {
        Pqr::destroy($idpqr);
        Session::flash('message', 'Pqr eliminada.');
        return Redirect::to('/pqr');
    }  

}//fin