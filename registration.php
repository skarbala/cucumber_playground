<?php
$email = "";
$password = "";
$password_repeat = "";
$name = "";
$surname = "";
$robot = false;
if ($_POST) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];
    $robot = isset($_POST['robot']) ? true : false;
}
function validate_password()
{
    global $password;
    global $password_repeat;
    
    if ($_POST) {
        if (strlen($password) < 5 || ($password != $password_repeat)) {
            return true;
        }
    }
    return false;
}
function validate_empty($input)
{
    if ($_POST) {
        return empty(trim($input));
    }
    return false;
}
function validate()
{
    global $robot;
    foreach ($_POST as $key) {
        if (empty(trim($key))) {
            return false;
        }
    }
    if (validate_password()) {
        return false;
    }
    if (!$robot) {
        return false;
    }
    return true;
}
function registration_result()
{
    if ($_POST) {
        if (validate()) {
            echo "<div class=\"alert alert-success\"><strong>Registracia uspesna!</strong></div>";
        } else {
            echo "<div class=\"alert alert-danger\"><strong>Registracia neuspesna!</strong> </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<?php include 'partials/head.php'; ?>
<link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">


<style>
 .navbar-default .navbar-nav > li > a, .navbar-default .navbar-brand {
    font-family: Montserrat, serif;
    color: #747474;
  }
  .navbar-default .navbar-nav > .active > a,
  .navbar-default .navbar-nav > .active > a:focus,
  .navbar-default .navbar-nav > .active > a:hover,
  .navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:hover,
  .navbar-default .navbar-nav > li > a:hover {
    color: #4c4c4c;
    background: none;
  }

    body {
        background-color: #f6f6f6;
    }
    div.result {
        margin-top: 20px;
    }
    h1 {
        font-family: Montserrat, serif;
        font-size: 50px;
        margin-bottom: 50px;
        color: #4c4c4c;
    }
    input.form-control {
        border: 1px solid;
        border-color: #dfdfdf #eeeeee #eeeeee #dfdfdf;
    }
    div.checkbox {
        color: #818181;
    }
</style>
<body>
<?php include 'partials/navigation.php' ?>
<div class="container">
    <h1 class="text-center">Registracia</h1>
    <div class="col-md-4 col-md-offset-4">
        <form action="" method="POST">
            <div class="form-group <? echo validate_empty($email) ? "has-error" : ""; ?>">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<? echo $email ?>">
            </div>
            <div class="form-group <? echo validate_empty($name) ? "has-error" : ""; ?>">
                <input type="text" class="form-control" name="name" placeholder="Meno" value="<? echo $name ?>">
            </div>
            <div class="form-group <? echo validate_empty($surname) ? "has-error" : ""; ?>">
                <input type="text" class="form-control" name="surname" placeholder="Priezvisko"
                       value="<? echo $surname ?>">
            </div>
            <div class="form-group <? echo validate_password() ? "has-error" : ""; ?>">
                <input type="password" class="form-control" name="password" placeholder="Heslo">
            </div>
            <div class="form-group <? echo validate_password() ? "has-error" : ""; ?>">
                <input type="password" class="form-control" name="password-repeat" placeholder="Heslo znovu">
            </div>
            <div class="checkbox form-group <? echo validate_empty($robot) ? "has-error" : ""; ?>">
                 <label><input id="checkbox" name="robot" type="checkbox" class="checkbox">Som robot</label>
            </div>
            <button type="submit" class="btn btn-success btn-lg btn-block">Registruj sa</button>
        </form>
        <div class="result text-center">
            <? registration_result() ?>
        </div>
    </div>
</div>
</body>

</html>