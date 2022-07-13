<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'f_name',
        'last_name',
        'email',
        'password',
        'biography',
        'updated_at',
        'created_at'
    ];

    protected $table ='admins';
    protected $data =[];

}
