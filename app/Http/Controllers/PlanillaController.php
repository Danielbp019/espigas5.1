<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Planilla;
use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use Validator;

class PlanillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Busqueda con scope, modificado el modelo tambien
        $planillas = Planilla::search($request->codigo)
            ->orderBy('codigo', 'DESC')
            ->paginate(20);
        return view('planilla.index', [
            'planillas' => $planillas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Vista del formulario de carga
        return view('planilla.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Subida del csv, validar que el archivo se haya subido correctamente
/*         $validator = Validator::make($request->all(), [
            'csv_file' => 'required|mimes:csv'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } */

        try {
            // Abrir el archivo CSV
            $path = $request->file('csv_file')->getRealPath();
            $data = array_map('str_getcsv', file($path));
            // Recorrer cada fila del archivo CSV y guardarla en la base de datos
            foreach ($data as $row) {
                DB::table('planilla')->insert([
                    'nir' => $row[0],
                    'codigo' => $row[1],
                    'nit' => $row[2],
                    'usuario' => $row[3],
                    'direccion' => $row[4],
                    'barrio' => $row[5],
                    'estrato' => $row[6],
                    'tipo_servicio' => $row[7],
                    'factura' => $row[8],
                    'medidor' => $row[9],
                    'lec_anterior' => $row[10],
                    'lec_actual' => $row[11],
                    'consumo' => $row[12],
                    'promedio' => $row[13],
                    'm1' => $row[14],
                    'm2' => $row[15],
                    'm3' => $row[16],
                    'm4' => $row[17],
                    'm5' => $row[18],
                    'm6' => $row[19],
                    'valor' => $row[20],
                    'atraso' => $row[21],
                    'mes' => $row[22],
                    'año' => $row[23],
                    'pago_anterior' => $row[24],
                    'sdo_cartera' => $row[25],
                    'ctas_pagas' => $row[26],
                    'cta_pagar' => $row[27],
                    'c_fijo' => $row[28],
                    'vlr_consumo' => $row[29],
                    'contribu' => $row[30],
                    'subsidio' => $row[31],
                    'recone' => $row[32],
                    'reinsta' => $row[33],
                    'sancion' => $row[34],
                    'int_mora' => $row[35],
                    'deuda_p' => $row[36],
                    'vlr_cuota' => $row[37],
                    'otro1' => $row[38],
                    'otros2' => $row[39],
                ]);
            }
            Session::flash('message', 'CSV cargado.');
            return Redirect::to('/planilla');
        } catch (\Exception $e) {
            Session::flash('error', 'Hubo un problema al cargar el CSV. Por favor, inténtalo de nuevo.');
            return Redirect::to('/planilla');
        }
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
    public function destroy()
    {
        // Vaciar la tabla
        try {
            DB::table('planilla')->truncate();

            Session::flash('message', 'Planilla eliminada completamente.');
            return Redirect::to('/planilla');
        } catch (\Exception $e) {
            Session::flash('error', 'Hubo un problema al truncar. Por favor, inténtalo de nuevo.');
            return Redirect::to('/planilla');
        }
    }
}
