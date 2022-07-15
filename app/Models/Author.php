<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Author as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = [
        'name',
         'email',
          'password',
          'book_id',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
