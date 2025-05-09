<?php
include_once './src/_partials/head.php';


if (!empty($_POST) && $_POST['kmsDriven'] !== '') {

  $file = 'src/loggers/storage';
  make_file($file);

  $data = [];

  $post = (object) [
    'text' => $_POST['kmsDriven'],
    'time' => time()
  ];

  array_push($data, $post);


  file_put_contents($file, json_encode($data));
}
?>



<body>
  <div class="container p-3 text-center">
    <?php include_once 'src/_partials/header.php' ?>
    <main>
      <?php include_once 'src/_partials/form.php' ?>
      <?php include_once 'src/_partials/loggedResults.php' ?>
    </main>
  </div>
</body>

<?php include_once 'src/_partials/footer.php' ?>