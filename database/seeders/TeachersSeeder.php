<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teachers;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teachers::create(
            [
                'name' => 'Merrill Carney'
            ]
        );

        Teachers::create(
            [
                'name' => 'Griffin Mcleod'
            ]
        );
    }
}
