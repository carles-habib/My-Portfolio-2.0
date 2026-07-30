<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'order',
        'name',
        'brief',
        'image',
        'desc1',
        'desc2',
        'desc3',
        'process',
        'processdesc',
        'objective1',
        'objective2',
        'objective3',
        'objective4',
        'objective5',
        'objective6'

    ];
}
