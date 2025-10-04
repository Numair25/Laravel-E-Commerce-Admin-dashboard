<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fashion;

class FashionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fashions = Fashion::all();
        return view('admin.fashions.index', compact('fashions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fashions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
        ]);
        Fashion::create($validated);
        return redirect()->route('admin.fashions.index')->with('success', 'Fashion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fashion = Fashion::findOrFail($id);
        return view('admin.fashions.show', compact('fashion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fashion = Fashion::findOrFail($id);
        return view('admin.fashions.edit', compact('fashion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fashion = Fashion::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
        ]);
        $fashion->update($validated);
        return redirect()->route('admin.fashions.index')->with('success', 'Fashion updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fashion = Fashion::findOrFail($id);
        $fashion->delete();
        return redirect()->route('admin.fashions.index')->with('success', 'Fashion deleted successfully.');
    }
}
