<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // Public View
    public function post()
    {
        SEOTools::setTitle('News & Updates');
        SEOTools::setDescription('Stay updated with the latest news and updates from our company. Read articles, announcements, and insights on our blog.');
        $posts = Post::with('tags')->latest()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('tags')->latest()->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:webp,jpg,png|max:2048',
            'tags' => 'nullable|array',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('blog', 'public');
        }

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $validated['thumbnail'] ?? null,
        ]);

        // Hubungkan tag ke post
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return back()->with('success', 'Artikel berhasil diterbitkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        SEOTools::setTitle($post->title);
        SEOTools::setDescription(Str::limit(strip_tags($post->content), 150));

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
            'tags' => 'nullable|array', // Tambahkan ini
        ]);

        // Update Slug kalau judul ganti
        $validated['slug'] = Str::slug($request->title);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('blog', 'public');
        }

        $post->update($validated);

        // Sinkronisasi Tag
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('admin.posts.index')->with('success', 'Artikel diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }
        $post->delete();

        return back()->with('success', 'Artikel telah dihapus.');
    }
}
