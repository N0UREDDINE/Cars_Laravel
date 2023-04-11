<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cities;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = cities::all();
        return view('Cities.ListCities', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cities.AddCities');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newCity = cities::create([
            'City' => $request->City,
        ]);
        session()->flash('success', 'City Add successfully.');
        return redirect('/Cities');
    }

    /**
     * Display the specified resource.
     */
    public function show(cities $cities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('Cities.updateCities', ['cities' => cities::where('id', $id)->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $updatecity = cities::find($request->id);
        $updatecity->City = $request->City;
        $updatecity->save();

        session()->flash('success', 'City updated successfully.');
        return redirect('/Cities');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $city = Cities::find($request->id);
        $city->delete();

        session()->flash('success', 'City deleted successfully.');
        return redirect('/Cities');
    }

}