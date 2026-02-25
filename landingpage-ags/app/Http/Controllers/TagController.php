<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::withCount('posts')->get();

        return view('admin.tags.index', compact('tags'));
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
        $request->validate(['name' => 'required|unique:tags,name']);
        Tag::create(['name' => $request->name, 'slug' => Str::slug($request->name), 'description' => $request->description]);

        return back()->with('success', 'Tag berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => 'required|unique:tags,name,'.$tag->id]);
        $tag->update(['name' => $request->name, 'slug' => Str::slug($request->name), 'description' => $request->description]);

        return back()->with('success', 'Tag berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('success', 'Tag dihapus.');
    }
}
