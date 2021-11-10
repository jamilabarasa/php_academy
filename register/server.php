<?php

//start session
session_start();

//display errors
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


//initialize variables
$username = "";
$email = "";
$address = "";
$errors = array();

//create db connection
$conn = mysqli_connect('localhost','jamila','@jBj0741988723','register');

//check if isset signin and register the user after checking for any available errors

if(isset($_POST['signup'])){
    //escape special characters
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);

    //check if passwords match
    if($password_1 != $password_2){

        array_push($errors,"Two passwords does not match");
    }

    //check if user with the same email exists in the database
    $check_user = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn,$check_user);
    //fetch results of the particular row
    $user = mysqli_fetch_assoc($result);
    
    if($user){
        if($user['email'] === $email){
            array_push($errors,"User with this email exists,please use a diffrent email");
        }
    }

    

    //if no errors save the user
    if(count($errors) == 0){
        //encrypt password
        $password = md5($password_1);
        

        //query db to save user
        $sql = "INSERT INTO user (username,email,address,password) VALUES 
        ('$username','$email','$address','$password')";

        mysqli_query($conn,$sql);
        $_SESSION['success']= "user created successfull please use your credentials to log in";
        header('location:signin.php');      
    } 

    

}

//check if isset signin  log in the user.

if(isset($_POST['signin'])){
    //escape special characters
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if(count($errors) == 0){
        $password = md5($password);
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn,$sql);
   

    if(mysqli_num_rows($result) == 1){
        $_SESSION['user'] = $username;
        $_SESSION['success'] = "Logged in successfully";
        header('location:../index.php');
    }
    else{
        array_push($errors,"wrong username or password combination");
    }

}
}
























?>