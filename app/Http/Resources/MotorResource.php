<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MotorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'kondisi' => $this->kondisi,
            'tahun' => $this->tahun,
            'price' => $this->price,
            'description' => $this->description,
            'kapasitas_tank' => $this->kapasitas_tank,
            'jarak_tempuh' => $this->jarak_tempuh,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'category' => $this->category->name,
            'fuel' => $this->fuel->name,
            'merk' => $this->merk->name,
            'seller' => $this->seller->user,
            'image_urls' => ImageMotorResource::collection($this->image)
        ];
    }
}
