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
if (! function_exists('imageUrl')) {
    function imageUrl($width = 640, $height = 480, $category = null, $randomize = true, $word = null, $gray = false)
    {
        $baseUrl = "https://picsum.photos/";
        $url = "{$width}/{$height}";

        if ($randomize) {
            $url .= '?' . randomNumber(5, true);
        }

        return $baseUrl . $url;
    }
}

