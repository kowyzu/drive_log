<?php
include_once './src/_partials/head.php';
?>



<body>
  <div class="container p-3 text-center">
    <?php include_once 'src/_partials/header.php' ?>
    <main>
      <?php include_once 'form.php' ?>
      <div class="sum-of-kms mt-5">
        <h2>You have already drove:</h2>
        <p>
          <?php
          echo (clean(sumKms()));
          ?>
          km
        </p>
      </div>
      <button class="btn btn-primary">Display all logs <?php echo clean('44.5'); ?></button>
    </main>
  </div>
</body>

<?php include_once 'src/_partials/footer.php' ?>