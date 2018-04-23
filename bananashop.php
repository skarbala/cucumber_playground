<?php
?>
<!doctype html>
<html lang="en">
<?php include 'partials/head.php'; ?>
<link href="https://fonts.googleapis.com/css?family=Secular+One" rel="stylesheet">
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
    background: url("../assets/img/banana_background.jpg");
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
        color: #ffc832 ;
        text-shadow: 2px 2px #ec971f;
    }
    table tr:last-child{
      font-weight: 700;
      font-size: 17px;
    }
    table{
      padding: 0px;
      background-color: white;
    }
    button.btn, input.form-control{
      border-radius: 0px;
    }
    button.btn{
      margin-bottom: 20px;
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
              class="btn btn-block btn-warning">Give me the price!</button>
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
            numberOfBananas:0,
            totalDiscount: 0,
            fullPrice: 0,
            discountRate:0,
        },
        methods: {
            calculatePrice: function () {
                if (isNumeric(this.numberOfBananas)) {
                    this.fullPrice = this.numberOfBananas * this.bananaPrice;
                    this.priceAfterDiscount =
                     Math.round(this.fullPrice * (1-calculateDiscountRate(this.numberOfBananas)),2);
                    this.totalDiscount = this.fullPrice - this.priceAfterDiscount;
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
    function calculateDiscountRate(numberOfBananas){
         switch(true) {
    case (numberOfBananas>10 && numberOfBananas <20):
        return 0.1;
    case (numberOfBananas>=20):
      return 0.2;
       break;
    default:
     return 0;
     }
}

</script>
</html>
