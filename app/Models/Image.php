<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['image_path'];

    // Accessor for getting the full URL of the image
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}
