<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
    class Blog extends Authenticatable
    {
        protected $guard = 'blog';
       protected $fillable = [
            'name', 'email', 'password',
        ];
        protected $hidden = [
            'password', 'remember_token',
      ];
}
