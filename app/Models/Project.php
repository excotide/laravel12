<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'stack',
        'description',
        'link',
        'is_api',
    ];

    protected $casts = [
        'stack'   => 'array',
        'is_api'  => 'boolean',
        'year'    => 'integer',
    ];
}
