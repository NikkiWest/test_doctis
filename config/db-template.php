<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => '<place-holder>', // Ex. mysql:host=localhost;dbname=test
    'username' => 'place-holder',
    'password' => 'place-holder',
    'charset' => 'utf8',
    'on afterOpen' => function($event) {
        $event->sender->createCommand("SET TIMEZONE='Asia/Novosibirsk'")->execute();
    },
];
