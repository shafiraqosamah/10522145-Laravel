<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Pelanggan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // ADMIN USER (Google Login Template - change email to your actual google account email)
        \App\Models\User::create([
            'email' => 'shafiraqosamah@gmail.com', // <-- GANTI DENGAN EMAIL GOOGLE ANDA UNTUK TESTING
            'google_id' => 'temp_google_id_10522145',
            'name' => 'Shafira Qosamah',
            'avatar' => null,
            'role' => 'Admin'
        ]);

        // KATEGORI
        $kategori1 = Kategori::create(['nama_kategori' => 'Sepatu']);
        $kategori2 = Kategori::create(['nama_kategori' => 'Baju']);
        $kategoriIds = [$kategori1->id, $kategori2->id];

        // PRODUK (10 data random)
        for ($i = 0; $i < 10; $i++) {
            Produk::create([
                'id_kategori_produk' => $faker->randomElement($kategoriIds),
                'nama_produk' => $faker->words(2, true),
                'stok' => rand(1, 100),
                'harga_produk' => rand(50000, 500000),
                'foto_produk' => 'default.png'
            ]);
        }

        // PELANGGAN (10 data random)
        for ($i = 0; $i < 10; $i++) {
            Pelanggan::create([
                'nama_lengkap' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'nomor_hp' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail
            ]);
        }
    }
}