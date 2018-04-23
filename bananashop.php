<?php
?>
<!doctype html>
<body lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">
<?php include 'partials/head.php'; ?>
<?php include 'partials/navigation.php' ?>
<div class="container">
  <h1 class="text-center">Banana shop</h1>
  <div class="row">
    <div class="col-md-6">
      <label for="numberOfBananas">Number of bananas</label>
      <input v-model="numberOfBananas"
             type="number"
             class="form-control"
             v-on:keyup="clear"
      >
      <button v-on:click="calculatePrice"
              class="btn btn-block btn-warning">
        Calculate the price
      </button>

    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <table class="table table-bordered">
        <tr>
          <td>Price for one banana</td>
          <td>{{bananaPrice}}</td>
        </tr>
        <tr>
          <td>Number of bananas</td>
          <td>{{numberOfBananas}}</td>
        </tr>
        <tr>
          <td>Total Price before dicount</td>
          <td>{{fullPrice}}</td>
        </tr>
        <tr>
          <td>Discount</td>
          <td>{{totalDiscount}}</td>
        </tr>
        <tr>
          <td>Total Price</td>
          <td>{{priceAfterDiscount}}</td>
        </tr>
      </table>
    </div>
  </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script>
    var app = new Vue({
        el: '.container',
        data: {
            bananaPrice: 10,
            priceAfterDiscount: 0,
            numberOfBananas: 0,
            totalDiscount: 0,
            fullPrice: 0
        },
        methods: {
            calculateDiscount: function () {
                if (this.numberOfBananas > 10) {
                    this.fullPrice * 0.2;
                }
                if (this.numberOfBananas > 20) {
                    this.fullPrice * 0.4;
                }
            },

            calculatePrice: function () {
                if (isNumeric(this.numberOfBananas)) {
                    this.fullPrice = this.numberOfBananas * this.bananaPrice;
                    this.totalDiscount = this.calculateDiscount();
                    this.priceAfterDiscount = this.fullPrice - this.calculateDiscount();
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
</script>
</html>
