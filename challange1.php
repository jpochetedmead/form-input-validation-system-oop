<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/form.js"></script>
  <script src="js/form-main.js"></script>
<style>
form .error{
    color: red;
}
</style>
</head>
<body>

<div class="container">
    <div class="row">
    <div class="col-sm-8">
        <h2>Sign up form</h2>
        <form action="submit.php" method="POST" id="signup-from">

            <div class="form-group">
            <label for="email">Username:</label>
            <input type="text" class="form-control required alphanum cleanup" id="username" placeholder="Username" name="username" minlength="6" maxlength="12" value="">
            </div>
            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control required cleanup" id="email" placeholder="Email" name="email" value="">
            </div>
            <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control required noSpace pwcheck cleanup" id="password" placeholder="Password" name="password" minlength="6" value="">
            </div>
            <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" class="form-control required" id="confirm_password" placeholder="confirm password" name="confirm_password" equalto="#password" value="">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>
</div>
<script>

$(document).ready(function() {
   $("#signup-from").validate();
});
</script>
</body>
</html>
