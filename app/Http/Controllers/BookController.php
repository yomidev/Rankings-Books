<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    public function index(){
        $books = Book::with('author')->paginate(10);
        return view('admin.books.index' , compact('books'));
    }

    public function create(){
        $authors = Author::all();
        return view('admin.books.create', compact('authors'));
    }

    public function save(Request $request){
        $validate = $request->validate([
            'title' => 'required|max:255',
            'synopsis' => 'required',
            'year' => 'required|integer',
            'pages' => 'required|integer',
            'author_id' => 'required|exists:authors,id',
            'front_page' => 'required|image|max:2048'
        ]);

        $filename = null;
        if($request->hasFile('front_page')){
            $file = $request->file('front_page');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/books'), $filename);
        }

        $book = new Book();
        $book->title = $validate['title'];
        $book->synopsis = $validate['synopsis'];
        $book->year = $validate['year'];
        $book->pages = $validate['pages'];
        $book->id_author = $validate['author_id'];
        $book->front_page = 'images/books/'.$filename;
        $book->save();

        return redirect()->route('admin.books')->with('success', 'El libro fue guardado con exito');

    }

    public function edit($id){
        $book = Book::findOrFail($id);
        $authors = Author::all();

        return view('admin.books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'title' => 'required|max:255',
            'synopsis' => 'required',
            'year' => 'required|integer',
            'pages' => 'required|integer',
            'author_id' => 'required|exists:authors,id',
            'front_page' => 'image|max:2048'
        ]);

        $filename = null;
        if($request->hasFile('front_page')){
            $file = $request->file('front_page');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/books'), $filename);
        }

        $book = Book::findOrFail($id);
        if($request->hasFile('front_page')){
            $image = $book->front_page;
            if($image && file_exists(public_path($image))){
                unlink(public_path($image));
            }
        }

        $book->title = $validate['title'];
        $book->synopsis = $validate['synopsis'];
        $book->year = $validate['year'];
        $book->pages = $validate['pages'];
        $book->id_author = $validate['author_id'];
        $book->front_page = 'images/books/'.$filename;
        $book->save();

        return redirect()->route('admin.books')->with('success', 'El libro ha sido actualizado correctamente');
    }

    public function delete($id){
        $book = Book::findOrFail($id);
        $image = $book->front_page;
        if($image && file_exists(public_path($image))){
            unlink(public_path($image));
        }
        $book->delete();
        return redirect()->route('admin.books')->with('success', 'El libro ha sido eliminado correctamente');
    }
}
