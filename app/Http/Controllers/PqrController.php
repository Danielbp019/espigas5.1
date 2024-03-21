<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer_pqr;
use App\Models\Application_means;
use App\Models\Causal_detail;
use App\Models\Notification_pqr;
use App\Models\Planilla;
use App\Models\Pqr;
use App\Models\Procedure_pqr;
use Illuminate\Http\Request;
use Redirect;
use Session;

class PqrController extends Controller
{
    public function index(Request $request)
    {
        $pqrs = Pqr::search($request->niu)
            ->pending($request->pending)
            ->orderby('idpqr', 'desc')
            ->paginate(20);
        return view('pqr.index', [
            'pqrs' => $pqrs,
        ]);
    }

    public function create()
    { //selects
        $application_means = Application_means::orderBy('application_means')->lists('application_means', 'idapplication_means');
        $procedure_pqr = Procedure_pqr::orderBy('procedure_pqr')->lists('procedure_pqr', 'idprocedure_pqr');
        $causal_detail = Causal_detail::orderBy('causal_detailcol')->lists('causal_detailcol', 'idcausal_detail');
        $answer_pqr = Answer_pqr::orderBy('answer_pqr')->lists('answer_pqr', 'idanswer_pqr');
        $notification_pqr = Notification_pqr::orderBy('notification_pqr')->lists('notification_pqr', 'idnotification_pqr');
        $planilla = Planilla::distinct()->lists('mes', 'mes'); //Mes del formulario
        return view('pqr.create', [
            'procedure_pqr' => $procedure_pqr,
            'causal_detail' => $causal_detail,
            'answer_pqr' => $answer_pqr,
            'notification_pqr' => $notification_pqr,
            'planilla' => $planilla,
            'application_means' => $application_means,
        ]); //Pasar la informacion al form
    }

    public function store(Request $request)
    {
        try {
            Pqr::create([
                'month' => $request['month'],
                'niu' => $request['niu'],
                'user' => $this->mb_ucfirst(trim($request['user']), "UTF-8", true),
                'address' => $this->mb_ucfirst(trim($request['address']), "UTF-8", true),
                'bill' => $request['bill'],
                'name_applicant' => $this->mb_ucfirst(trim($request['name_applicant']), "UTF-8", true),
                'identity_applicant' => $request['identity_applicant'],
                'address_applicant' => $this->mb_ucfirst(trim($request['address_applicant']), "UTF-8", true),
                'phone' => $request['phone'],
                'application_means_idapplication_means' => $request['application_means_idapplication_means'],
                'additional_information' => $this->mb_ucfirst(trim($request['additional_information']), "UTF-8", true),
                'treatment' => $this->mb_ucfirst(trim($request['treatment']), "UTF-8", true),
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
        } catch (\Exception $e) {
            Session::flash('error', 'Hubo un problema al eliminar la Pqr. Por favor, inténtalo de nuevo.');
            return Redirect::to('/pqr');
        }
    }

    public function show($idpqr)
    {
        $pqr = Pqr::select('idpqr', 'niu', 'user', 'address', 'bill', 'identity_applicant', 'name_applicant', 'address', 'phone', 'application_means', 'procedure_pqr', 'causal_detail_idcausal_detail', 'causal_detailcol', 'causal_group', 'additional_information', 'treatment', 'answer_pqr', 'pending', 'notification_pqr', 'created_at')
            ->join('answer_pqr', 'answer_pqr_idanswer_pqr', '=', 'idanswer_pqr')
            ->join('procedure_pqr', 'procedure_pqr_idprocedure_pqr', '=', 'idprocedure_pqr')
            ->join('application_means', 'application_means_idapplication_means', '=', 'idapplication_means')
            ->join('causal_detail', 'causal_detail_idcausal_detail', '=', 'idcausal_detail')
            ->join('notification_pqr', 'notification_pqr_idnotification_pqr', '=', 'idnotification_pqr')
            ->find($idpqr);
        return view('pqr.show', [
            'pqr' => $pqr,
        ]);
    }

    public function edit($idpqr)
    {
        $application_means = Application_means::orderBy('application_means')->lists('application_means', 'idapplication_means');
        $procedure_pqr = Procedure_pqr::orderBy('procedure_pqr')->lists('procedure_pqr', 'idprocedure_pqr');
        $causal_detail = Causal_detail::orderBy('causal_detailcol')->lists('causal_detailcol', 'idcausal_detail');
        $answer_pqr = Answer_pqr::orderBy('answer_pqr')->lists('answer_pqr', 'idanswer_pqr');
        $notification_pqr = Notification_pqr::orderBy('notification_pqr')->lists('notification_pqr', 'idnotification_pqr');
        $planilla = Planilla::distinct()->lists('mes', 'mes'); //mes del form
        $pqr = Pqr::find($idpqr);
        return view('pqr.edit', [
            'pqr' => $pqr,
            'procedure_pqr' => $procedure_pqr,
            'causal_detail' => $causal_detail,
            'answer_pqr' => $answer_pqr,
            'notification_pqr' => $notification_pqr,
            'planilla' => $planilla,
            'application_means' => $application_means,
        ]);
    }

    public function update(Request $request, $idpqr)
    {
        try {
            $pqr = Pqr::find($idpqr); //se busca por id
            $pqr->fill([
                'month' => $request['month'],
                'niu' => $request['niu'],
                'user' => $this->mb_ucfirst(trim($request['user']), "UTF-8", true),
                'address' => $this->mb_ucfirst(trim($request['address']), "UTF-8", true),
                'bill' => $request['bill'],
                'name_applicant' => $this->mb_ucfirst(trim($request['name_applicant']), "UTF-8", true),
                'identity_applicant' => $request['identity_applicant'],
                'address_applicant' => $this->mb_ucfirst(trim($request['address_applicant']), "UTF-8", true),
                'phone' => $request['phone'],
                'application_means_idapplication_means' => $request['application_means_idapplication_means'],
                'additional_information' => $this->mb_ucfirst(trim($request['additional_information']), "UTF-8", true),
                'treatment' => $this->mb_ucfirst(trim($request['treatment']), "UTF-8", true),
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
        } catch (\Exception $e) {
            Session::flash('error', 'Hubo un problema al editar la Pqr. Por favor, inténtalo de nuevo.');
            return Redirect::to('/pqr');
        }
    }

    public function destroy($idpqr)
    {
        try {
            Pqr::destroy($idpqr);
            Session::flash('message', 'Pqr eliminada.');
            return Redirect::to('/pqr');
        } catch (\Exception $e) {
            Session::flash('error', 'Hubo un problema al eliminar la Pqr. Por favor, inténtalo de nuevo.');
            return Redirect::to('/pqr');
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