<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentsMark;

class StudentsMarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentsMark::create(
            [
                'student_id' => '1',
                'term' => 'TWO',
                'maths' => '80',
                'science' => '75',
                'history' => '70',
                'total_marks' => '225',
            ]
        );

        StudentsMark::create(
            [
                'student_id' => '2',
                'term' => 'ONE',
                'maths' => '60',
                'science' => '50',
                'history' => '70',
                'total_marks' => '180',
            ]
        );
    }
}
