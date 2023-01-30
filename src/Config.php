<?php

define("ROOT", "http://localhost");
define("DATA_LAYER", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3308",
    "dbname" => "calendar",
    "username" => "root",
    "passwd" => "root",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
define("SITE_NAME", "Calendar");
define("SESS_NAME", "user_se");
define("MESSAGE_NAME", "message");
define('MAIL', [
    'host' => '',
    'port' => '',
    'username' => '',
    'password' => '',
    'name' => 'GUILHERME - Calendar',
    'email' => 'guilherme@gtginnovation.com.br'
]);