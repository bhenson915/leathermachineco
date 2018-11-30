<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

// Process only if there is any submission
if (isset($_POST['Submit'])) {

	// ==========================
	//validate user input
	
	// set up the required array 
	$required = array("AnchorText", "URL", "CID"); // note that, in this array, the spelling of each item should match the form field names

	// set up the expected array
	$expected = array("AnchorText", "URL", "CID", "lid"); // again, the spelling of each item should match the form field names
    
    // set up a label array, use the field name as the key and label as the value
    $label = array ('AnchorText'=>'Anchor Text', "URL"=>'URL', "CID"=>'Link Category', "lid"=>'Link ID');


	$missing = array();
	
	foreach ($expected as $field){
		// isset($_POST[$field]):  Note that if there is no user selection for radio buttons, checkboxes, selection list, then $_POST[$field] will not be set

		// Under what conditions the script needs to record a field as missing -- $field is required and one of the following two (1)  $_POST[$field] is not set or (2) $_POST[$field] is empty

		//echo "$field: in_array(): ".in_array($field, $required)." empty(_POST[$field]): ".empty($_POST[$field])."<br>"; // for debugging purposes

		if (in_array($field, $required) && (!isset($_POST[$field]) || empty($_POST[$field]))) {
			array_push ($missing, $field);
		
		} else {
			// Passed the required field test, set up a variable to carry the user input.  
			// Note the variable set up here uses the $field value as the veriable name. Notice the syntax ${$field}.  This is a "variable variable". For example, the first $field in the foreach loop here is "AnchorText" (the first one in the $expected array) and a $title variable will be created.  The value of this variable will be either "" or $_POST["AnchorText"] depending on whether $_POST["AnchorText"] is set up.
            // once we run through the whole $expected array, then these variables, "$AnchorText", "$URL", "$CID", and "$lid" will be generated.
            
			if (!isset($_POST[$field])) {
				//$_POST[$field] is not set, set the value as ""
				${$field} = "";
			} else {
				
				${$field} = $_POST[$field];
				
			}
		
		}

	}

	//print_r ($missing); // for debugging purpose

	/* add more data validation here */
	// ex. $price should be a number

	/* proceed only if there is no required fields missing and all other data validation rules are satisfied */
	if (empty($missing)){

		//========================
		// processing user input

		$stmt = $conn->stmt_init();


		// compose a query: Insert or Update? Depending on whether there is a $lid.
        
		if ($lid != "") {
			/* there is an existing lid ==> need to deall with an existing reocrd ==> use an update query */ 
			
			// Ensure $lid contains an integer. 
			$lid = intval($lid); 

			$sql = "Update Links SET AnchorText = ?, URL = ?, CID = ? WHERE LinkID = ?";
				
			if($stmt->prepare($sql)){

				// Note: user input could be an array, the code to deal with array values should be added before the bind_param statment.
				$stmt->bind_param('ssii',$AnchorText, $URL, $CID, $lid);
				$stmt_prepared = 1;// set up a variable to signal that the query statement is successfully prepared.
			}

		} else {
			// no existing lid ==> this means no existing record to deal with, then it must be a new record ==> use an insert query
			$sql = "Insert Into Links (AnchorText, URL, CID) values (?, ?, ?)";

			if($stmt->prepare($sql)){

				// Note: user input could be an array, the code to deal with array values should be added before the bind_param statment.

				$stmt->bind_param('ssi',$AnchorText, $URL, $CID);
				$stmt_prepared = 1; // set up a variable to signal that the query statement is successfully prepared.
			}
		}

		if ($stmt_prepared == 1){
			if ($stmt->execute()){
				$output = "<span class='success'>Success!</span><p>The following information has been saved in the database:</p>";
				foreach($expected as $key){
					$output .= "<b>{$label[$key]}</b>: {$_POST[$key]} <br>"; 
				}
				$output .= "<p>Back to the <a href='adminExtra_list.php'>link list page</a></p>";
			} else {
				//$stmt->execute() failed.
				$output = "<div class='error'>Database operation failed.  Please contact the webmaster.</div>";
			}
		} else {
			// statement is not successfully prepared (issues with the query).
			$output = "<div class='error'>Database query failed.  Please contact the webmaster.</div>";
		}

	} else { 
		// $missing is not empty 
		$output = "<div class='error'><p>The following required fields are missing in your form submission.  Please check your form again and fill them out.  <br>Thank you.<br>\n<ul>\n";
		foreach($missing as $m){
			$output .= "<li>{$label[$m]}\n";
		}
		$output .= "</ul></div>\n";
	}

} else {
	$output = "<div class='error'>Please begin your link managment operation from the <a href='adminExtra_list.php'>admin page</a>.</div>";
}


?>

<?php 
	print $HTMLHeader; 
	print $course;
?>
<header>
	<h1><?= $SubTitle_Admin ?></h1>
</header>

<?php echo $admin_nav ?>

<main class='flexboxContainer'>
    
    <div>   
        <?= $output ?>
    </div>

</main>

<?php print $PageFooter; ?>

</body>
</html>