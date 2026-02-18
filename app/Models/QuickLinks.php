<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickLinks extends Model
{
    protected $table = 'quicklinks';
    protected $fillable = [
        'file_path',
        'ig',
        'youtube',
        'linkedin',
        'github'
    ];

//    public static function url(array $array)
//    {
//        return Storage::url($this->file);
//    }
    public function path()
    {
        return asset('storage/' . $this->file_path);
    }
}
