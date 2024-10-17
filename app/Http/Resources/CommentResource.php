<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' =>"{$this->user->first_name} {$this->user->last_name}",
            'service' => $this->service->name,
            'star' => $this->star,
            'message' => $this->message,
            'create_at' => $this->created_at
        ];
    }
}
