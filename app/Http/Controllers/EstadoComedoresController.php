<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\EstadoComedorResource;

class EstadoComedoresController extends Controller
{
    public function show(Request $request)
    {
        $idHogar   = $request->query('idHogar');
        $tipoGrupo = $request->query('tipoGrupo');

        if ($idHogar === null && $tipoGrupo === null) {
            // Ejecuta el SP sin parámetros (equivale a: EXEC _Grupos)
            $resultado = DB::select('EXEC _Grupos');
        } else {
            $resultado = DB::select(
                'EXEC _Grupos @IDHOGAR = ?, @tGrupo = ?',
                [$idHogar ?? 0, $tipoGrupo ?? 0]
            );
        }

        return EstadoComedorResource::collection($resultado);
    }
}
