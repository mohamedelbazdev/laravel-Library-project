<?php
<<<<<<< Updated upstream

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

=======
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
   class Admin extends Authenticatable
    {
        protected $guard = 'admin';
        protected $fillable = [
            'name', 'email', 'password',
        ];
        protected $hidden = [
            'password', 'remember_token',
        ];
>>>>>>> Stashed changes
}
