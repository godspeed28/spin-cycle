<?php

namespace App\Libraries;

use Midtrans\Config;

class MidtransConfig
{
    public static function config()
    {
        Config::$serverKey = 'SB-Mid-server-MWK2d9ypOvdM28-dqTwSV-VD';
        Config::$isProduction = false; // true untuk production
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }
}
