<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Framework\Doctrine\EntityManager;

ConsoleRunner::run(
    new SingleManagerProvider(EntityManager::getInstance())
);

