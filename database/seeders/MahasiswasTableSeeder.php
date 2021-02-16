<?php

namespace Database\Seeders;

use App\Models\mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mahasiswa::create([
            'nama_mahasiswa' => 'John Doe',
            'alamat' => 'Indonesia',
            'no_tlp' => '123456789',
            'email' => 'johndoe@exampe.com',
        ]);
    }
}
