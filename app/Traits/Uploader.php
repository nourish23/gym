<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait Uploader
{

    public function uploads($file, $path)
    {
        $filename = strtolower(Str::random(15)) . '.' . $file->getClientOriginalExtension();
        $filePath = $filename;

        Storage::disk('public')->put($filePath, file_get_contents($file), [
            'Metadata' =>
            ['original_name' => $file->getClientOriginalName()]
        ]);

        return Storage::disk('public')->url($filePath);
    }

    public function fileSize($file, $precision = 2)
    {
        $size = $file->getSize();

        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }

        return $size;
    }
}
