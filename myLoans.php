<?php
	include "navbar.php";
	include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
		<title>MyLoans</title>
</head>
<body>
	
	
	
	<h2>List of Books</h2>
	
	<?php
		$usr="" . $_SESSION['login_user'];
		$res=mysqli_query($db,"SELECT LoanID, Title, Author, YearPublished, StartDate, EndDate, ReturnDate FROM libraryschema.materialLoan JOIN libraryschema.user ON user.EmailAddress='$usr' JOIN libraryschema.materials on materials.MaterialID = materialLoan.MaterialID;");
		echo "<table class='table table-bordered table-hover'>";
		echo "<tr style='background-color: #6db6b9e6;'>";
		
		echo "<th>"; echo "Loan ID"; echo "</th>";
		echo "<th>"; echo "Title"; echo "</th>";
		echo "<th>"; echo "Author"; echo "</th>";
		echo "<th>"; echo "Year Published"; echo "</th>";
		echo "<th>"; echo "Borrow Date"; echo "</th>";
		echo "<th>"; echo "Due Date"; echo "</th>";
		echo "<th>"; echo "Returned Date"; echo "</th>";
		echo "</tr>";
		
		while($row=mysqli_fetch_assoc($res))
		{
			echo "<tr>";
			echo "<td>"; echo $row['LoanID']; echo "</td>";
			echo "<td>"; echo $row['Title']; echo "</td>";
			echo "<td>"; echo $row['Author']; echo "</td>";
			echo "<td>"; echo $row['YearPublished']; echo "</td>";
			echo "<td>"; echo $row['StartDate']; echo "</td>";
			echo "<td>"; echo $row['EndDate']; echo "</td>";
			echo "<td>"; echo $row['ReturnDate']; echo "</td>";
			

			echo "</tr>";
		}
		echo "</table>";
		
	?>
</body>
</html>