<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class MovieConversation extends Conversation
{
    /**
     * First question
     */
    public function askForMovie()
    {
        $this->ask('So you are looking for similar movies? What is your favourite movie?', function($answer) {
            $selectedMovie = $answer->getText();
            $this->getBot()->reply('Okay great, your favourite movie is ' . $selectedMovie);
            $this->getBot()->userStorage()->save([
                'favourite_movie' => $selectedMovie,
            ]);
            $this->askForRecommendationType();
        });
    }

    /**
     * Second question
     */
    public function askForRecommendationType()
    {
        $question = Question::create('Do you want another movie or are you looking for a book of the same name?');
        $question->addButtons([
            Button::create('Movie')->value('movie'),
            Button::create('Book')->value('book')
        ]);
        //https://tastedive.com/api/similar?k=282329-Tastediv-78W8OZ6H&q=red+hot+chili+peppers
        $this->ask($question, function ($answer) {
            // detect if button was clicked
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'movie') {
                    $this->say("Your favourite movie is" . $this->getBot()->userStorage()->get('favourite_movie'));
                } else {
                    $this->say("Hmm... looking for a book of the same name");
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askForMovie();
    }
}
