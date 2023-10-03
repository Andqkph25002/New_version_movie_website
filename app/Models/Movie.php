<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public function rCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function rGenre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
    public function rCountry()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function rMovie_Genre()
    {
        return $this->belongsToMany(Genre::class, 'movie_genres', 'movie_id', 'genre_id');
    }
    public function rEpisode()
    {
        return $this->hasMany(Episode::class);
    }
    public function rMovie_Category()
    {
        return $this->belongsToMany(Category::class, 'movie_categories', 'movie_id', 'category_id');
    }
}
