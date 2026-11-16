<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image_path',
        'album',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    // Relasi ke pengunggah foto
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
