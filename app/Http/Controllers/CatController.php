<?php

namespace App\Http\Controllers;

use App\Models\CatBreeds;
use App\Models\Cats;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cats::with("breed")->get();
        $data_cat_breed = CatBreeds::all();

        return view("admin.cats", ['data' => $data, "cat_breeds" => $data_cat_breed]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.cat_form", ['cat'=> null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'cat_breed' => 'required|unique:cat_breeds,tipe',
            'cat_origin' => 'required',
        ]);

      $cat_breed = CatBreeds::create([
            'tipe' => $request->cat_breed,
        ]);

        Cats::create([
            "cat_breed_id" => $cat_breed->id,
            "cat_origin" => $request->cat_origin
        ]);

        return redirect()->route('cats.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cats $cats)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cats $cat)
    {
    //   $catBreed = $cat->with('breed')->get();
    //     dd($catBreed[0]->id);
      return view('admin.cat_form', ['cat' => $cat->load('breed')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cats $cat)
    {
           $request->validate([
            'cat_breed' => 'required|unique:cat_breeds,tipe',
            'cat_origin' => 'required|unique:cats,cat_origin',
        ]);

        
        $cat->update([
            'cat_origin' => $request->cat_origin,
        ]);

        CatBreeds::find($cat->cat_breed_id)->update([
            'tipe' => $request->cat_breed
        ]);

        return redirect()->route('cats.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cats $cat)
    {
        $catBreedId = $cat->cat_breed_id;
        $cat->delete();
          
        $CatBreeds = CatBreeds::findOrFail($catBreedId);
        $CatBreeds->delete();
     

        return redirect()->route('cats.index');
    }
}
