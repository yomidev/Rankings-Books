<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function prueba($id){
        $registro = $id;
        return view('prueba', compact('registro'));
    }

    public function dashboard(){
        $authors = Author::with('country')->get();
        return view('dashboard' , compact('authors'));
    }
}
