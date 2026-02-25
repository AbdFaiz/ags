<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Public Page Showcase
    public function produk()
    {
        SEOTools::setTitle('Katalog Produk Unggulan - Adidata');
        SEOTools::setDescription('Jelajahi berbagai solusi teknologi dan produk berkualitas dari Adidata. Kami menyediakan perangkat terbaik untuk kebutuhan Anda.');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('type', 'product.group');
        $products = Product::latest()->get();

        return view('produk', compact('products'));
    }

    // Admin Page Index
    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:webp,jpg,png|max:2048',
        ]);

        // Cek jika produk baru ini dijadikan primary, matikan primary yang lain
        if ($request->has('is_primary')) {
            Product::where('is_primary', true)->update(['is_primary' => false]);
            $validated['is_primary'] = true;
        } else {
            $validated['is_primary'] = false;
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:webp,jpg,png|max:2048',
        ]);

        // Logika Perpindahan Status Primary
        if ($request->has('is_primary')) {
            Product::where('id', '!=', $product->id)->where('is_primary', true)->update(['is_primary' => false]);
            $validated['is_primary'] = true;
        } else {
            $validated['is_primary'] = false;
        }

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return back()->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return back()->with('success', 'Produk berhasil dihapus!');
    }
}
