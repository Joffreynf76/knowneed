<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ProfilConversation extends Conversation
{

    protected $question;

    public function askQuestion()
    {

        $this->say('You can add skills on your <a target="_blank" href="profil.php">profil</a> page.');

    }
    public function run()
    {
        $this->askQuestion();
    }
}
