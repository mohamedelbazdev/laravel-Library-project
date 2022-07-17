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

    public function favorites(){
        return $this->hasMany(Favourite::class, 'book_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class, 'book_id');
    }

    public function getList()
    {

        return $this->pluck( 'Catname', 'id')->toArray();
    }
}
