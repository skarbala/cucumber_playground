<?php
?>
<!doctype html>
<html lang="en">
<?php include 'partials/head.php'; ?>
<style>
  body {
    /*background: url("assets/img/JOKER_BACKGROUND.jpg") no-repeat center center fixed;*/
    background-size: cover;
  }
  #cucumber{
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20%;
    margin-top: -10%; /* Half the height */
    margin-left: -220px;
  }

</style>
<body>
<?php include 'partials/navigation.php' ?>
<img src="assets/img/cucumber.png" alt="" id="cucumber">
</body>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script>
    $(document).ready(function () {
        var cucumber = $("#cucumber");
        cucumber.draggable();
    });
</script>
</html>
