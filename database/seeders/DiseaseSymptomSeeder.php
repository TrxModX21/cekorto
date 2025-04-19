<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiseaseSymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('disease_symptoms')->insert([
            [
                'disease_id' => 1,
                'symptom_id' => 1,
                'weight' => 0.8,
            ],
            [
                'disease_id' => 1,
                'symptom_id' => 2,
                'weight' => 0.7,
            ],
            [
                'disease_id' => 1,
                'symptom_id' => 3,
                'weight' => 0.9,
            ],
            [
                'disease_id' => 1,
                'symptom_id' => 4,
                'weight' => 0.6,
            ],

            [
                'disease_id' => 2,
                'symptom_id' => 1,
                'weight' => 0.9,
            ],
            [
                'disease_id' => 2,
                'symptom_id' => 2,
                'weight' => 0.8,
            ],
            [
                'disease_id' => 2,
                'symptom_id' => 3,
                'weight' => 0.7,
            ],
            [
                'disease_id' => 2,
                'symptom_id' => 5,
                'weight' => 0.6,
            ],

            [
                'disease_id' => 3,
                'symptom_id' => 6,
                'weight' => 0.8,
            ],
            [
                'disease_id' => 3,
                'symptom_id' => 7,
                'weight' => 0.9,
            ],
            [
                'disease_id' => 3,
                'symptom_id' => 4,
                'weight' => 0.7,
            ],

            [
                'disease_id' => 4,
                'symptom_id' => 8,
                'weight' => 0.9,
            ],
            [
                'disease_id' => 4,
                'symptom_id' => 9,
                'weight' => 0.7,
            ],
            [
                'disease_id' => 4,
                'symptom_id' => 4,
                'weight' => 0.6,
            ],

            [
                'disease_id' => 5,
                'symptom_id' => 6,
                'weight' => 0.7,
            ],
            [
                'disease_id' => 5,
                'symptom_id' => 10,
                'weight' => 0.8,
            ],
            [
                'disease_id' => 5,
                'symptom_id' => 4,
                'weight' => 0.6,
            ],
        ]);
    }
}