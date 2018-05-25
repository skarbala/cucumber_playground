<?php
?>
<!doctype html>
<html lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">
<?php include 'partials/head.php'; ?>
<link href="https://fonts.googleapis.com/css?family=Secular+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
<body>
<?php include 'partials/navigation.php' ?>
<style>
  .navbar-default .navbar-nav > li > a, .navbar-default .navbar-brand {
    font-family: 'Secular One', sans-serif;
    color: #c07b1a;
  }

  .navbar-default .navbar-nav > .active > a,
  .navbar-default .navbar-nav > .active > a:focus,
  .navbar-default .navbar-nav > .active > a:hover,
  .navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:hover,
  .navbar-default .navbar-nav > li > a:hover {
    color: #ffc832;
    background: none;
  }

  body::after {
    content: "";
    background: url("assets/img/banana_background.jpg");
    opacity: 0.2;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    position: absolute;
    z-index: -1;
  }

  h1 {
    font-family: 'Secular One', sans-serif;
    font-size: 70px;
    font-weight: 600;
    color: #ffc832;
    text-shadow: 2px 2px #ec971f;
  }

  table tr:last-child {
    font-weight: 700;
    font-size: 25px;
  }

  table {
    padding: 0;
    background-color: white;
    font-family: 'Kalam', Arial, serif;
    font-size: 20px;

  }

  table td {
    color: #444444;
  }

  button.btn, input.form-control {
    border-radius: 0;
  }

  button.btn {
    font-family: 'Kalam', Arial, serif;
    margin-bottom: 20px;
    font-size: 20px;
  }
</style>
<h1 class="text-center">Banana shop</h1>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 main-content">
      <!-- <label for="numberOfBananas">Number of bananas</label> -->
      <input v-model="numberOfBananas"
             type="number"
             class="form-control"
             v-on:keyup="clear"
             placeholder="number of bananas"
      >
      <button v-on:click="calculatePrice"
              class="btn btn-block btn-warning">Give me the price!
      </button>
      <table class="table table-hover">
        <tr>
          <td>Price for one banana</td>
          <td>{{bananaPrice}} €</td>
        </tr>
        <tr>
          <td>Number of bananas</td>
          <td>{{numberOfBananas}}</td>
        </tr>
        <tr>
          <td>Price before discount</td>
          <td>{{fullPrice}} €</td>
        </tr>
        <tr>
          <td>Discount</td>
          <td>{{totalDiscount}} €</td>
        </tr>
        <tr class="warning">
          <td>Total Price</td>
          <td>{{priceAfterDiscount}} €</td>
        </tr>
      </table>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script>
    var app = new Vue({
        el: '.container',
        data: {
            bananaPrice: 1.5,
            priceAfterDiscount: 0,
            numberOfBananas: 0,
            totalDiscount: 0,
            fullPrice: 0,
            discountRate: 0
        },
        methods: {
            calculatePrice: function () {
                if (isNumeric(this.numberOfBananas)) {
                    this.fullPrice = this.numberOfBananas * this.bananaPrice;
                    this.totalDiscount = (this.fullPrice * (calculateDiscountRate(this.numberOfBananas))).toFixed(2);
                    this.priceAfterDiscount = this.fullPrice - this.totalDiscount;
                }
            },

            clear: function () {
                this.priceAfterDiscount = 0;
                this.fullPrice = 0;
                this.totalDiscount = 0;
            }

        }
    });

    function isNumeric(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    function calculateDiscountRate(numberOfBananas) {
        switch (true) {
            case (numberOfBananas >= 10 && numberOfBananas < 20):
                return 0.1;
            case (numberOfBananas >= 20):
                return 0.2;
            default:
                return 0;
        }
    }

</script>
</html>
