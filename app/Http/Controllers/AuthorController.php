<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Country;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::with('country')->paginate(10); //Select * from authors;
        return view('admin.author.index', compact('authors'));
    }

    public function create(){
        $countries = Country::all();
        return view('admin.author.create', compact('countries'));
    }

    public function save(Request $request){
        $validate = $request->validate([
            'name' => 'required|max:255',
            'biography' => 'required',
            'website' => 'required|url',
            'country_id' => 'required|exists:countries,id',
            'photo' => 'required|image|max:2048',
        ]);

         if($request->hasFile('photo')){
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/authors'), $filename);
        }

        $author = new Author;
        $author->name = $validate['name'];
        $author->biography = $validate['biography'];
        $author->website = $validate['website'];
        $author->id_country = $validate['country_id'];
        $author->photo = 'images/authors/'.$filename;

       

        $author->save();
        return redirect()->route('admin.author.index')->with('success', 'Autor creado exitosamente.');

        
    }
}
