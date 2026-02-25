<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // name');
        //     $table->string('slug')->unique();
        //     $table->text('description');
        //     $table->string('image

        // 1. Buat Akun Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@adidata.site',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // 2. Buat Produk Utama (Microchip)
        Product::create([
            'name' => 'Chip Module',
            'slug' => 'chip-module',
            'description' => 'Solusi pelacakan tingkat tinggi yang dirancang khusus untuk integrasi tersembunyi. Chip Module v3.0 menggunakan arsitektur Dimensi Core 21×28×10mm yang mampu menyatu dengan sirkuit internal kendaraan tanpa terdeteksi. Dilengkapi dengan BTS Signal Penetration yang memastikan sinyal tetap stabil meski di dalam basement beton atau kontainer besi. Dengan konsumsi daya rendah hanya 250mA, sistem ini menjamin keamanan kendaraan 24/7 tanpa mempengaruhi performa aki asli.',
            'image' => null,
            'is_primary' => true,
        ]);

        $this->call(PostSeeder::class);
    }
}
