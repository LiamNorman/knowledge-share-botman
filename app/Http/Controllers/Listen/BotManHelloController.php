<?php

namespace App\Http\Controllers\Listen;

use App\Http\Controllers\Controller;

class BotManHelloController extends Controller
{
    /**
     * Handle when user says "greetings"
     * @param $bot
     */
    public function handleSayGreetings($bot)
    {
        $bot->reply("Greetings, I'm Hello World bot!");
    }

    /**
     * Handle when user says "hello, I'm {name}"
     * @param $bot
     * @param $name
     */
    public function handleSayHelloWithName($bot, $name)
    {
        $bot->reply("Hello, $name. I'm Hello World bot");
    }
}
