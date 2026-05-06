<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'publisher',
        'year',
        'stock',
        'cover',
        'description'
    ];

    public function category() {
        return $this->belongsTo(Categories::class);
    }
}
