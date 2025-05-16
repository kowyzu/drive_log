<?php
include_once './src/_partials/head.php';
?>



<body>
  <div class="container p-3 text-center">
    <?php include_once 'src/_partials/header.php' ?>
    <main>
      <?php include_once 'form.php' ?>
      <div class="sum-of-kms">
        <p>
          <?php
          echo (clean(sumKms()));
          ?>
        </p>
      </div>
    </main>
  </div>
</body>

<?php include_once 'src/_partials/footer.php' ?>