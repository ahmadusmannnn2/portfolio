<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    // Method ini harus berada di dalam class
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
} // <-- Kurung kurawal penutup class dipindahkan ke sini