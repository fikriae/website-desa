<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agenda extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'location',
        'start_date',
        'end_date',
        'featured_image',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ];
    }

    // Relasi ke penulis agenda
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
