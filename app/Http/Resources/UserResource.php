<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'first_name' => $this->first_name,
          'last_name' => $this->last_name,
          'birth_date' => $this->birth_date,
          'national_code' => $this->national_code,
          'phone_number' =>  $this->phone_number,
          'email' => $this->email,
          'gender' => $this->gender,
          'profile_image' => null
        ];
    }
}
