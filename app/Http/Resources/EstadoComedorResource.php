<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstadoComedorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'nroregistro'  => $this->nroregistro,
            'grupo'        => $this->grupo,
            'estado_grupo' => $this->estado_grupo,
            'desayuno'     => max(0, $this->Desayuno),
            'almuerzo'     => max(0, $this->Almuerzo),
            'merienda'     => max(0, $this->Merienda),
            'cena'         => max(0, $this->Cena),
        ];
    }
}
