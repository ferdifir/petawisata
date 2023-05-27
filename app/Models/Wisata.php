<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisata';

    protected $fillable = [
        'name', 'description', 'latitude', 'longitude', 'location', 'category_id', 'pict_url', 'user_id',
    ];
}