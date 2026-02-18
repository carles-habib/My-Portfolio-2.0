<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    protected $table = 'mains';
    protected $fillable = [
        'name',
        'title',
        'subtitle',
        'description'
    ];

    public static function create(array $array)
    {

    }
}
