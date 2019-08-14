<html>
<head>
  <title>LetThereBeLights</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<h1>Let There Be Lights</h1>
<div class="container">
    <div class="login-box">
	<div class="row">
	  <div class="col-md-6 login-left">
	  	<h2> Login Here</h2>
		<form action="validation.php" method="POST">
		    <div class-"form-group">
			<label>Username</label>
			<input type="text" name="user" class="form-control" required>
		    </div>
		    <hr>
		    <div class-"form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
		   <hr>
		   <button type="submit" name="submit" class="btn btn-primary"> Login here</button>
		</form>
		
	  </div>
	  <div class="col-md-6 login-right">
                <h2> Register Here</h2>
                <form action="registration.php" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" class="form-control" required>
                    </div>
		    <hr>
                    <div class-"form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
		   <hr>
                   <button type="submit" name="name" class="btn btn-primary"> Register here </button>
                </form>
          </div>	
	</div>
  </div>
</div>


</body>


</html>
