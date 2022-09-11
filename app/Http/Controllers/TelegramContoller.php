<?php

namespace App\Http\Controllers;
use Telegram\Bot\Laravel\Facades\Telegram;


class TelegramContoller extends Controller
{
    public function test()
    {
        $activity = Telegram::getUpdates();
        dd($activity);
    }
}
