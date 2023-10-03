<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkPhim extends Model
{
    use HasFactory;
    protected $table = 'link_server';
    protected $fillable = [
        'title',
        'description',
        'status'
    ];
}
