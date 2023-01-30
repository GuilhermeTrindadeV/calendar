<?php 

require __DIR__ . "/../vendor/autoload.php";

use GTG\DataLayer\Connect;
use Src\Models\User;
use Src\Models\Events;

// $conn = Connect::getInstance();
// $error = Connect::getError();

// if($error) {
//     echo $error->getMessage();
//     die();
// }

// $query = $conn->query("SELECT * FROM usuarios");
// var_dump($query->fetchAll());

// $events = new Events();
// $list = $events->find()->fetch(true);
// var_dump($list);

// foreach ($list as $userItem) {
//     var_dump($userItem->email);
// }