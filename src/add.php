<?php

header('Content-Type: application/json');
$pdo = new PDO("mysql:host=mysql;dbname=moodle_test","moodle_user" , 'password');
$text = trim($_GET['text'] ?? '');
 
if(strlen($text) == 0) {
    echo json_encode(["ok" => false]);
} else {
    $statement = $pdo->prepare("INSERT INTO todo (text) VALUES (?)");
    $ok = $statement->execute([$text]);
    echo json_encode(["ok" => $ok]);
}
