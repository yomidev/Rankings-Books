<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Review extends Model
{
    use HasFactory;
    protected $table="reviews";
    protected $fillable = [
        'id',
        'id_user',
        'id_book',
        'grade',
        'review'
    ];

     public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book');
    }
}
