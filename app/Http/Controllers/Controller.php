<?php

namespace App\Http\Controllers;

use App\Traits\Uploader;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Uploader;

    public function changeLang($locale)
    {
        if (!in_array($locale, ['en', 'ar'])) {
            abort(404);
        }

        App::setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }

    public function handleTranslatableInput($data, $inputs)
    {
        foreach ($inputs as  $inputName) {
            $data[$inputName] = [
                "en" => $data[$inputName],
                "ar" => $data[$inputName . "_ar"] ?? null,
            ];
        }

        return $data;
    }
}
