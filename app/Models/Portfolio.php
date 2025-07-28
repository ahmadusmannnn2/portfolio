<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id', // Ganti 'category' menjadi 'category_id'
        'project_link',
        'image',
    ];

    // Definisikan relasi ke model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}