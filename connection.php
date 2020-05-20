<?php
	$db= new mysqli("librarymanagement.cejdae9a9lwa.us-east-1.rds.amazonaws.com","gbalannik","gabrieL930","","3306"); // server name, username, password, database name
	if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($db) . PHP_EOL;
// echo mysqli_query($db, "test: " . "SELECT * FROM libraryschema.test_1;");
?>