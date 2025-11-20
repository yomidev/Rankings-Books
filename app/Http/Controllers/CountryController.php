<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::all(); //Select * from countries;
        //$c = DB::table('countries')->first();
        return view('admin.country.index', compact('countries'));
    }

    public function create(){
        return view('admin.country.create');
    }

    public function save(Request $request){
        $validate = $request->validate([
            'name' => 'required|max:255',
        ]);

        $country = new Country;
        $country->name = $request->name;
        $country->save();

        return redirect()->route('admin.country');
    }

    public function edit($id){
        $country = Country::findOrFail($id);
        return view ('admin.country.edit', compact('country'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'name' => 'required|max:255',
        ]);

        $country = Country::findOrFail($id);
        $country->name = $request->name;
        $country->save();

        return redirect()->route('admin.country');
    }

    public function delete($id){
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('admin.country');

    }
}
