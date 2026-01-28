<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\EstadoComedorResource;

/**
 * @OA\Info(
 *     title="API Estado de Comedores",
 *     version="1.0.0",
 *     description="API REST para consultar el estado y las raciones diarias de comedores comunitarios"
 * )
 */
class EstadoComedoresController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/estado-comedores",
     *     summary="Obtiene el estado de los comedores",
     *     description="Devuelve el estado y las raciones de uno o todos los comedores.
     *     Si no se envía el parámetro nroreg, devuelve todos.
     *     
     *     Interpretación de valores de raciones:
     *     
     *     Valor -1:
     *     El comedor no brinda ese servicio.
     *     
     *     Valor 0:
     *     El servicio se brinda, pero no quedan raciones disponibles.
     *     
     *     Valor mayor a 0:
     *     Cantidad de raciones disponibles.",
     *
     *     tags={"Estado Comedores"},
     *
     *     @OA\Parameter(
     *         name="nroreg",
     *         in="query",
     *         required=false,
     *         description="Número de registro del comedor. Si no se envía, se listan todos.",
     *         @OA\Schema(type="integer", minimum=1),
     *         example=123
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Listado de comedores",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/EstadoComedor")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=400,
     *         description="Parámetros inválidos"
     *     )
     * )
     */
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
