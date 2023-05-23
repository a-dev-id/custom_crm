<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Villa;
use Illuminate\Http\Request;

class VillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villas = Villa::all();
        return view('admin/villa/index')->with(compact('villas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/villa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (empty($request->file('image'))) {
            $image = null;
        } else {
            $image = $request->file('image')->store('images/villa', 'public');
        }

        Villa::create([
            'name' => $request->name,
            'description' => $request->description,
            'size' => $request->size,
            'advantages' => $request->advantages,
            'view' => $request->view,
            'image' => $image,
        ]);

        return redirect()->route('villa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
