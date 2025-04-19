<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('symptoms')->insert([
            [
                'name' => 'Nyeri sendi',
                'slug' => slug('Nyeri sendi'),
                'status' => 1,
            ],
            [
                'name' => 'Pembengkakan sendi',
                'slug' => slug('Pembengkakan sendi'),
                'status' => 1,
            ],
            [
                'name' => 'Kekakuan sendi',
                'slug' => slug('Kekakuan sendi'),
                'status' => 1,
            ],
            [
                'name' => 'Keterbatasan gerak',
                'slug' => slug('Keterbatasan gerak'),
                'status' => 1,
            ],
            [
                'name' => 'Kemerahan pada sendi',
                'slug' => slug('Kemerahan pada sendi'),
                'status' => 1,
            ],
            [
                'name' => 'Nyeri punggung',
                'slug' => slug('Nyeri punggung'),
                'status' => 1,
            ],
            [
                'name' => 'Postur tubuh miring',
                'slug' => slug('Postur tubuh miring'),
                'status' => 1,
            ],
            [
                'name' => 'Nyeri leher',
                'slug' => slug('Nyeri leher'),
                'status' => 1,
            ],
            [
                'name' => 'Kesemutan',
                'slug' => slug('Kesemutan'),
                'status' => 1,
            ],
            [
                'name' => 'Kelemahan otot',
                'slug' => slug('Kelemahan otot'),
                'status' => 1,
            ],
        ]);
    }
}