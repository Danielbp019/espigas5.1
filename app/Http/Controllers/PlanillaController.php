<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Planilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        if ($validator->fails()) {
            // Obtén los mensajes de error
            $errors = $validator->errors()->all();
            // Conviértelos en una cadena
            $errorMessage = implode(', ', $errors);
            Session::flash('error', 'Hubo un problema al cargar el CSV: ' . $errorMessage);
            return Redirect::to('/planilla');
        }

        try {
            set_time_limit(300);
            ini_set('memory_limit', '512M');
            $path = $request->file('csv_file')->move(storage_path(), 'uploaded.csv');

            $dataToInsert = []; // Almacena los datos que se insertarán
            $batchSize = 500; // Define el tamaño del lote

            if (($handle = fopen($path, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $dataToInsert[] = [
                        'nir' => $data[0],
                        'codigo' => $data[1],
                        'nit' => $data[2],
                        'usuario' => $data[3],
                        'direccion' => $data[4],
                        'barrio' => $data[5],
                        'estrato' => $data[6],
                        'tipo_servicio' => $data[7],
                        'factura' => $data[8],
                        'medidor' => $data[9],
                        'lec_anterior' => $data[10],
                        'lec_actual' => $data[11],
                        'consumo' => $data[12],
                        'promedio' => $data[13],
                        'm1' => $data[14],
                        'm2' => $data[15],
                        'm3' => $data[16],
                        'm4' => $data[17],
                        'm5' => $data[18],
                        'm6' => $data[19],
                        'valor' => $data[20],
                        'atraso' => $data[21],
                        'mes' => $data[22],
                        'año' => $data[23],
                        'pago_anterior' => $data[24],
                        'sdo_cartera' => $data[25],
                        'ctas_pagas' => $data[26],
                        'cta_pagar' => $data[27],
                        'c_fijo' => $data[28],
                        'vlr_consumo' => $data[29],
                        'contribu' => $data[30],
                        'subsidio' => $data[31],
                        'recone' => $data[32],
                        'reinsta' => $data[33],
                        'sancion' => $data[34],
                        'int_mora' => $data[35],
                        'deuda_p' => $data[36],
                        'vlr_cuota' => $data[37],
                        'otro1' => $data[38],
                        'otros2' => $data[39]
                    ];
                    // Si hemos alcanzado el tamaño del lote, insertamos los datos
                    if (count($dataToInsert) >= $batchSize) {
                        DB::table('planilla')->insert($dataToInsert);
                        $dataToInsert = []; // Vaciamos el array para el próximo lote
                    }
                }
                fclose($handle);
                // Insertamos cualquier dato restante que no haya sido insertado aún
                if (!empty($dataToInsert)) {
                    DB::table('planilla')->insert($dataToInsert);
                }
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
    public function show()
    {
        // Descargar planilla
        $table = DB::table('planilla')->get();
        $filename = "planilla.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array_keys((array) $table[0]));
        foreach ($table as $row) {
            fputcsv($handle, (array) $row);
        }
        fclose($handle);
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return Response::download($filename, 'planilla.csv', $headers);
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
