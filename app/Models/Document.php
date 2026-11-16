<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'file_path',
        'file_type',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    // Relasi ke pengunggah dokumen
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
