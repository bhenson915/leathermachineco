<?php
// acquire shared info from other files
include("../dbconn.inc.php"); // database connection 
include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

// This form is used for both adding or updating a record.
// When adding a new record, the form should be an empty one.  When editing an existing item, information of that item should be preloaded onto the form.  How do we know whether it is for adding or editing?  Check whether a product id is available -- the form needs to know which item to edit.

$lid = ""; // place holder for link id information.  Set it as empty initally.  You may want to change its name to something more fitting for your application.  However, please note this variable is used in several places later in the script. You need to replace it with the new name through out the script.

// Set all values for the form as empty.  To prepare for the "adding a new item" scenario.  
$AnchorText = "";
$URL = "";
$CID = "";

$errMsg = "";

// check to see if a product id available via the query string
if (isset($_GET['lid'])) { // note that the spelling 'pid' is based on the query string variable name.  When linking to this form (form.php), if a query string is attached, ex. form.php?lid=3 , then that information will be detected here and used below.

	$lid = intval($_GET['lid']); // get the integer value from $_GET['lid'] (ensure $lid contains an integer before use it for the query).  If $_GET['lid'] contains a string or is empty, intval will return zero.

	// validate the link id -- $lid should be greater than zero.
	if ($lid > 0){
			
		//compose a select query
		$sql = "SELECT AnchorText, URL, CID from Links WHERE LinkID = ?"; 
			
		$stmt = $conn->stmt_init();

		if($stmt->prepare($sql)){
			$stmt->bind_param('i',$lid);
			$stmt->execute();
				
			$stmt->bind_result($AnchorText, $URL, $CID); // bind the three pieces of information selected in the query ($sql).
			
			$stmt->store_result();
				
			// proceed only if a match is found -- there should be only one row returned in the result
			if($stmt->num_rows == 1){
				$stmt->fetch();
			} else {
				$errMsg = "<div class='error'>Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.</div>";
				$lid = ""; // reset $lid
			}

		} else {
			// reset $lid
			$lid = "";
			// compose an error message
			$errMsg = "<div class='error'> If you are expecting to edit an exiting item, there are some error occured in the process -- the selected product is not recognizable.  Please follow the link below to the product adminstration interface or contact the webmaster.  Thank you.</div>";
		}
		
		$stmt->close();
	} // close if(is_int($lid))
	
}

// function to create the options for the category drop-down list.  
//  -- the value of parameter $selectedCID comes from the function call
function CategoryOptionList($selectedCID){
	
	$list = ""; //placeholder for the link category option list
	
	global $conn;
	// retrieve category info from the database to compose a drop down list
	$sql = "SELECT CID, CategoryName FROM LinkCategory order by CategoryName";
	
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
    
<h2>Link Information Form</h2>

    <p><?= $errMsg ?></p>

<form action="adminExtra_edit.php" method="POST">
* Required
	<!-- pass the pid information using a hidden field -->
	<input type="hidden" name="lid" value="<?=$lid?>">

	<table class='formTable'>
		<tr><th>Anchor Text*:</th><td><input type="text" name="AnchorText" size="45" value="<?= $AnchorText ?>"></td></tr>
		<tr><th>URL*:</th><td><input type="text" name="URL" size="45" value="<?= $URL ?>"></td></tr>
		<tr><th>Category*:</th><td><select name="CID"><?= CategoryOptionList($CID)?></select></td></tr>
		<tr><td colspan=2><input type=submit name="Submit" value="Submit Link Information"></td></tr>
	</table>

</form>
</div>
</main>

<?php print $PageFooter; ?>

</body>
</html>