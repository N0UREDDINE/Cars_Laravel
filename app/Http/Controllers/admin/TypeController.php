<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Types = Type::all();
        return view('Types.ListTypes', ['Types' => $Types]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Types.AddTypes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newType = Type::create([
            'Type' => $request->Type,
        ]);
        session()->flash('success', 'Type Add successfully.');
        return redirect('/Types');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('Types.UpdateTypes', ['Types' => Type::where('id', $id)->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $updateType = Type::find($request->id);
        $updateType->type = $request->Type;
        $updateType->save();


        session()->flash('success', 'Type updated successfully.');
        return redirect('/Types');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Type = Type::find($request->id);
        $Type->delete();

        session()->flash('success', 'Type deleted successfully.');
        return redirect('/Types');
    }
}