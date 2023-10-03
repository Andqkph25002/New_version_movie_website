<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function rMovie()
    {
        return $this->hasMany(Movie::class)->orderBy('id', 'desc');
    }
}
