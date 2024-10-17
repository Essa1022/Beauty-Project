<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_text',
        'long_text',
        'status'
    ];

    protected function casts()
    {
        return [
            'long_text' => 'array'
        ];
    }


    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'favoritable');
    }
}
