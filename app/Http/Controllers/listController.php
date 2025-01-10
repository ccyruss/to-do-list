<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listModel;

class listController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = listModel::orderByDesc('id')->get();
        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        listModel::create($validated);

        return redirect()->back()->with('success'. 'Veri başarıyla eklenildi.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        $post = listModel::find($id);

        $post->status = $request->input('status');
        $post->save();

        return response()->json([
            'success' => true,
            'message' => 'Status başarıyla güncellendi.',
            'data' => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = listModel::findOrFail($id); 
        $post->delete(); 
        return redirect()->back()->with('success', 'Veri başarıyla silindi.');
    }
}
