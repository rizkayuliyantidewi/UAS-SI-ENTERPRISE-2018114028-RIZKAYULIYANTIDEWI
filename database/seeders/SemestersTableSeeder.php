<?php

namespace Database\Seeders;

use App\Models\semester;
use Illuminate\Database\Seeder;

class SemestersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 8; $i++)
        {
            semester::create(['semester' => $i]);
        }
    }
}
