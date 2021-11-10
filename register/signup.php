<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="signup.php" method="post">
<?php include('errors.php') ?><br>
    <label for="username">Username</label><br>
    <input type="text" name="username" id="username" value="<?php echo $username; ?>" required><br>
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" value="<?php echo $email;  ?>" required><br>
    <label for="address">Address</label><br>
    <input type="text" name="address" id="address" value="<?php  echo $address;  ?>"><br>
    <label for="password_1">Password</label><br>
    <input type="password" name="password_1" id="password_1" required><br>
    <label for="password_2">Confirm password</label><br>
    <input type="password" name="password_2" id="password_2"required> <br>
    <button type="submit" name="signup">Register</button>
</form>
</body>
</html>