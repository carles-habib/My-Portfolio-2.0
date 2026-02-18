<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(int $id)
 */
class skills extends Model
{
    protected $table = 'skills';
    protected $fillable = [
        "id",
        "name",
        "image"
    ];
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
