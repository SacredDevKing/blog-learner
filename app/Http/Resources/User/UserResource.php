<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;

class UserResource extends JsonResource
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
             * Поля которые создаются после регистрации и преобразуются в json
             */
            'name' => $this->name,
            'email' => $this->email,
            'login' => $this->login,
            'password' => Hash::make($this->password),
        ];
    }
}
