<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pqrnc;//modelo para quitar partes  \App\Emergency en las funciones
use Session;//mensajes de variables al usuario
use Redirect;//redireccionar
use App\Answer_pqrnc;//modelo para dropdown
use App\Procedure_pqrnc;//modelo para dropdown
use App\Application_means;
use DB;


class PqrncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {//ojete que las variables estan en plural y las de la vista en el bucle tambien
        //scope integrado, se sacan los datos para el request de la vista
        $pqrncs= Pqrnc::select('idpqrnc','niu','date','application_means','user','pending')
            ->join('application_means', 'application_means_idapplication_means', '=', 'idapplication_means')
            ->search($request->niu)
            ->pending($request->pending)
            ->orderby('idpqrnc','desc')
            ->paginate(20);//sacar todos los registros
        return view('pqrnc.index', [
                                    'pqrncs' => $pqrncs
                                    ]);//vista del index, compact para enviarlos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {//se hace el llamado de los select y se ponen en orden los datos, answer_pqrnc lo que se muestra y el idanswer_pqrnc lo que se envia desde el select. luego se carga en la vista normal que ya estaba, agregando compact para enviar los datos.
        $number = DB::select('SELECT idpqrnc FROM pqrnc ORDER BY idpqrnc DESC LIMIT 1');//consulta del id del pqrnc se envia a la vista y se suma aya
        $application_means= Application_means::lists('application_means', 'idapplication_means');
        $answer_pqrnc= Answer_pqrnc::lists('answer_pqrnc', 'idanswer_pqrnc');
        $procedure_pqrnc= Procedure_pqrnc::lists('procedure_pqrnc', 'idprocedure_pqrnc');
        return view('pqrnc.create', [
                                    'number' => $number, 
                                    'answer_pqrnc' => $answer_pqrnc,
                                    'procedure_pqrnc' => $procedure_pqrnc,
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
        Pqrnc::create([ //Pqrnc::create($request->all());
            'niu' => $request['niu'],
            'user' => mb_convert_case($request['user'], MB_CASE_LOWER, "UTF-8"),
            'address' => mb_convert_case($request['address'], MB_CASE_LOWER, "UTF-8"),
            'phone' => $request['phone'],
            'application_means_idapplication_means' => $request['application_means_idapplication_means'],
            'date' => $request['date'],
            'time' => $request['time'],
            'treatment' => mb_convert_case($request['treatment'], MB_CASE_LOWER, "UTF-8"),
            'additional_information' => mb_convert_case($request['additional_information'], MB_CASE_LOWER, "UTF-8"),
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idpqrnc)
    {   
        $pqrnc=Pqrnc::select('idpqrnc','niu','user','address','phone','application_means','procedure_pqrnc','answer_pqrnc','additional_information','treatment','created_at')
        ->join('answer_pqrnc', 'answer_pqrnc_idanswer_pqrnc', '=', 'idanswer_pqrnc')
            ->join('procedure_pqrnc', 'procedure_pqrnc_idprocedure_pqrnc', '=', 'idprocedure_pqrnc')
                ->join('application_means', 'application_means_idapplication_means', '=', 'idapplication_means')
                    ->find($idpqrnc);
        return view('pqrnc.show',[
                                'pqrnc'=>$pqrnc
                                ]);//se pasa la informacion
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idpqrnc)
    {   //se agregan los select dinamicos mas el compact para psar la informacion
        $application_means= Application_means::lists('application_means', 'idapplication_means');
        $answer_pqrnc= Answer_pqrnc::lists('answer_pqrnc', 'idanswer_pqrnc');
        $procedure_pqrnc= Procedure_pqrnc::lists('procedure_pqrnc', 'idprocedure_pqrnc');
        $pqrnc=Pqrnc::find($idpqrnc);//se busca por id
        return view('pqrnc.edit',[
                                'pqrnc'=>$pqrnc,
                                'answer_pqrnc' => $answer_pqrnc,
                                'procedure_pqrnc' => $procedure_pqrnc,
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
    public function update(Request $request, $idpqrnc)
    {
        $pqrnc=Pqrnc::find($idpqrnc);//se busca por id
        $pqrnc->fill([ //$pqrnc->fill($request->all());
            'niu' => mb_convert_case($request['niu'], MB_CASE_LOWER, "UTF-8"),
            'user' => mb_convert_case($request['user'], MB_CASE_LOWER, "UTF-8"),
            'address' => mb_convert_case($request['address'], MB_CASE_LOWER, "UTF-8"),
            'phone' => $request['phone'],
            'application_means_idapplication_means' => $request['application_means_idapplication_means'],
            'treatment' => mb_convert_case($request['treatment'], MB_CASE_LOWER, "UTF-8"),
            'additional_information' => mb_convert_case($request['additional_information'], MB_CASE_LOWER, "UTF-8"),
            'answer_date' => $request['answer_date'],
            'execution_date' => $request['execution_date'],
            'pending' => $request['pending'],
            'user_update' => $request['user_update'],
            'answer_pqrnc_idanswer_pqrnc' => $request['answer_pqrnc_idanswer_pqrnc'],
            'procedure_pqrnc_idprocedure_pqrnc' => $request['procedure_pqrnc_idprocedure_pqrnc'],
        ]);//lista con los campos exactos enviados por que si sobran da error
        $pqrnc->save();
        Session::flash('message', 'Pqrnc editada.');
        return Redirect::to('/pqrnc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpqrnc)
    {
        Pqrnc::destroy($idpqrnc);
        Session::flash('message', 'Pqrnc eliminada.');
        return Redirect::to('/pqrnc');
    }  

}//fin