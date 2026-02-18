<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['category_id', 'name', 'image', 'breadcrumbImg', 'date_created'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
