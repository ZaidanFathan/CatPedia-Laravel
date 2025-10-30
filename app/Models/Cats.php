<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Cats extends Model
{
     protected $fillable = [
        'cat_origin',
        'cat_breed_id',
    ];

    public $timestamps = false;

    public function breed() : BelongsTo {
          return $this->belongsTo(CatBreeds::class, 'cat_breed_id', 'id');
    }

    public function articles() :HasMany {
        return $this->HasMany(Article::class, 'cat_id', 'id');
    }
}
