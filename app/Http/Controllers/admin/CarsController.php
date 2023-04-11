<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cars;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'price' => 'required',
            'type' => 'required',
            'Categorie' => 'required',
            'picture' => 'required|image|max:2048', // Add validation rules for the image
        ]);
    
        $cars = new Cars();
        $cars->name = $validatedData['name'];
        $cars->brand = $validatedData['brand'];
        $cars->model = $validatedData['model'];
        $cars->year = $validatedData['year'];
        $cars->color = $validatedData['color'];
        $cars->price = $validatedData['price'];
        $cars->type = $validatedData['type'];
        $cars->Categorie = $validatedData['Categorie'];
    
        // Store the image file in the "public" disk of Laravel Storage
        $imagePath = $request->file('picture')->store('public');
    
        // Set the image path for the car
        $cars->picture = $imagePath;
    
        $cars->save();
    
        return redirect('/cars')->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cars $cars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cars $cars)
    {
        //
    }
}
