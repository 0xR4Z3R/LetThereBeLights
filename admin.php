<?php
  session_start();
  if(!isset($_SESSION['username'])){
     header('location:login.php');
}

$conn = mysqli_connect('localhost','root','password','UserDB');

?>

<html>
<head>
  <title>Admin Page</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="container">
  <h1> Welcome <?php echo $_SESSION['username']; ?> </h1>
  <h2> This is the Admin page </h2> 
  <table>
    <tr>
      <th>UserID</th>
      <th>Username</th>
      <th>Password</th>
      <th>Salt</th>
    </tr>
    
  <?php
       $sql = "SELECT * FROM users ORDER BY username ASC";  
       $result = mysqli_query($conn,$sql);
      
        if($result-> num_rows > 0){
         
        while($row = $result-> fetch_assoc()){
  
        echo "<tr><td>". $row["userid"]. "</td><td>" . $row["username"] . "</td><td>" . "*********" ." </td><td>" . $row["salt"] . "</td></tr>";        
	   
          }
        
         echo "</table>";
  
	}
	else{
	   echo "0 result";
	}

	$conn-> close();
     ?>
   
  </table>
  <hr>
  <h4><a href="logout.php">LOGOUT</a></h4>
  <hr>
  <br>
</div>
</body>


</html>
