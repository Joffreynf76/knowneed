<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class QuestionConversation extends Conversation
{

    protected $question;

    public function askQuestion() {

$this->ask('What subject?', function($answer) {
            $subject= $answer->getText();

            $db = new PDO('mysql:host=localhost;dbname=knowledge', 'root', 'root');
            $users = $db->query("SELECT * FROM user_has_user WHERE user_has_user.title = '".$subject."'")->fetchAll();


            foreach($users as $result) {
                $listage = $db->query("SELECT * FROM user WHERE idUser=".$result['user_idUser1'])->fetch();
                $question_description = json_encode(utf8_decode($result['message']));
                $name = json_encode(utf8_decode($listage['nameUser']));
                $firstname = json_encode(utf8_decode($listage['firstnameUser']));
                $idUser = $listage['idUser'];


                $this->say('Messages:'.$question_description. '<br> <br> by : ' .' <a target="_blank" href="detail.php?id='.$idUser.'"> ' . $firstname . ' ' . $name . ' </a>');



            }


        });
}


public function run()
{
    $this->askQuestion();
}
}
