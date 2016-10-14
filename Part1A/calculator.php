<html>
<head><title>Calculator</title></head>
<body>

<h1>Calculator</h1>
Type an expression in the following box (e.g., 10.5+20*3/25).

<?php 
	$temp_expr = "2 + 2";
	$result = eval("return $temp_expr;");
	if (is_numeric($temp_expr)){
		echo "is numeric";	
	}

	function correct_format($expr_str) {
		$temp_expr = "";



		for ($i = 0; $i < strlen($expr_str); $i++){
			if (is_numeric($expr_str[$i]) || $expr_str[$i] == '.' || $expr_str[$i] == ' ') {
				$temp_expr .= $expr_str[$i];
			}
			else{
				$temp_expr .= " " . $expr_str[$i] . " ";
			}
		}

	return $temp_expr;
	}


?>
<p>
    <form method="GET">
        <input type="text" name="expr">
        <input type="submit" value="Calculate">
    </form>
</p>


<ul>
    <li>Only numbers and +,-,* and / operators are allowed in the expression.
    <li>The evaluation follows the standard operator precedence.
    <li>The calculator does not support parentheses.
    <li>The calculator handles invalid input "gracefully". It does not output PHP error messages.
</ul>

Here are some(but not limit to) reasonable test cases:
<ol>
  <li> A basic arithmetic operation:  3+4*5=23 </li>
  <li> An expression with floating point or negative sign : -3.2+2*4-1/3 = 4.46666666667, 3*-2.1*2 = -12.6 </li>
  <li> Some typos inside operation (e.g. alphabetic letter): Invalid input expression 2d4+1 </li>
</ol>

 <h2>Result</h2>

 <p>
 	<?php
 		
 		$curr_expr = $_GET['expr']; 
 		$temp2_expr = $curr_expr;
		$curr_result = 0; 
		$temp2_expr = implode(" ", str_split($temp2_expr));

		// echo "$temp2_expr" . "<sbr>";

		if (!preg_match("/[^a-zA-Z]/", $temp2_expr) || preg_match("/[0-9]+\s+\.+/", $curr_expr) || preg_match("/[0-9]+\.\.+/", $curr_expr))  { // check if there are any letters. strlen(str_replace(array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.', ' ', '-', '+', '*', '/'), '', $temp2_expr))
			echo "Invalid input...";
			// echo "here";	
		}
		elseif(preg_match("/\/ 0/", $temp2_expr)) { //check for devide by zero
			// echo "here";
			echo "Divide by Zero";	
		}
		else {
			if (strlen($curr_expr)) {
				
				$temp_expr = correct_format($curr_expr);
				
				$curr_result = eval("return $temp_expr;"); //eval returns false if the expression is invalid.	
				$result = $curr_result;
			}

			if ((!$result && is_bool($result))) { //check if result is valid

				echo "$temp_expr" . "<br>";
				// echo "here";
				echo "Invalid input...";
			}
			else {
				echo "$temp_expr = $result" . "<br>";	
	
			}

		
		}
	?>

  </p>
</body>
</html>
