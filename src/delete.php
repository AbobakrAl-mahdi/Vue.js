<?php

header('Content-Type: application/json');
$pdo = new PDO('mysql:host=mysql;dbname=moodle_test', 'moodle_user', 'password');
$id = intval($_GET['id'] ?? 0);
$statement = $pdo->prepare("DELETE FROM 'todo' WHERE id = ?");
$ok = $statement->execute([$id]);
echo json_encode(["ok" => $ok]);
