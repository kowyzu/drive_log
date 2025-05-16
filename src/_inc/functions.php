<?php

function clean($input): string
{
  $input = trim($input);
  $input = strip_tags($input);

  return $input;
}
;

function validatePost($post): bool
{
  if (is_numeric($post['km']) && is_numeric($post['price'])) {
    return true;
  }
  return false;
}
;


function postToDB($post)
{
  global $db;

  try {
    $stmt = $db->prepare("INSERT INTO kms_drive (km, dateFrom, dateTo, carType, price, note, timestamp)
                          VALUES (:km, :dateFrom, :dateTo, :carType, :price, :note, :timestamp)");

    $stmt->execute([
      ':km' => $post['km'],
      ':dateFrom' => $post['dateFrom'],
      ':dateTo' => $post['dateTo'],
      ':carType' => $post['carType'],
      ':price' => $post['price'],
      ':note' => $post['note'],
      ':timestamp' => $post['timestamp']
    ]);
  } catch (PDOException $e) {
    echo "<div class='invalid mt-3'>Database error: " . $e->getMessage() . "</div>";
  }
}

//Get sum of kms
function sumKms()
{
  global $db;

  try {
    $query = $db->query('SELECT SUM(km) FROM kms_drive');

    $SumOfKms = $query->fetchAll(PDO::FETCH_ASSOC);


    return $SumOfKms[0]['SUM(km)'];
  } catch (PDOException $e) {
    echo "<div class='invalid mt-3'>Database error: " . $e->getMessage() . "</div>";
  }
}

//Format sum
function formatKms()
{

}
;