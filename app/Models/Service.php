<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'icon_class',
        'short_description',
        'long_description',
    ];
}