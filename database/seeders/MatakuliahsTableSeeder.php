<?php

namespace Database\Seeders;

use App\Models\matakuliah;
use Illuminate\Database\Seeder;

class MatakuliahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        matakuliah::create([
            'nama_matakuliah' => 'MK 1',
            'sks' => '2',
        ]);
    }
}
