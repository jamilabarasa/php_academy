<?php include('server.php');       ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" >

    <?php  if(isset($_SESSION['message'])) :    ?>

      <p style="color:red;">  <?php echo $_SESSION['message']; ?> </p>
        <?php  unset($_SESSION['message']);        ?>

    <?php   endif ?>




    
   <?php if(mysqli_num_rows($result)>0) { ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Course</th>
            <th>Action</th>
        </tr>
        <?php  while($rows=mysqli_fetch_array($result))  {   ?>
        <tr>
            <td><?php echo $rows['name'] ;  ?></td>
            <td><?php echo $rows['mobile'] ;   ?></td>
            <td><?php echo $rows['course'];    ?></td>
            <td><a href="index.php?edit=<?php echo $rows['id']; ?>">Edit</a></td>
            <td><a href="server.php?delete=<?php echo $rows['id'] ;  ?>">Delete</a></td>

        </tr>
        <?php  } ?>

    </table>
    <?php }
    else{
        echo "no records found";
    }
    ?>
    

<h2 style="padding-top:30px;color:blue;">Register Student</h2>
<form action="server.php" method="post">
    <input type="hidden" name="id" id="id" value="<?php  echo $id;  ?>">
    <label for="name">Name</label> <br>
    <input type="text" name="name" id="name" value="<?php  echo $name; ?>" required> <br>
    <label for="mobile">contact</label> <br>
    <input type="number" name="mobile" id="mobile" value="<?php echo $mobile; ?>" required><br>
    <label for="course">Course</label><br>
    <input type="text" name="course" id="id" value="<?php  echo $course;   ?>" required><br>
    <?php  if($update==true):  ?>
    <button type="submit" name="update">Edit</button>
    <?php  else:   ?>
    <button type="submit" name="save">Register</button>
    <?php endif ?>
</form>
</div>
</body>
</html>