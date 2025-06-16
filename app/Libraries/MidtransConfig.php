<?php

namespace App\Libraries;

use Midtrans\Config;

class MidtransConfig
{
    public static function config()
    {
        Config::$serverKey = env('MIDTRANS_API_KEY_SERVER');
        Config::$isProduction = false; // true untuk production
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }
}
