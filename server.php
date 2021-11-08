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

$conn = mysqli_connect('localhost','jamila','@jBj0741988723','user');
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









?>