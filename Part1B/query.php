<!DOCTYPE html>
<html>
<body>

<p>
	Enter your SQL query in the box below:<br />
</p>

<?php 

	//connects to sql server
	function createConnection($serverName, $username, $password, $databaseName){
		$db = new mysqli($serverName, $username, $password, $databaseName);
		if($db->connect_errno > 0){
			die('Unable to connect to database [' . $db->connect_error . ']');
		}
		else {
			// echo "<p> Successfully Connected!</p>";
		}
		return $db;
	}

	//clean up user input
	//*********not implemented yet***********
	function handleUserInput($string){
		return $string;
	}

	//queries the data base and returns the result object
	//$query: query string input by user
	//$dbObject: mysqli connection object
	function getUserData($query, $dbObject){
		$result = $dbObject->query($query);
		if (!$result){
			// die('There was an error running the query [' . $db->error . ']');
			// echo "<p> hello" . $dbObject->error . "</p>";
			echo "<p> There was an error running the query: [" . $dbObject->error . "]</p>";
		}
		else {
			echo "Successfully got query result </br>";
		}
		return $result;
	}
	//echo data to result section of webpage in table format
	//$result : result object returned by calling query($query) on mysqli object
	function outputData($result){


		$finfo = $result->fetch_fields();

		echo "<tr>";
		foreach ($finfo as $val){
			echo "<th>" . $val->name . "</th>";
		}
		echo "</tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";	
			foreach($finfo as $val){
				echo "<td align=\"center\">" . $row[$val->name] . "</td>";
			}
			echo "</tr>";
		}

	}

?>


<form action="" method="GET">

<?php 

 	$serverName = "localhost";
	$databaseName = "CS143";
	$username = "cs143";
	$password = "";

	$db = createConnection($serverName, $username, $password, $databaseName); // create connection

?>


<TEXTAREA NAME = "query" cols="70" rows="10">
<?php 
	echo htmlspecialchars($_GET['query']); //escape special characters before echo
?>

</TEXTAREA><br />
<input type="submit" name="Submit">
</form>


<h2>Result</h2>

<table style ="width:100%">
	<?php 
		
		$query = handleUserInput($_GET['query']);
		$rs = getUserData($query, $db);
		outputData($rs);
	?>
</table>
</body>
</html>
