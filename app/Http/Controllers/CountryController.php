<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::paginate(10); //Select * from countries;
        //$c = DB::table('countries')->first();
        return view('admin.country.index', compact('countries'));
    }

    public function create(){
        return view('admin.country.create');
    }

    public function save(Request $request){
        $validate = $request->validate([
            'name' => 'required|max:255|unique:countries,name',
        ]);

        $country = new Country;
        $country->name = $validate['name'];
        $country->save();

        return redirect()->route('admin.country')->with('success', 'País creado exitosamente.');
    }

    public function edit($id){
        $country = Country::findOrFail($id);
        return view ('admin.country.edit', compact('country'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'name' => 'required|max:255|unique:countries,name',
        ]);

        $country = Country::findOrFail($id);
        $country->name = $validate['name'];
        $country->save();

        return redirect()->route('admin.country')->with('success', 'País actualizado exitosamente.');
    }

    public function delete($id){
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('admin.country')->with('success', 'País eliminado exitosamente.');

    }
}
