<?php
?>
<!doctype html>
<html lang="en">
<?php include 'partials/head.php'; ?>

<body>
<?php include 'partials/navigation.php' ?>
</body>
<div class="container">
  <h1 class="text-center">Banana shop</h1>
  <div class="row">
    <div class="col-md-6">
      <label for="numberOfBananas">Number of bananas</label>
      <input type="number" class="form-control" id="numberOfBananas">
      <button class="btn btn-block btn-warning">Calculate the price</button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <table class="table table-bordered">
        <tr>
          <td>Price for one banana</td>
        </tr>
        <tr>
          <td>Number of bananas</td>
        </tr>
        <tr>
          <td>Discount</td>
        </tr>
        <tr>
          <td>Total Price</td>
        </tr>
        </table>
    </div>
  </div>
</div>
<script>
</script>
</html>
