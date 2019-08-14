<?php

session_start();

$conn = mysqli_connect('localhost','root','password','UserDB');

//if(!$conn){
//	die("Connection failed: " . mysqli_connect_error());
//}
//
//if($conn){
//	echo "Connected Succesfully \n";
//}

//mysqli_select_db($conn, 'UserDB');

$username = $_POST['user'];
$password = $_POST['password'];

$q = "SELECT * FROM users WHERE username='$username'";

$result = mysqli_query($conn, $q);

  if($result-> num_rows > 0){

        while($row = $result-> fetch_assoc()){
                   
              $salt =  $row["salt"];
         }

   }
$saltedPW = $password . $salt;

$hashed  = hash('sha512', $saltedPW);

//echo "username: " . $username . " ";
//echo "password: " . $password . " ";
//echo "\n";

$s = "SELECT * FROM users WHERE username='$username' && password='$hashed'";

//echo "s: " . $s . " \n";

$result = mysqli_query($conn, $s);


$num = mysqli_num_rows($result);


if($num == 1){

  $_SESSION['username'] = $username;

 if( $username === "Administrator"){
    header('location:admin.php');
 }else{
    header('location:home.php');
   }

}else{
  header('location:login.php');
}

?>
