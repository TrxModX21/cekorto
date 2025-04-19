<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('extensions')->insert([
            [
                'act' => 'tawk-chat',
                'name' => 'Tawk.to',
                'description' => 'TrxMod21X',
                'image' => 'tawky_big.png',
                'script' => '<script type="text/javascript">
                                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                                (function(){
                                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                                s1.async=true;
                                s1.src="https://embed.tawk.to/{{app_key}}";
                                s1.charset="UTF-8";
                                s1.setAttribute("crossorigin","*");
                                s0.parentNode.insertBefore(s1,s0);
                                })();
                             </script>',
                'shortcode' => '{"app_key":{"title":"App Key","value":"------"}}',
                'support' => 'twak.png',
                'status' => 0
            ],
            [
                'act' => 'google-recaptcha2',
                'name' => 'Google Recaptcha 2',
                'description' => 'Key location is shown bellow',
                'image' => 'recaptcha3.png',
                'script' => '
                <script src="https://www.google.com/recaptcha/api.js"></script>
                <div class="g-recaptcha" data-sitekey="{{site_key}}" data-callback="verifyCaptcha"></div>
                <div id="g-recaptcha-error"></div>',
                'shortcode' => '{"site_key":{"title":"Site Key","value":"6LeaSDcqAAAAADZNSPfzA8IP_GIG06rZDbMG5OCh"},"secret_key":{"title":"Secret Key","value":"6LeaSDcqAAAAAL7xn1qd9eJ2MuqM7uxbvq1HmdLe"}}',
                'support' => 'recaptcha.png',
                'status' => 0
            ],
            [
                'act' => 'custom-captcha',
                'name' => 'Custom Captcha',
                'description' => 'Just put any random string',
                'image' => 'customcaptcha.png',
                'script' => null,
                'shortcode' => '{"random_key":{"title":"Random String","value":"SecureString"}}',
                'support' => 'na',
                'status' => 0
            ],
            [
                'act' => 'google-analytics',
                'name' => 'Google Analytics',
                'description' => 'Key location is shown bellow',
                'image' => 'google_analytics.png',
                'script' => '<script async src="https://www.googletagmanager.com/gtag/js?id={{measurement_id}}"></script>
                <script>
                  window.dataLayer = window.dataLayer || [];
                  function gtag(){dataLayer.push(arguments);}
                  gtag("js", new Date());
                
                  gtag("config", "{{measurement_id}}");
                </script>',
                'shortcode' => '{"measurement_id":{"title":"Measurement ID","value":"------"}}',
                'support' => 'ganalytics.png',
                'status' => 0
            ],
        ]);
    }
}
