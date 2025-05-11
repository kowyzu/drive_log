<?php
include_once './src/_partials/head.php';
?>

<form id="log-form" class="drive-log-form" action="" method="post">
  <div class=" row justify-content-center mt-5">
    <div class="col-xl-6 col-lg-8 col-sm-12">
      <div class="input-group input-group-lg drive-log-form-input-group">
        <input type="text" class="form-control drive-log-form-control" name="kmsDriven" placeholder="I drove"
          aria-label="Kms drived" aria-describedby="addon-wrapping">
        <span class="input-group-text drive-log-form-span" id="addon-wrapping">km!</span>
      </div>
    </div>
  </div>
  <div class=" row justify-content-center mt-5">
    <div class="col-xl-3 col-lg-4 col-sm-6">
      <div class="input-group input-group-lg drive-log-form-input-group">
        <span class="input-group-text drive-log-form-span" id="addon-wrapping">From</span>
        <input type="date" class="form-control drive-log-form-control" name="dateFrom" placeholder="From"
          aria-label="Date from" aria-describedby="addon-wrapping">
      </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-sm-6 mt-3 mt-sm-0">
      <div class="input-group input-group-lg drive-log-form-input-group">
        <span class="input-group-text drive-log-form-span" id="addon-wrapping">To</span>
        <input type="date" class="form-control drive-log-form-control" name="dateTo" placeholder="To"
          aria-label="Date from" aria-describedby="addon-wrapping">
      </div>
    </div>
  </div>
  <div class="row justify-content-center mt-5">
    <div class="col-xl-6 col-lg-8 col-sm-12">
      <select class="form-select form-select-lg drive-log-form-select" name="carType"
        aria-label="Default select example">
        <option selected>With this car...</option>
        <option class="car-type-option" value="Audi A1">Audi A1</option>
        <option value="Toyota Yaris">Toyota Yaris</option>
        <option value="Toyota Corolla">Toyota Corolla</option>
        <option value="Other">Other</option>
      </select>
    </div>
  </div>
  <div class=" row justify-content-center mt-5">
    <div class="col-xl-6 col-lg-8 col-sm-12">
      <div class="input-group input-group-lg drive-log-form-input-group">
        <input type="text" class="form-control drive-log-form-control" name="price" placeholder="And it cost me"
          aria-label="price" aria-describedby="addon-wrapping">
        <span class="input-group-text drive-log-form-span" id="addon-wrapping">CZK</span>
      </div>
    </div>
  </div>
  <div class=" row justify-content-center mt-5">
    <div class="col-xl-6 col-lg-8 col-sm-12">
      <div class="input-group input-group-lg drive-log-form-input-group">
        <input type="text" class="form-control drive-log-form-control" name="note" placeholder="My note"
          aria-label="price" aria-describedby="addon-wrapping">
        <span class="input-group-text drive-log-form-span note-span" id="addon-wrapping"><i
            class="fa-solid fa-note-sticky"></i></span>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-8 col-sm-12">
      <button type="submit" class="btn btn-lg btn-primary mt-5" name="submitted"
        value="kms driven submitted">Save</button>
    </div>
  </div>
</form>

<?php
if ($_POST !== [] && $_POST['kmsDriven'] !== '' && $_POST['dateFrom'] !== '' && $_POST['dateFrom'] !== '' && $_POST['carType'] !== 'With this car...' && $_POST['price'] !== '') {

  if ($_POST['dateTo'] === '') {
    $dateTo = null;
  } else {
    $dateTo = clean($_POST['dateTo']);
  }

  $post = [
    'km' => clean($_POST['kmsDriven']),
    'dateFrom' => clean($_POST['dateFrom']),
    'dateTo' => $dateTo,
    'carType' => clean($_POST['carType']),
    'price' => clean($_POST['price']),
    'note' => clean($_POST['note']),
    'timestamp' => date('Y-m-d H:i:s')
  ];

  $dateTo = $post['dateTo'];

  if (validatePost($post)) {
    echo "<div class='valid mt-3'>
      Looks good! $dateTo
      </div>";


    postToDB($post);

  } else {
    echo "<div  class='invalid mt-3'>
    Please make sure that kilometers and price contain only numbers.
    </div>";
  }

} else
  echo "<div  class='invalid mt-3'>
  Fill all required fields.
  </div>";
?>