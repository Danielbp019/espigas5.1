<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Planilla;
use DB;

class AutocompleteController extends Controller
{

    public function buscarCodigo(Request $request)
{
    $term = $request->input('term');
    // Obtener una colección de resultados en lugar de un array
    $codigos = DB::table('planilla')->where('codigo', 'LIKE', "%$term%")->get();
    // Verificar si la colección está vacía
    if (count($codigos) === 0) {
        return response()->json([]); // Devolver un arreglo vacío si no hay resultados
    }
    // Extraer los códigos y convertirlos en un array
    $codigos = collect($codigos)->pluck('codigo')->toArray();
    return response()->json($codigos);
}

    public function obtenerValores(Request $request)
    {
        $codigo = $request->input('codigo');
        $respuesta = DB::table('planilla')->where('codigo', $codigo)->first();
        return response()->json($respuesta);
    }
    
}