<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Institution extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'logo' => $this->logo,
            'link' => $this->link
        ];
    }
}
