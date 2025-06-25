<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function showPromoGajian()
    {
        $files = [];
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'svg'];
        $directory = public_path('img/promo/gajian');

        if (is_dir($directory)) {
            $allFiles = scandir($directory);

            foreach ($allFiles as $file) {
                if ($file === '.' || $file === '..') continue;

                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, $allowed_extensions)) {
                    $files[] = 'img/promo/gajian/' . $file;
                }
            }
        }

        return view('main.promosi.proGajian', compact('files'));
    }
}
