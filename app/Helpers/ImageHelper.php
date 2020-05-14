<?php

use Illuminate\Support\Facades\Storage;

if (! function_exists('saveImage')) {
    function saveImage(string $imageUrl, string $disk = 'public'): ?string
    {
        $contents = file_get_contents($imageUrl);
        $name = substr($imageUrl, strrpos($imageUrl, '?') + 1);

        return Storage::disk($disk)->put('loads/' . md5($name) . '.jpg', $contents) ? 'loads/' . md5($name) . '.jpg' : null;
    }
}
