<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

// This form is used for both adding or updating a record.
// When adding a new record, the form should be an empty one.  When editing an existing item, information of that item should be preloaded onto the form.  How do we know whether it is for adding or editing?  Check whether a product id is available -- the form needs to know which item to edit.

$PID = ""; // place holder for link id information.  Set it as empty initally.  You may want to change its name to something more fitting for your application.  However, please note this variable is used in several places later in the script. You need to replace it with the new name through out the script.

// Set all values for the form as empty.  To prepare for the "adding a new item" scenario.  
$Title = "";
$Price = "";
$Image = "";
$Description = "";
$Specifications="";
$CatID = "";

$errMsg = "";

// check to see if a product id available via the query string
if (isset($_GET['PID'])) { // note that the spelling 'pid' is based on the query string variable name.  When linking to this form (form.php), if a query string is attached, ex. form.php?lid=3 , then that information will be detected here and used below.

	$PID = intval($_GET['PID']); // get the integer value from $_GET['lid'] (ensure $lid contains an integer before use it for the query).  If $_GET['lid'] contains a string or is empty, intval will return zero.

	// validate the link id -- $lid should be greater than zero.
	if ($PID > 0){
			
		//compose a select query
		
		$sql = "SELECT Title, Price, Image, Description, Specification, CatID FROM Products WHERE PID = ?"; 
			
		$stmt = $conn->stmt_init();

		if($stmt->prepare($sql)){
			$stmt->bind_param('i',$PID);
			$stmt->execute();
				
			$stmt->bind_result($Title, $Price, $Image, $Description, $Specifications, $CatID); // bind the three pieces of information selected in the query ($sql).
			
			$stmt->store_result();
				
			// proceed only if a match is found -- there should be only one row returned in the result
			if($stmt->num_rows == 1){
				$stmt->fetch();
			} else {
				$errMsg = "<div class='error'>Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.</div>";
				$PID = ""; // reset $PID
			}

		} else {
			// reset $PID
			$PID = "";
			// compose an error message
			$errMsg = "<div class='error'> If you are expecting to edit an exiting item, there are some error occured in the process -- the selected product is not recognizable.  Please follow the link below to the product adminstration interface or contact the webmaster.  Thank you.</div>";
		}
		
		$stmt->close();
	} // close if(is_int($lid))
	
}

// function to create the options for the category drop-down list.  
//  -- the value of parameter $selectedPID comes from the function call
function CategoryOptionList($selectedCID){
	
	$list = ""; //placeholder for the link category option list
	
	global $conn;
	// retrieve category info from the database to compose a drop down list
	$sql = "SELECT CatID, Category FROM Category order by Category";
	
	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){
		
		$stmt->execute();
		$stmt->bind_result($CategoryID, $CategoryName);

		while ($stmt->fetch()) {
			// while going through the rows in the results, check if the category id of the current row matches the parameter ($CID) provided by the function call
			if ($CategoryID == $selectedCID){
				$selected = "Selected";
			} else {
				$selected = "";
			}
			// create an option based on the current row
			$list = $list."<option value='$CategoryID' $selected>$CategoryName</option>";
		}
	}
	$stmt->close();
	return $list;
}
?>
<?php print $HTMLHeader;?>
	
<?php print $navigation;?>

<main class='container'>

<div>
    
<h2>Product Information Form</h2>

    <p><?= $errMsg ?></p>

<form action="admin_edit.php" method="POST">
* Required
	<!-- pass the PID information using a hidden field -->
	<input type="hidden" name="PID" value="<?=$PID?>">
	<div class="table-responsive">
		<table class='table'>
			<tr><th>Title*:</th><td><input type="text" name="Title" size="45" value="<?= $Title ?>"></td></tr>
			<tr><th>Price*:</th><td><input type="text" name="Price" size="45" value="<?= $Price ?>"></td></tr>
			<tr><th>Image Name*:</th><td><input type="text" name="Image" size="45" value="<?= $Image ?>"></td></tr>
			<tr><th>Description*:</th><td><textarea name="Description" id="Description" cols="30" rows="10"><?= $Description ?></textarea></td></tr>
			<tr><th>Specifications*:</th><td><textarea name="Specifications" id="Specifications" cols="30" rows="10"><?= $Specifications ?></textarea></td></tr>
			<tr><th>Category*:</th><td><select name="CatID"><?= CategoryOptionList($CatID)?></select></td></tr>
			<tr><td colspan=2><input type=submit name="Submit" value="Submit" class="btn btn-primary"></td></tr>
		</table>
	</div>
	

</form>
</div>
</main>

<?php print $PageFooter; ?>

</body>
</html>