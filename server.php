<?php

//crud for students.

//start session
//create connection
//check connection
//create database 
//create tables
//insert data
//delete data
//update data

session_start();

$conn = mysqli_connect('localhost','jamila','@jBj0741988723','register');
/*
if(!$conn){
    die("failed to conect".mysqli_connect_error());
}
else{
    echo "connected succefully!";
}

//create a database

$sql = "CREATE DATABASE user";

if(mysqli_query($conn,$sql)){
    echo "database created succesfully";
}
else{
    die("failed to connect to database".mysqli_error($conn));
}


//create table 
$sql = "CREATE TABLE student(id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,name VARCHAR(20) NOT NULL,mobile INT(15) NOT NULL,course VARCHAR(50) NOT NULL)";

if(mysqli_query($conn,$sql)){
    echo "table created succesfully";
}
else{
    die("failed to connect table".mysqli_error($conn));
}

*/

//create variable

$name = '';
$course = '';
$mobile ='';
$id = '';
$update = false;


if(isset($_POST['save'])){
    $name= $_POST['name'];
    $mobile = $_POST['mobile'];
    $course = $_POST['course'];

    $sql = "INSERT INTO student (name,mobile,course)
    VALUES('$name','$mobile','$course')";
    
    mysqli_query($conn,$sql);
    $_SESSION['message'] = "student save succesfully";
    header('location:index.php');
}

//fetch data from db

 $result = mysqli_query($conn,"SELECT * FROM student"); 

 //delete student

 if(isset($_GET['delete'])){
     $id = $_GET['delete'];

     $sql = "DELETE FROM student where id='$id'";

     mysqli_query($conn,$sql);
     $_SESSION['message'] = "Student deleted successfully";
     header('location:index.php');
 }

 if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;

    $result = mysqli_query($conn,"SELECT * FROM student WHERE id='$id'");

    $rows = mysqli_fetch_array($result);

    $name = $rows['name'];
    $mobile = $rows['mobile'];
    $course = $rows['course'];

    if(!$result){
        die("failed to fetch data".mysqli_error($conn));
    }
    else{
        echo "fetched data successfully";
    }

 }
 //update user

 

 if(isset($_POST['update'])){
     $name = $_POST['name'];
     $course = $_POST['course'];
     $mobile = $_POST['mobile'];
     $id = $_POST['id'];

     $sql = "UPDATE student set name='$name', course='$course', mobile='$mobile' where id= '$id'";
     
     mysqli_query($conn,$sql);
     $_SESSION['message'] = "Student updated successfully";
     header('location:index.php');


 }
/*
 //register user
 $sql = "CREATE TABLE register (id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,email VARCHAR(30) NOT NULL,fname VARCHAR(20) NOT NULL,lname VARCHAR(20) NOT NULL,password int(100) NOT NULL )";
 
 if(mysqli_query($conn,$sql)){
     echo "table created succesfully";
 }
 else{
     die("failed to create table".mysqli_error($conn));
 }
*/
/*
$fname = '';
$lname ='';
$email = '';

$errors = array();

if(isset($_POST['register'])){

    //mysqli_real_escape_string() used to escape special characters as name=D'ore
    
    $fname =mysqli_real_escape_string($conn, $_POST['fname']);
    $lname =mysqli_real_escape_string($conn, $_POST['lname']);
    $email =mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 =mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 =mysqli_real_escape_string($conn, $_POST['password_2']);


    if($password_1 != $password_2){
        array_push($errors,"two passwords does not match");
    }
    //check if the same email exist int the database

    $check_email ="SELECT * FROM register where email='$email' LIMIT 1" ;
    $result = mysqli_query($conn,$check_email);
    $user = myqli_fetch_assc($result);

    //if user exits
    if($user){
        if($user['email'] == $email){
            array_push($errors,"email already exists");
        }
    }

    //regester user if error count is 0
    
    if(count($error)==0){
        $password =md5($password_1); //encrypt the password before saving


    

    $sql = "INSERT INTO register(name,lname,email,password) 
    VALUES('$fname','$lname','$email','$password')";

    mysqli_query($conn,$sql);
    $_SESSION['username'] = $username;
    $_SESSION['message'] = "You are now logged in.";
    header('location:index.php');
    }
/*
    if(myqli_query($conn,$sql)){
        echo "inserted succesfully";
    }
    else{
        die("failed to register".mysqli_error($conn));
    }
     */

//}










?>