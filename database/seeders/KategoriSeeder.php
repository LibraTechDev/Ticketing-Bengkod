<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['nama_kategori' => 'Konser'],
            ['nama_kategori' => 'Seminar'],
            ['nama_kategori' => 'Workshop'],
            ['nama_kategori' => 'Olahraga'],
            ['nama_kategori' => 'Kesenian'],
            ['nama_kategori' => 'Pesta'],
            ['nama_kategori' => 'Kuliner'],
            ['nama_kategori' => 'Lainnya'],

        ];

        foreach ($kategoris as $kategori) {
            Kategori::create(['nama' => $kategori['nama_kategori']]);
        }
    }
}