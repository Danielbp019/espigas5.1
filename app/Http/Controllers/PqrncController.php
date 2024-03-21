<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer_pqrnc;
use App\Models\Application_means; //modelo para quitar partes  \App\Emergency en las funciones
use App\Models\Pqrnc; //modelo para dropdown
use App\Models\Procedure_pqrnc; //modelo para dropdown
use DB;
use Illuminate\Http\Request;
use Redirect; //mensajes de variables al usuario
use Session;
//redireccionar

class PqrncController extends Controller
{
    public function index(Request $request)
    { //ojete que las variables estan en plural y las de la vista en el bucle tambien
        //scope integrado, se sacan los datos para el request de la vista
        $pqrncs = Pqrnc::select('idpqrnc', 'niu', 'date', 'application_means', 'user', 'pending')
            ->join('application_means', 'application_means_idapplication_means', '=', 'idapplication_means')
            ->search($request->niu)
            ->pending($request->pending)
            ->orderby('idpqrnc', 'desc')
            ->paginate(20); //sacar todos los registros
        return view('pqrnc.index', [
            'pqrncs' => $pqrncs,
        ]); //vista del index, compact para enviarlos
    }

    public function create()
    { //se hace el llamado de los select y se ponen en orden los datos, answer_pqrnc lo que se muestra y el idanswer_pqrnc lo que se envia desde el select. luego se carga en la vista normal que ya estaba, agregando compact para enviar los datos.
        $number = DB::select('SELECT idpqrnc FROM pqrnc ORDER BY idpqrnc DESC LIMIT 1'); //consulta del id del pqrnc se envia a la vista y se suma aya
        $application_means = Application_means::orderBy('application_means')->lists('application_means', 'idapplication_means');
        $answer_pqrnc = Answer_pqrnc::orderBy('answer_pqrnc')->lists('answer_pqrnc', 'idanswer_pqrnc');
        $procedure_pqrnc = Procedure_pqrnc::orderBy('procedure_pqrnc')->lists('procedure_pqrnc', 'idprocedure_pqrnc');
        return view('pqrnc.create', [
            'number' => $number,
            'answer_pqrnc' => $answer_pqrnc,
            'procedure_pqrnc' => $procedure_pqrnc,
            'application_means' => $application_means,
        ]);
    }

    public function store(Request $request)
    {
        try {
        Pqrnc::create([
            'niu' => $this->mb_ucfirst(trim($request['niu']), "UTF-8", true),
            'user' => $this->mb_ucfirst(trim($request['user']), "UTF-8", true),
            'address' => $this->mb_ucfirst(trim($request['address']), "UTF-8", true),
            'phone' => $request['phone'],
            'application_means_idapplication_means' => $request['application_means_idapplication_means'],
            'date' => $request['date'],
            'time' => $request['time'],
            'treatment' => $this->mb_ucfirst(trim($request['treatment']), "UTF-8", true),
            'additional_information' => $this->mb_ucfirst(trim($request['additional_information']), "UTF-8", true),
            'answer_date' => $request['answer_date'],
            'execution_date' => $request['execution_date'],
            'pending' => $request['pending'],
            'code_dane' => $request['code_dane'],
            'type_service' => $request['type_service'],
            'user_update' => $request['user_update'],
            'users_id' => $request['users_id'],
            'answer_pqrnc_idanswer_pqrnc' => $request['answer_pqrnc_idanswer_pqrnc'],
            'procedure_pqrnc_idprocedure_pqrnc' => $request['procedure_pqrnc_idprocedure_pqrnc']
        ]);
        Session::flash('message', 'Pqrnc creada.');
        return Redirect::to('/pqrnc');
    } catch (\Exception $e) {
        Session::flash('error', 'Hubo un problema al crear la Pqrnc. Por favor, inténtalo de nuevo.');
        return Redirect::to('/pqrnc');
    }
    }

    public function show($idpqrnc)
    {
        $pqrnc = Pqrnc::select('idpqrnc', 'niu', 'user', 'address', 'phone', 'application_means', 'procedure_pqrnc', 'answer_pqrnc', 'additional_information', 'treatment', 'created_at')
            ->join('answer_pqrnc', 'answer_pqrnc_idanswer_pqrnc', '=', 'idanswer_pqrnc')
            ->join('procedure_pqrnc', 'procedure_pqrnc_idprocedure_pqrnc', '=', 'idprocedure_pqrnc')
            ->join('application_means', 'application_means_idapplication_means', '=', 'idapplication_means')
            ->find($idpqrnc);
        return view('pqrnc.show', [
            'pqrnc' => $pqrnc,
        ]); //se pasa la informacion
    }

    public function edit($idpqrnc)
    { //se agregan los select dinamicos mas el compact para psar la informacion
        $application_means = Application_means::orderBy('application_means')->lists('application_means', 'idapplication_means');
        $answer_pqrnc = Answer_pqrnc::orderBy('answer_pqrnc')->lists('answer_pqrnc', 'idanswer_pqrnc');
        $procedure_pqrnc = Procedure_pqrnc::orderBy('procedure_pqrnc')->lists('procedure_pqrnc', 'idprocedure_pqrnc');
        $pqrnc = Pqrnc::find($idpqrnc);
        return view('pqrnc.edit', [
            'pqrnc' => $pqrnc,
            'answer_pqrnc' => $answer_pqrnc,
            'procedure_pqrnc' => $procedure_pqrnc,
            'application_means' => $application_means,
        ]); //se pasa la informacion
    }

    public function update(Request $request, $idpqrnc)
    {
        try {
        $pqrnc = Pqrnc::find($idpqrnc);
        $pqrnc->fill([
            'niu' => $this->mb_ucfirst(trim($request['niu']), "UTF-8", true),
            'user' => $this->mb_ucfirst(trim($request['user']), "UTF-8", true),
            'address' => $this->mb_ucfirst(trim($request['address']), "UTF-8", true),
            'phone' => $request['phone'],
            'application_means_idapplication_means' => $request['application_means_idapplication_means'],
            'treatment' => $this->mb_ucfirst(trim($request['treatment']), "UTF-8", true),
            'additional_information' => $this->mb_ucfirst(trim($request['additional_information']), "UTF-8", true),
            'answer_date' => $request['answer_date'],
            'execution_date' => $request['execution_date'],
            'pending' => $request['pending'],
            'user_update' => $request['user_update'],
            'answer_pqrnc_idanswer_pqrnc' => $request['answer_pqrnc_idanswer_pqrnc'],
            'procedure_pqrnc_idprocedure_pqrnc' => $request['procedure_pqrnc_idprocedure_pqrnc']
        ]); //lista con los campos exactos enviados por que si sobran da error
        $pqrnc->save();
        Session::flash('message', 'Pqrnc editada.');
        return Redirect::to('/pqrnc');
    } catch (\Exception $e) {
        Session::flash('error', 'Hubo un problema al editar la Pqrnc. Por favor, inténtalo de nuevo.');
        return Redirect::to('/pqrnc');
    }
    }

    public function destroy($idpqrnc)
    {
        try {
        Pqrnc::destroy($idpqrnc);
        Session::flash('message', 'Pqrnc eliminada.');
        return Redirect::to('/pqrnc');
    } catch (\Exception $e) {
        Session::flash('error', 'Hubo un problema al eliminar la Pqrnc. Por favor, inténtalo de nuevo.');
        return Redirect::to('/pqrnc');
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