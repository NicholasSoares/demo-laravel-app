<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserApiAuthResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'token' => $this['token'],
        ];
    }
}
