<?php

require_once 'vendor/autoload.php';

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Drivers\DriverManager;
require_once  ('OnboardingConversation.php');
require_once  ('QuestionConversation.php');
require_once  ('ProfilConversation.php');
require_once ('RessourcesConversation.php');
$config = [];

DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

$adapter = new FilesystemAdapter();

$botman = BotManFactory::create($config, new SymfonyCache($adapter));

$botman->hears('Hello', function($bot) {

  $bot->startConversation(new OnboardingConversation);



});

$botman->hears('I have a question', function($bot) {

    $bot->startConversation(new QuestionConversation);

});

$botman->hears('How to add skills', function($bot) {

    $bot->startConversation(new ProfilConversation);

});

$botman->hears('What kind of ressources can I upload ', function($bot) {

    $bot->startConversation(new RessourcesConversation);

});





$botman->listen();