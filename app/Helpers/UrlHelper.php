<?php
namespace App\Helpers;

class UrlHelper
{
    public static function changeLanguageSegment($locale, $url = null)
    {
        if (!$url) {
            $url = url()->current();
        }

        $parsedUrl = parse_url($url);

        $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '/';

        $segments = explode('/', trim($path, '/'));

        if(!in_array($segments[0],['az','en','ru'])){
            array_unshift($segments, $locale, );
        }


        $segments[0] = $locale;

        $newPath = implode('/', $segments);

        $newUrl = url($newPath);

        return $newUrl;
    }
}
