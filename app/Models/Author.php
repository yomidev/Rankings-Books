<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Author extends Model
{
    use HasFactory;

    protected $table = "authors";
    protected $fillable = [
        'id',
        'name',
        'biography',
        'website',
        'photo',
        'id_country'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'id_country');
    }
    public function books(){
        return $this->hasMany(Book::class, 'id_author');
    }
}
