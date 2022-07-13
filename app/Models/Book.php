<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'name','image','desc','category_id','author'
    ];

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getList()
    {
       
        return $this->pluck( 'Catname', 'id')->toArray();
    }
}
