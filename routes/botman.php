<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Outgoing\Question;
use App\Http\Controllers\Listen\BotManMovieController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('Call me {name}', function ($bot, $name) {
    $bot->reply('Hello! ' . $name);
});

$botman->hears('I am ([0-9]+) years old', function($bot, $age) {
    $bot->reply('Got it - your age is: ' . $age);
});

$botman->hears('I work on ([0-9]+) projects', function($bot, $projects) {

    // saves it as a collection
    $bot->userStorage()->save([
        'projects' => $projects
    ]);
    $bot->reply('Got it - you work on ' . $projects . ' projects.');
});

$botman->hears('How many projects do I work on', function($bot) {
    // handle like a collection
    $projects = $bot->userStorage()->get('projects');
    $bot->reply('You work on '.  $projects . ' projects');
});

$botman->hears('greetings', 'App\Http\Controllers\Listen\BotManHelloController@handleSayGreetings');
$botman->hears("hello I'm {name}", 'App\Http\Controllers\Listen\BotManHelloController@handleSayHelloWithName');

// Fallback option
$botman->fallback(function ($bot) {
    $bot->reply("Hmm I don't know what you are saying. Please try again");
});

$botman->hears('Wake up botman', BotManController::class . '@startConversation');


