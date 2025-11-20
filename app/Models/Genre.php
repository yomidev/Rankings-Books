<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Genre extends Model
{
    use HasFactory;
    protected $table="genres";
    protected $fillable = [
        'id',
        'name',
        'description'
    ];

     public function books()
    {
        return $this->belongsToMany(Book::class, 'book_genre', 'id_genre', 'id_book');
    }
}
