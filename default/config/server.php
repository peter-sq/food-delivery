<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$phone = "";
$errors = array(); 

// connect to the database
$Conn = mysqli_connect('localhost', 'root', '', 'u555060984_relishapp');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($Conn, $_POST['username']);
  $email = mysqli_real_escape_string($Conn, $_POST['email']);
  $phone = mysqli_real_escape_string($Conn, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($Conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($Conn, $_POST['password_2']);


  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE fullName='$username' OR emailAddress='$email' LIMIT 1";
  $result = mysqli_query($Conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['fullName'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
    if ($user['phone'] === $phone) {
      array_push($errors, "phone number  already exists");
    }
  }

  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (Fullname, emailAddress, phoneNumber, password) 
  			  VALUES('$username', '$email', '$phone', '$password')";
  	mysqli_query($Conn, $query);
  	$_SESSION['Fullname'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: home.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($Conn, $_POST['email']);
  $password = mysqli_real_escape_string($Conn, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE emailAddress='$email' AND password='$password'";
  	$results = mysqli_query($Conn, $query);
  	if (mysqli_num_rows($results) == 0) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: home.php');
  	}else {
  		array_push($errors, "Wrong email/password ");
  	}
  }
}
?>