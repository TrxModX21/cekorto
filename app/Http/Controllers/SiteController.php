<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Hospital;
use App\Models\Recommendation;
use App\Models\Symptom;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index()
    {
        $pageTitle = 'Home';

        $content = getContent('user_dashboard_page.content', true);
        $pageContent = $content->data_values;

        $resources['totalDisease'] = Disease::count();
        $resources['totalSymptoms'] = Symptom::count();
        $resources['totalRecommendation'] = Recommendation::count();
        $resources['totalHospital'] = Hospital::count();

        return view('templates.basic.dashboard', compact('pageTitle', 'resources', 'pageContent'));
    }

    public function policyPages()
    {
        dd('policyPages');
    }

    public function placeholderImage($size = null)
    {
        $imgWidth = explode('x', $size)[0];
        $imgHeight = explode('x', $size)[1];
        $text = $imgWidth . '×' . $imgHeight;
        $fontFile = realpath('assets/font/solaimanLipi_bold.ttf');
        $fontSize = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if ($imgHeight < 100 && $fontSize > 30) {
            $fontSize = 30;
        }

        $image = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill = imagecolorallocate($image, 255, 255, 255);
        imagefill($image, 0, 0, $bgFill);
        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX = ($imgWidth - $textWidth) / 2;
        $textY = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }
}
