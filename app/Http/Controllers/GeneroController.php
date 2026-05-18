<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GeneroController extends Controller
{
    public function index(){
        $genres = Genre::paginate(5);
        return view('admin.genres.index', compact('genres'));
    }

    public function create(){
        return view('admin.genres.create');
    }

    public function save(Request $request){
        $validate = $request->validate([
                        'name' => 'required|unique:genres,name|max:255',
                        'description' => 'nullable'
                    ]);
        $genre = new Genre;
        $genre->name = $validate['name'];
        $genre->description = $validate['description'];
        $genre->save();

        return redirect()->route('admin.genres')->with('success', 'Género creado correctamente');
    }

    public function edit($id){
        $genre = Genre::findOrFail($id);
        return view('admin.genres.edit', compact('genre'));
    }

    public function update($id, Request $request){
        $validate = $request->validate([
                        'name' => 'required|max:255',
                        'description' => 'nullable'
                    ]);
        $genre = Genre::findOrFail($id);
        $genre->name = $validate['name'];
        $genre->description = $validate['description'];
        $genre->save();

        return redirect()->route('admin.genres')->with('success', 'Género actualizado correctamente');

    }

    public function delete($id){
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('admin.genres')->with('success', 'Género eliminado correctamente');

    }
}
