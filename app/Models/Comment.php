<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'service_id',
      'comment_id',
      'star',
      'message',
      'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }


    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'comment_id')->with('replies');
    }
}
