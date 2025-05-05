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

  <header class="text-center">
    <div class="row justify-content-center">
      <div class="col mt-lg-5"><img class="img-fluid" width=400px src="src/imgs/car_summer.png"
          alt="Red car driving into a warm sunset on an open road, viewed from behind."></div>
    </div>
  </header>
  <div class="container p-5 text-center">
    <div class="row justify-content-center">
      <h1>Log your drive <i class="fa-solid fa-heart ps-3"></i></h1>
    </div>
    <div class=" row justify-content-center mt-5">
      <div class="col-lg-6">
        <form id="log-form" class="drive-log-form" action="" method="post">
          <div class="input-group input-group-lg drive-log-form-input-group">
            <input type="text" class="form-control drive-log-form-control" name="kmsDriven" placeholder="I drove"
              aria-label="Kms drived" aria-describedby="addon-wrapping">
            <span class="input-group-text drive-log-form-span" id="addon-wrapping">km!</span>
          </div>
          <button type="submit" class="btn btn-lg btn-primary mt-5" name="submitted"
            value="kms driven submitted">Save</button>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <ul class='list-group drive-log-list'><?php

        foreach ($data as $log) {
          echo "<li class='list-group-item'> $log->km</li>";
        }

        ?></ul>
      </div>
    </div>
  </div>
</body>

<?php include_once 'src/_partials/footer.php' ?>