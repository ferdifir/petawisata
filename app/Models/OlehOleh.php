<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlehOleh extends Model
{
    use HasFactory;
    protected $table = 'pusat_oleh_oleh';

    protected $fillable = [
        'name', 'description', 'latitude', 'longitude', 'location', 'category', 'pict_url', 'user_id',
    ];
}