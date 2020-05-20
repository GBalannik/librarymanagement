<?php
	include "navbar.php";
	include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
		<title>Books</title>
		<style type="text/css">
			.srch
			{
				padding-left: 20px;
			}
		</style>
</head>
<body>
	
	<!-- _____________Search Bar__________ -->
	
	<div class="srch">
		<form class="navbar-form" method="post" name="BookSearch">
			<div>
				<input class="form-control" type="text" name="searchTitle" placeholder="Material Title" style="width: 300px;">
				<input class="form-control" type="text" name="searchAuthor" placeholder="Material Author" style="width: 300px;">
				<input class="form-control" type="text" name="searchType" placeholder="Material Type" style="width: 300px;">
				<button type="submit" name="submit" class="btn btn-default" style="background-color: #6db6b9e6; ">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
		</form>
	</div>
	
	
	
	<h2>List of Books</h2>
	
	<?php
	
		if(isset($_POST['submit']))
		{
			if(!isset($_POST['searchYear'])){
				$year=0;
			}
			else{
				$year=$_POST['searchYear'];
			}
			
			$q=mysqli_query($db, "SELECT * FROM libraryschema.materials WHERE Title LIKE '%$_POST[searchTitle]%' AND Author LIKE '%$_POST[searchAuthor]%' AND MaterialType LIKE '%$_POST[searchType]%';");
			if(mysqli_num_rows($q)==0)
			{
				echo "No Relevant Materials Found";
			}
			else
			{
				
				echo "<table class='table table-bordered table-hover'>";
				echo "<tr style='background-color: #6db6b9e6;'>";
		
				echo "<th>"; echo "Title"; echo "</th>";
				echo "<th>"; echo "Author"; echo "</th>";
				echo "<th>"; echo "Year Published"; echo "</th>";
				echo "<th>"; echo "Material ID"; echo "</th>";
				echo "<th>"; echo "Material Type"; echo "</th>";
				echo "<th>"; echo "Status"; echo "</th>";
				
				if(isset($_SESSION['login_user'])){
					echo "<th>"; echo "Actions"; echo "</th>";
				}
				
				echo "</tr>";
		
				while($row=mysqli_fetch_assoc($q))
				{
					echo "<tr>";
					echo "<td>"; echo $row['Title']; echo "</td>";
					echo "<td>"; echo $row['Author']; echo "</td>";
					echo "<td>"; echo $row['YearPublished']; echo "</td>";
					echo "<td>"; echo $row['MaterialID']; echo "</td>";
					echo "<td>"; echo $row['MaterialType']; echo "</td>";
					echo "<td>"; echo $row['Status']; echo "</td>";
					
					if(isset($_SESSION['login_user'])){
						
						if($row['Status'] == 'Available')
						{
							echo "<td><input class='btn btn-default' type='submit' name='Loan' value='Loan' style='color: black; width: 70px; height: 30px'></td>";
						}
						else
						{
							echo "<th>"; echo "Unavailable"; echo "</th>";
						}
						
					}

					echo "</tr>";
				}
			echo "</table>";
			
			}
			
		}
		
		/* If Button Has Not Been Pressed */
		else
		{
			$res=mysqli_query($db,"SELECT * FROM libraryschema.materials;");
			echo "<table class='table table-bordered table-hover'>";
			echo "<tr style='background-color: #6db6b9e6;'>";
		
			echo "<th>"; echo "Title"; echo "</th>";
			echo "<th>"; echo "Author"; echo "</th>";
			echo "<th>"; echo "Year Published"; echo "</th>";
			echo "<th>"; echo "Material ID"; echo "</th>";
			echo "<th>"; echo "Material Type"; echo "</th>";
			echo "<th>"; echo "Status"; echo "</th>";
			
			if(isset($_SESSION['login_user'])){
				echo "<th>"; echo "Actions"; echo "</th>";
			}
			
			echo "</tr>";
		
			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['Title']; echo "</td>";
				echo "<td>"; echo $row['Author']; echo "</td>";
				echo "<td>"; echo $row['YearPublished']; echo "</td>";
				echo "<td>"; echo $row['MaterialID']; echo "</td>";
				echo "<td>"; echo $row['MaterialType']; echo "</td>";
				echo "<td>"; echo $row['Status']; echo "</td>";
				
				if(isset($_SESSION['login_user'])){
						
						if($row['Status'] == 'Available')
						{
							echo "<td><a href=\"borrow.php?id=" . $row['MaterialID'] . "\">Borrow</a></td>";
						}
						else
						{
							echo "<th>"; echo "Unavailable"; echo "</th>";
						}
						
					}
				
				echo "</tr>";
			}
			echo "</table>";
		}
		
	?>
</body>
</html>