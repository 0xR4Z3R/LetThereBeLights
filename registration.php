<?php

session_start();
//header('location:login.php');

$conn = mysqli_connect('localhost','root','password','UserDB');

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

//mysqli_select_db($conn, 'UserDB');

$username = $_POST['user'];
$password = $_POST['password'];

 
function makesalt($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 

$salt = makesalt(16);


$saltedPW = $password . $salt;

$hashed = hash('sha512', $saltedPW);
//echo "hashed:  " . $hashed; 
//echo "username: " . $username . " ";
//echo "password: " . $password . " ";
//echo "\n";


$s = "SELECT * FROM users WHERE username='$username'";

//echo "s: " . $s . " \n";

$result = mysqli_query($conn, $s);


$num = mysqli_num_rows($result);


if($num == 1){

  //echo "Username Already Taken";

}else{

    $reg=" insert into  users(username , password, salt) values('$username','$hashed', '$salt')";

if( mysqli_query($conn,$reg) ){
    //echo "Registration Succesful";
}else{
    //echo "EROOOR!!\n" . mysqli_error($conn) . " " ;
}

}

?>

<head>
  <title> Message Page </title>

<!-- CSS -->

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">


<!-- JavaScript, JSON & AJAX -->

</head>
<body>
<div class="container">
     <h1> Welcome <?php echo $_SESSION['username']; ?> </h1>
   <div class="blink-box">
          <div class="col-md-12">
             <h2> Thank You</h2>
             <h3> your user has been created</h3> 
             <u><h4><a href="login.php">Home</a></h4></u>

          </div>
   </div>
<hr>
</div>
</body>

</html>

