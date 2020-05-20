<?php
	include "navbar.php";
	include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>User Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>

<section>
  <div class="log_img">
   <br>
    <div class="box1">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Login Form</h1><br>
      <form  name="login" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="email" name="EmailAddress" placeholder="Email Address" required=""> <br>
          <input class="form-control" type="password" name="Password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </div>
      
      <p style="color: white; padding-left: 15px;">
        <br><br>
       	Need an account?<a style="color: white;" href="registration.php"> Sign Up</a>
      </p>
    </form>
    </div>
  </div>
</section>

	<?php
	
		if(isset($_POST['submit']))
		{
			$count=0;
			$res=mysqli_query($db, "SELECT * FROM libraryschema.user WHERE EmailAddress='$_POST[EmailAddress]' && password='$_POST[Password]';");
			$count=mysqli_num_rows($res);
			
			if($count==0)
			{
				?>
					<!--
					<script type="text/javascript">
          alert("Account Not Found");
          </script>
          -->
          
          <div class="alert alert-danger" role="alert" style="width: 700px; margin-left: 675px;">
  					<strong>Email or Password Incorrect!</strong> Change a few things up and try submitting again.
					</div>
          
				<?php
				
				
			}
			else
      {
        $_SESSION['login_user'] = $_POST['EmailAddress']; 

        ?>
          <script type="text/javascript">
            window.location="books.php"
          </script>
        <?php
      }
		}
		
	?>

</body>
</html>