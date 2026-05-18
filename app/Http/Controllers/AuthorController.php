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

    public function save(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'biography' => 'required',
            'website' => 'required|url',
            'country_id' => 'required|exists:countries,id',
            'photo' => 'required|image|max:2048',
        ]);

        $filename = null;
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/authors'), $filename);
        }

        $author = new Author;
        $author->name = $validate['name'];
        $author->biography = $validate['biography'];
        $author->website = $validate['website'];
        $author->id_country = $validate['country_id']; // si tu columna es id_country
        $author->photo = 'images/authors/'.$filename;

        $author->save();
        return redirect()->route('admin.author.index')->with('success', 'Autor creado exitosamente.');
    }

    public function edit($id){
        $author = Author::with('country')->findOrFail($id);
        $countries = Country::all();
        return view('admin.author.edit', compact('author', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $validate = $request->validate([
            'name' => 'required|max:255',
            'biography' => 'required',
            'website' => 'required|url',
            'country_id' => 'required|exists:countries,id',
            'photo' => 'nullable|image|max:2048', // no requerido en edición
        ]);

        $author->name = $validate['name'];
        $author->biography = $validate['biography'];
        $author->website = $validate['website'];
        $author->id_country = $validate['country_id'];

        if($request->hasFile('photo')){
            // Eliminar foto anterior si existe
            if($author->photo && file_exists(public_path($author->photo))){
                unlink(public_path($author->photo));
            }
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/authors'), $filename);
            $author->photo = 'images/authors/'.$filename;
        }

        $author->save();
        return redirect()->route('admin.author.index')->with('success', 'Autor actualizado correctamente.');
    }

    public function delete($id){
        $author = Author::findOrFail($id);
         if(file_exists(public_path($author->photo))){
            unlink(public_path($author->photo));
        }
        $author->delete();
        return redirect()->route('admin.author.index')->with('success', 'Autor eliminado exitosamente.');

    }
}
