<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('frontends')->insert([
            [
                'data_keys' => 'maintenance.data',
                'data_values' => '{"description":"<div class=\"mb-5\" style=\"color: rgb(111, 111, 111); font-family: Nunito, sans-serif; margin-bottom: 3rem !important;\"><h3 class=\"mb-3\" style=\"text-align: center; font-weight: 600; line-height: 1.3; font-size: 24px; font-family: Exo, sans-serif; color: rgb(54, 54, 54);\">What information do we collect?<\/h3><p class=\"font-18\" style=\"text-align: center; margin-right: 0px; margin-left: 0px; font-size: 18px !important;\">We gather data from you when you register on our site, submit a request, buy any services, react to an overview, or round out a structure. At the point when requesting any assistance or enrolling on our site, as suitable, you might be approached to enter your: name, email address, or telephone number. You may, nonetheless, visit our site anonymously.<\/p><\/div>","image":"66654f774191b1717915511.png"}',
                'tempname' => 'basic',
            ]
        ]);
    }
}
