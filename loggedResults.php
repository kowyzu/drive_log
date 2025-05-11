<?php
include_once './src/_partials/head.php';



print_r($post);
?>

<div class="row">
  <div class="col">
    <ul class='list-group drive-log-list'><?php

    foreach ($data as $log) {
      echo "<li class='list-group-item drive-log-list-group-item'> $log->km</li>";
    }

    ?></ul>
  </div>
</div>