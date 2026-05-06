<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $table = 'borrowings';

    protected $fillable = [
        'book_id',
        'name',
        'phone',
        'duration',
        'borrow_date',
        'return_date',
        'status',
        'code',
    ];

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
