<?php

namespace App\Http\Controllers\Listen;

use App\Conversations\MovieConversation;
use App\Http\Controllers\Controller;
use BotMan\BotMan\BotMan;

class BotManMovieController extends Controller
{
    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new MovieConversation());
    }
}
