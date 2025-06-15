<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'title',
        'text',
        'user_id',
        'notebook_id'
    ];

    // Change route model binding default key and use uuid instead of id
    // public function getRouteKeyName()
    // {
    //     return 'uuid';
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function notebook(): BelongsTo
    {
        return $this->belongsTo(Notebook::class);
    }
}
