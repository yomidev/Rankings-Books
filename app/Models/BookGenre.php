<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BookGenre extends Model
{
    use HasFactory;

    protected $table ="book_genre";
    protected $fillable = [
        'id',
        'id_book',
        'id_genre'
    ];
}
