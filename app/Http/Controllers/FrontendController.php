<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function dashboard(){
        $featuredBooks = Book::with('author')->limit(12)->get();
        $featuredAuthors = Author::withCount('books')->limit(10)->get();
        $recommendedBooks = collect(); // Lógica de recomendación (opcional)
        return view('dashboard', compact('featuredBooks', 'featuredAuthors', 'recommendedBooks'));
    }
}
