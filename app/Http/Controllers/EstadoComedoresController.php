<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\EstadoComedorResource;

class EstadoComedoresController extends Controller
{
    public function show(Request $request)
    {
        // Validación solo si viene el parámetro
        $request->validate([
            'nroreg' => 'nullable|integer|min:1',
        ]);

        $nroreg = $request->query('nroreg');

        if ($nroreg) {
            // Consulta filtrada
            $resultado = DB::select(
                'EXEC _Grupos @nroreg = ?, @IDHOGAR = 0, @tGrupo = 0',
                [$nroreg]
            );
        } else {
            // Consulta sin filtro → todos los comedores
            $resultado = DB::select(
                'EXEC _Grupos @nroreg = 0, @IDHOGAR = 0, @tGrupo = 0'
            );
        }

        return EstadoComedorResource::collection($resultado);
    }
}
