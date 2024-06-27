<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;

    protected $table = 'demands';


    public function demands()
    {
        return $this->belongsTo(User::class, 'fk_users', 'id');

    }

    public function booksDemands()
    {
        return $this->belongsTo(Book::class, 'fk_books', 'id');

    }

}
