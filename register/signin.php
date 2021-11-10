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
    <?php if(isset($_SESSION['success'])) :?>

    <?php echo $_SESSION['success'];  ?>
    <?php unset($_SESSION['success']);?>

    <?php endif ?>

    <form action="signin.php" method="post">
        <?php include('errors.php') ?><br>
        <label for="username">Usename</label><br>
        <input type="text" name="username" id="username" value="<?php echo $username;   ?>" required><br>
        <label for="password">password</label><br>
        <input type="password" name="password" id="password" required><br>
        <button type="submit" name="signin">Signin</button>

    </form>
</body>
</html>