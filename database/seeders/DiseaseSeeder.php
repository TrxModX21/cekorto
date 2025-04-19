<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diseases')->insert([
            [
                'name' => 'Osteoarthritis',
                'slug' => slug('Osteoarthritis'),
                'status' => 1,
            ],
            [
                'name' => 'Rheumatoid Arthritis',
                'slug' => slug('Rheumatoid Arthritis'),
                'status' => 1,
            ],
            [
                'name' => 'Skoliosis',
                'slug' => slug('Skoliosis'),
                'status' => 1,
            ],
            [
                'name' => 'Cervical Spondylosis',
                'slug' => slug('Cervical Spondylosis'),
                'status' => 1,
            ],
            [
                'name' => 'Osteoporosis',
                'slug' => slug('Osteoporosis'),
                'status' => 1,
            ],
        ]);
    }
}