<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Planilla;
use DB;
use Session;

class AutocompleteController extends Controller
{
    public function buscarCodigo(Request $request)
    {
        $term = $request->input('term');
        // Obtener una colección de resultados en lugar de un array
        $codigos = DB::table('planilla')
            ->where('codigo', 'LIKE', "%$term%")
            ->take(10)
            ->get();
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
        // Validar el token CSRF manualmente, se necesita el uso de: use Illuminate\Support\Facades\Session;
        $token = $request->input('_token');
        if (!Session::token() === $token) {
            // El token no coincide, puedes manejar el error aquí
            abort(403, 'Token CSRF no válido');
        }
        // Obtener el código enviado en la solicitud
        $codigo = $request->input('codigo');
        // Consultar en la base de datos
        $respuesta = DB::table('planilla')->where('codigo', $codigo)->first();
        // Retornar la respuesta en formato JSON
        return response()->json($respuesta);
    }
}
