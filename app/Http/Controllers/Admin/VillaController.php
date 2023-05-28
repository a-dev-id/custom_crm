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
        return view('admin.villa.index')->with(compact('villas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.villa.create');
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

        return redirect()->route('villa.index')->with('message', $request->name . ' created Successfully');
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
        $data = Villa::find($id);
        return view('admin.villa.edit')->with(compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (empty($request->file('image'))) {
            $image = $request->old_image;
        } else {
            $image = $request->file('image')->store('images/villa', 'public');
        }

        $data = Villa::find($id);

        $data->name = $request->name;
        $data->description = $request->description;
        $data->size = $request->size;
        $data->advantages = $request->advantages;
        $data->view = $request->view;
        $data->image = $image;

        $data->save();

        return redirect()->route('villa.index')->with('message', $request->name . ' edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Villa::find($id);
        $data->delete();
        return redirect()->route('villa.index')->with('message', $data->name . ' deleted Successfully');
    }
}
