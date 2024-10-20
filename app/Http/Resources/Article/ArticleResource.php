<?php

namespace App\Http\Resources\Article;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'title' => $this->title,
            'short_text' => $this->short_text,
            'long_text' => $this->long_text,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'first_image' => null,
            'second_image' => null
        ];
    }
}
