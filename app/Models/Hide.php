<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hide extends Model
{
    use HasFactory;

    protected $table = 'hides';

    public function bookHires()
    {
        return $this->belongsTo(User::class, 'fk_users', 'id');

    }


}
