<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Helpers extends Controller
{
    public static function password_generate($length = 8)
    {
        return "12345678";
        # $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        # return substr(str_shuffle($data), 0, $length);
    }
}
