<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
     protected $fillable = [
        'judul',
        'deskripsi',
        'content',
        'cat_id',
        'created_at',
        'updated_at'
    ];




    public function cat(): BelongsTo
    {
        return $this->belongsTo(Cats::class, 'cat_id', 'id');
    }
}
