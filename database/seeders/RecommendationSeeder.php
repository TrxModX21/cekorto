<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recommendations')->insert([
            [
                'disease_id' => 1,
                'title' => 'Latihan Penguatan Otot',
                'short_desc' => 'Lakukan latihan penguatan otot sekitar sendi yang terkena, terutama untuk lutut dan pinggul',
                'priority' => 1
            ],
            [
                'disease_id' => 1,
                'title' => 'Kontrol Berat Badan',
                'short_desc' => 'Jaga berat badan ideal untuk mengurangi tekanan pada sendi',
                'priority' => 1
            ],
            [
                'disease_id' => 1,
                'title' => 'Terapi Fisik',
                'short_desc' => 'Ikuti program terapi fisik untuk meningkatkan fleksibilitas dan kekuatan',
                'priority' => 2
            ],
            [
                'disease_id' => 1,
                'title' => 'Modifikasi Aktivitas',
                'short_desc' => 'Hindari aktivitas yang membebani sendi berlebihan',
                'priority' => 2
            ],
            [
                'disease_id' => 1,
                'title' => 'Konsumsi Anti-inflamasi',
                'short_desc' => 'Konsumsi makanan yang memiliki sifat anti-inflamasi seperti ikan berlemak dan sayuran hijau',
                'priority' => 2
            ],

            [
                'disease_id' => 2,
                'title' => 'Terapi Obat DMARDs',
                'short_desc' => 'Konsultasikan dengan dokter untuk penggunaan obat DMARDs',
                'priority' => 1
            ],
            [
                'disease_id' => 2,
                'title' => 'Latihan Range of Motion',
                'short_desc' => 'Lakukan latihan ROM secara rutin untuk menjaga fleksibilitas sendi',
                'priority' => 1
            ],
            [
                'disease_id' => 2,
                'title' => 'Istirahat yang Cukup',
                'short_desc' => 'Pastikan mendapatkan istirahat yang cukup, terutama saat terjadi flare-up',
                'priority' => 2
            ],
            [
                'disease_id' => 2,
                'title' => 'Diet Anti-inflamasi',
                'short_desc' => 'Kurangi makanan yang dapat memicu peradangan',
                'priority' => 2
            ],
            [
                'disease_id' => 2,
                'title' => 'Terapi Okupasi',
                'short_desc' => 'Ikuti terapi okupasi untuk belajar cara melindungi sendi',
                'priority' => 2
            ],

            [
                'disease_id' => 3,
                'title' => 'Program Latihan Khusus',
                'short_desc' => 'Ikuti program latihan khusus untuk memperkuat otot punggung',
                'priority' => 1
            ],
            [
                'disease_id' => 3,
                'title' => 'Penggunaan Brace',
                'short_desc' => 'Gunakan brace sesuai anjuran dokter untuk mencegah kurva bertambah parah',
                'priority' => 1
            ],
            [
                'disease_id' => 3,
                'title' => 'Postur Tubuh',
                'short_desc' => 'Perhatikan postur tubuh saat duduk dan berdiri',
                'priority' => 2
            ],
            [
                'disease_id' => 3,
                'title' => 'Nutrisi Tulang',
                'short_desc' => 'Konsumsi makanan kaya kalsium dan vitamin D',
                'priority' => 2
            ],
            [
                'disease_id' => 3,
                'title' => 'Monitoring Rutin',
                'short_desc' => 'Lakukan pemeriksaan rutin untuk memantau perkembangan kurva',
                'priority' => 2
            ],

            [
                'disease_id' => 4,
                'title' => 'Latihan Leher',
                'short_desc' => 'Lakukan latihan penguatan dan peregangan leher secara teratur',
                'priority' => 1
            ],
            [
                'disease_id' => 4,
                'title' => 'Postur Kerja',
                'short_desc' => 'Atur posisi kerja yang ergonomis, terutama saat menggunakan komputer',
                'priority' => 1
            ],
            [
                'disease_id' => 4,
                'title' => 'Terapi Panas-Dingin',
                'short_desc' => 'Aplikasikan terapi panas atau dingin untuk mengurangi nyeri',
                'priority' => 2
            ],
            [
                'disease_id' => 4,
                'title' => 'Hindari Gerakan Mendadak',
                'short_desc' => 'Hindari gerakan leher yang mendadak dan berlebihan',
                'priority' => 2
            ],
            [
                'disease_id' => 4,
                'title' => 'Suplemen Tulang',
                'short_desc' => 'Konsumsi suplemen untuk kesehatan tulang sesuai anjuran dokter',
                'priority' => 3
            ],

            [
                'disease_id' => 5,
                'title' => 'Asupan Kalsium',
                'short_desc' => 'Pastikan asupan kalsium mencukupi (1000-1200mg per hari)',
                'priority' => 1
            ],
            [
                'disease_id' => 5,
                'title' => 'Weight-bearing Exercise',
                'short_desc' => 'Lakukan latihan dengan menahan beban seperti jalan kaki atau jogging ringan',
                'priority' => 1
            ],
            [
                'disease_id' => 5,
                'title' => 'Vitamin D',
                'short_desc' => 'Dapatkan paparan sinar matahari pagi dan konsumsi suplemen vitamin D',
                'priority' => 1
            ],
            [
                'disease_id' => 5,
                'title' => 'Hindari Rokok & Alkohol',
                'short_desc' => 'Hindari merokok dan konsumsi alkohol berlebihan',
                'priority' => 2
            ],
            [
                'disease_id' => 5,
                'title' => 'Pencegahan Jatuh',
                'short_desc' => 'Modifikasi lingkungan untuk mencegah risiko jatuh',
                'priority' => 2
            ],
        ]);
    }
}
