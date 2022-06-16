<?php

namespace App\Http\Resources\Grant;

use Illuminate\Http\Resources\Json\JsonResource;

class GrantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            /*
             * Поля которые создаются после создания гранта и преобразуются в json
             */

            'id' => $this->id,
            'title' => $this->title,
            'short_content' => $this->short_content,
            'content' => $this->content,
            'image' => $this->image,
            'created_at' => $this->created_at
        ];
    }
}
