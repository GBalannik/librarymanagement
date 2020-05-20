<?php
	include "connection.php";
	include "navbar.php";
	$id=$_GET['id'];
	$iduser=$_SESSION['login_user'];
	mysqli_query($db, "UPDATE libraryschema.materials SET Status='Borrowed' WHERE MaterialID=$id;");
	$res=mysqli_query($db, "SELECT iduser FROM libraryschema.user WHERE EmailAddress='$iduser';");
	$q = mysqli_fetch_row($res);
	$userID= $q[0];
	mysqli_query($db, "INSERT INTO libraryschema.materialLoan(iduser, MaterialID, StartDate, EndDate, ReturnDate) VALUES($userID, $id, curdate(), date_add(curdate(), INTERVAL 14 Day), '0000-00-00');");
	//mysqli_query($db, "INSERT INTO ")
	?>
	
	
        <script type="text/javascript">
           window.location="books.php"
        </script>