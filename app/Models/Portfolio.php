<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolios';
    protected $fillable = [
        'id',
        'title',
        'description',
        'portfolio_description',
        'category',
        'client',
        'start_date',
        'designer',
        'live_url',
        'image_path',
        'thumbnail1',
        'thumbnail2',
        'thumbnail3',
        'story',
        'approach',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    public function gallery()
    {
        return $this->hasMany(PortfolioGallery::class);
    }
}
