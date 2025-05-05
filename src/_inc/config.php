<?php

// global functions
require_once 'src/_inc/functions.php';

// connection to DB
$host = 'db';
$db_name = 'drive_log';
$user = 'user';
$password = 'userpassword';

$db = new PDO(sprintf('mysql:host=%s;dbname=%s', $host, $db_name), $user, $password);

// test DB
try {
  $query = $db->query('SELECT * FROM kms_drive');
} catch (PDOException $e) {
  echo '<pre>';
  print_r($e);
  echo '</pre>';
}

$data = $query->fetchAll(PDO::FETCH_OBJ);

echo '<pre>';
print_r($data);
echo '</pre>';