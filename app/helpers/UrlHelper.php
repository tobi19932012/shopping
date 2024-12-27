<?php

namespace Helpers;

class UrlHelper
{
    // Tạo URL đầy đủ dựa trên đường dẫn
    public static function baseUrl($path = '')
    {
        $base = 'https://localhost/shopping/public';
        return rtrim($base, '/') . '/' . ltrim($path, '/');
    }

    // Chuyển hướng đến URL khác
    public static function redirect($url)
    {
        header("Location: " . self::baseUrl($url));
        exit;
    }
}