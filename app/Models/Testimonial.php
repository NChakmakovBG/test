<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
        'rating'       => 'integer',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
