<?php
	include "navbar.php";
	include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>User Registration</title>
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
  <div class="reg_img">

    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">  Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Registration Form</h1>
      <form name="Registration" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="FirstName" placeholder="First Name" required=""> <br>
          <input class="form-control" type="text" name="LastName" placeholder="Last Name" required=""> <br>
          <input class="form-control" type="email" name="EmailAddress" placeholder="Email Address" required=""> <br>
          <input class="form-control" type="password" name="Password" placeholder="Password" required=""> <br>
          <input class="form-control" type="number" name="iduser" placeholder="ID Number" required=""><br>
          <input class="form-control" type="text" name="Gender" placeholder="Gender" required=""><br>
          <input class="form-control" type="date" name="DateofBirth" required=""><br>

          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>


    <?php

      if(isset($_POST['submit']))
      { 
				$count=0;
        $sql="SELECT EmailAddress from libraryschema.user";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['EmailAddress']==$_POST['EmailAddress'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
        	$edate=strtotime($_POST['DateofBirth']); 
					$edate=date("Y-m-d",$edate);
          mysqli_query($db,"INSERT INTO libraryschema.user VALUES('$_POST[FirstName]', '$_POST[LastName]', '$_POST[EmailAddress]', '$_POST[Password]', $_POST[iduser] , '$_POST[Gender]', '$edate');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The Email already exist.");
            </script>
          <?php

        }
      }

    ?>
</body>