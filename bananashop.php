<?php
?>
<!doctype html>
<body lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">
<?php include 'partials/head.php'; ?>

<body>
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
          <td>Discount</td>
          <td>{{discount}}</td>
        </tr>
        <tr>
          <td>Total Price</td>
          <td>{{totalPrice}}</td>
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
            totalPrice: 0,
            numberOfBananas: 0,
            discount: 0
        },
        methods: {
            calculateDiscount: function () {
                if (this.numberOfBananas > 10) {
                    return 10;
                }
                if (this.numberOfBananas > 20) {
                    return 20;
                }
                if (this.numberOfBananas > 30) {
                    return 30;
                }
                return 0;
            },
            calculatePrice: function () {
                this.discount = this.calculateDiscount();
                this.totalPrice = (this.numberOfBananas * this.bananaPrice) * ((100 - this.discount) / 100);
            },
            clear: function () {
                this.totalPrice = 0;
                this.discount = 0;
            }

        }
    })
</script>
</html>
