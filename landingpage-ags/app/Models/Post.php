<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'thumbnail', 'content'];

    // Membuat slug otomatis setiap kali Judul dibuat/diubah
    public static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $slug = Str::slug($post->title);
            $count = static::where('slug', 'like', "{$slug}%")->count();

            $post->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    // Memastikan pencarian detail artikel menggunakan slug, bukan ID
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
