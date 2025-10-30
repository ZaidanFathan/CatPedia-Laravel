<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CatBreeds extends Model
{
   protected $table = 'cat_breeds';

    protected $fillable = ['tipe', 'cat_origin'];
    public $timestamps = false;
    
    public function cats() : HasMany {
     return $this->hasMany(Cats::class, 'cat_breed_id', 'id');
    }
}
