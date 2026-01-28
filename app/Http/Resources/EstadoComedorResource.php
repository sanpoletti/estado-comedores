<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="EstadoComedor",
 *     type="object",
 *     description="Estado y raciones diarias de un comedor"
 * )
 *
 * @OA\Property(
 *     property="nroregistro",
 *     type="integer",
 *     example=1093
 * )
 *
 * @OA\Property(
 *     property="grupo",
 *     type="string",
 *     example="21 DE SEPTIEMBRE"
 * )
 *
 * @OA\Property(
 *     property="estado_grupo",
 *     type="string",
 *     enum={"VIGENTE","SUSPENDIDO","CERRADO","EN RECESO"},
 *     example="VIGENTE"
 * )
 *
 * @OA\Property(
 *     property="desayuno",
 *     type="integer",
 *     description="-1: no brinda el servicio · 0: no quedan raciones · >0: raciones disponibles",
 *     example=-1
 * )
 *
 * @OA\Property(
 *     property="almuerzo",
 *     type="integer",
 *     description="-1: no brinda el servicio · 0: no quedan raciones · >0: raciones disponibles",
 *     example=-1
 * )
 *
 * @OA\Property(
 *     property="merienda",
 *     type="integer",
 *     description="-1: no brinda el servicio · 0: no quedan raciones · >0: raciones disponibles",
 *     example=0
 * )
 *
 * @OA\Property(
 *     property="cena",
 *     type="integer",
 *     description="-1: no brinda el servicio · 0: no quedan raciones · >0: raciones disponibles",
 *     example=0
 * )
 */
class EstadoComedorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'nroregistro'  => (int) $this->nroregistro,
            'grupo'        => trim($this->grupo),
            'estado_grupo' => $this->estado_grupo,

            // 🔑 nombres EXACTOS del SP
            'desayuno' => (int) $this->Desayuno,
            'almuerzo' => (int) $this->Almuerzo,
            'merienda' => (int) $this->Merienda,
            'cena'     => (int) $this->Cena,
        ];
    }
}
