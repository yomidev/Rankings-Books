<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Book extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = [
        'id',
        'title',
        'synopsis',
        'year',
        'front_page',
        'pages',
        'id_author',
    ];

    public function author(){
        return $this->belongsTo(Author::class, 'id_author');
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre', 'id_book', 'id_genre');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_book');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_books', 'id_book', 'id_user')
                ->withPivot('status', 'num_pages')
                ->withTimestamps();
    }
}
