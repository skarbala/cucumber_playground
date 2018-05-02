<!DOCTYPE html>
<html xmlns:v-on="http://www.w3.org/1999/xhtml">
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet"><?php include 'partials/head.php'; ?>
<style>
  .navbar-default .navbar-nav > li > a, .navbar-default .navbar-brand {
    font-family: Lobster two, Arial, serif;
    color: whitesmoke;
  }

  .navbar-default .navbar-nav > .active > a,
  .navbar-default .navbar-nav > .active > a:focus,
  .navbar-default .navbar-nav > .active > a:hover,
  .navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:hover,
  .navbar-default .navbar-nav > li > a:hover {
    color: #cecece;
    background: none;
  }

  h1 {
    font-family: Lobster two, Arial, serif;
    font-size: 50px;
  }

  body {
    background-image: url("assets/img/pink.png");
    color: whitesmoke;
  }

  button {
    font-size: 24px;
    width: 150px;
    height: 150px;
    text-align: center;
    border: solid 5px whitesmoke;
    border-radius: 50%;
    user-focus: none;
    margin: 100px auto 80px auto;

    display: block;
    background-color: transparent;
    font-weight: 600;
    -webkit-box-shadow: 0 8px 0 #c5376d, 0 15px 20px rgba(0, 0, 0, .35);
    -moz-box-shadow: 0 8px 0 #c5376d, 0 15px 20px rgba(0, 0, 0, .35);
    box-shadow: 0 8px 0 #c5376d, 0 15px 20px rgba(0, 0, 0, .35);
    -webkit-transition: -webkit-box-shadow .1s ease-in-out;
    -moz-transition: -moz-box-shadow .1s ease-in-out;
    -o-transition: -o-box-shadow .1s ease-in-out;
    transition: box-shadow .1s ease-in-out;

  }

  button:focus {
    outline: none;
  }

  button:active {
    -webkit-box-shadow: 0 0 0 #c5376d, 0 0 0 rgba(0, 0, 0, .3);
    -moz-box-shadow: 0 0 0 #c5376d, 0 0 0 rgba(0, 0, 0, .3);
    box-shadow: 0 0 0 #c5376d, 0 0 0 rgba(0, 0, 0, .3);
    -webkit-transform: translate(0, 4px);
    -moz-transform: translate(0, 4px);
    -o-transform: translate(0, 4px);
    transform: translate(0, 4px);
  }

</style>
<body>
<?php include 'partials/navigation.php' ?>

<div class="container">
  <h1 class="text-center">Click me baby one more time</h1>
  <div class="row">
  </div>
  <button v-on:click="addClick">Click me !</button>
  <div class="row text-center">
    <h1 style="font-size: 60px" id="clicks">{{counter}}</h1>
    <div class="description">
      <p v-if="counter==1">klik</p>
      <p v-else-if="counter>=2 && counter<=4">kliky</p>
      <p v-else>klikov</p>
    </div>
  </div>
</div>
</body>

<script>
    new Vue({
        el: '.container',
        data: {
            counter: 0
        },
        methods: {
            addClick: function () {
                this.counter += 1;
            }
        }
    });

</script>

</html>