<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

	print $HTMLHeader; 

?>
	
<?php 

	print $navigation; 

?>

<?php
$PID = ""; // place holder for product id information


//See if a product id is available from the client side. If yes, then retrieve the info from the database based on the product id.  If not, present the form.
if (isset($_GET['PID'])) { // note that the spelling 'PID' is based on the query string variable name

	// product id available, vaPIDate the information, then compose a query accordingly to retrieve information.

	$PID = intval($_GET['PID']); // force all input into an integer.  If the input is a string or empty, it will be converted to 0.

	// vaPIDate the product id -- check to see if it is greater than 0
		if ($PID>0 ){
			//compose the query
			$sql = "DELETE from Products WHERE PID = ?"; // note that the spelling "LinkID" is based on the field name in the database product table.

			$stmt = $conn->stmt_init();

			if ($stmt->prepare($sql)){

				$stmt->bind_param('i',$PID);

				if ($stmt->execute()){ // $stmt->execute() will return true (successful) or false
					$output = "<span class='success'>Success!</span><p>The selected record has been successfully deleted.</p>";
				} else {
					$output = "<div class='error'>The database operation to delete the record has been failed.  Please try again or contact the system administrator.</div>";
				}
				
			}
				
			
		} else {
			// link id <= 0. reset $PID. prepare error message
			$PID = "";
			// compose an error message
			$output = "<p><b>!</b> If you are expecting to delete an exiting item, there are some error occured in the process -- the link you selected is not recognizable. Please contact the webmaster.  Thank you.</p>";
		}
} else {
	// $_GET['PID'] is not set, which means that no product id is provided
	$output = "<p><b>!</b> To manage link records, please follow the hyperlink below to visit the admin page.  Thank you. </p>";
}

?>

<main class='container'>
    
    <div>   
        <?= $output ?>
        
        <p>Back to the <a href='admin_list.php'>administrative list page</a></p>
    </div>

</main>





<?php print $PageFooter; ?>

</body>
</html>