<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    public function booksDemands()
    {
        return $this->hasMany(Book::class, 'fk_books', 'id');

    }

}
