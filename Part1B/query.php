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
		return $db;
	}

	//clean up user input
	function handleUserInput($string){
		return $string;
	}

	function getUserData($query){
		$result = $db->query($query);
		if (!$result){
			// die('There was an error running the query [' . $db->error . ']');
		}
		return $result;
	}
	//echo data to result section of webpage
	function outputData($data){

	}

?>





<form action="" method="GET">

<?php 

 	$serverName = "localhost";
	$databaseName = "TEST";
	$username = "cs143";
	$password = "";

	$db = createConnection($serverName, $username, $password, $databaseName);

	$query = $_GET['query'];
	$cleanedQuery = handleUserInput($query);
	$result = getUserData($query);

?>


<TEXTAREA NAME = "query" cols="70" rows="10">
<?php 
	echo htmlspecialchars($_GET['query']);
?>

</TEXTAREA><br />
<input type="submit" name="Submit">
</form>

</body>
</html>
