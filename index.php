<?php

include_once './src/_partials/header.php';


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
  <div class="container p-5 text-center">
    <div class="row justify-content-center">
      <h1>Log your drive <i class="fa-solid fa-heart ps-3" style="color: #a294f9;"></i></h1>
    </div>
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <form id="log-form" class="drive-log-form" action="" method="post">
          <div class="input-group drive-log-form-input-group">
            <span class="input-group-text drive-log-form-span" id="addon-wrapping">km</span>
            <input type="text" class="form-control drive-log-form-control" name="kmsDriven"
              placeholder="Distance driven " aria-label="Kms drived" aria-describedby="addon-wrapping">
          </div>
          <button type="submit" class="btn btn-primary mt-5" name="submitted" value="kms driven submitted">Save</button>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include_once 'src/_partials/footer.php' ?>