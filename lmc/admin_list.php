<?php
session_start();

// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

print $HTMLHeader; 

?>

<?php print $navigation; ?>

<script>
function confirmDel(Title, PID) {
// javascript function to ask for deletion confirmation

	url = "admin_delete.php?PID="+PID;
	var agree = confirm("Delete this item: <" + Title + "> ? ");
	if (agree) {
		// redirect to the deletion script
		location.href = url;
	}
	else {
		// do nothing
		return;
	}
}
</script>

<?php
    
// Retrieve tag options (tag names) and put it in an array for later use
    
// Retrieve the link & category info using a join query
	$sql = "SELECT Products.Title, Products.Price, Products.Image, Products.Description, Products.PID, Products.CatID, Category.Category FROM Products, Category WHERE Products.CatID = Category.CatID ORDER BY Products.CatID";

	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){

	$stmt->execute();
	$stmt->bind_result($Title, $Price, $Image, $Description, $PID, $CatID, $Category);

	$tblRows = "";
	while($stmt->fetch()){
		$Title_js = htmlspecialchars($Title, ENT_QUOTES); 
		setlocale(LC_MONETARY, 'en_US.UTF-8');
		$priceStr = money_format('%.2n', $Price);

		$tblRows = $tblRows."
		<tr>
			<td>$Title</td>
			<td><img class='admin-list-image' src='img/products/$Image' alt='' class='admin-list-img'>
			</td>
			<td>$Description</td>
			<td>$Category</td>
			<td>$priceStr</td>
			<td><a href='admin_form.php?PID=$PID'>Edit</a> | <a href='admin_delete.php?PID=$PID'>Delete</a></td>
		</tr>";
	}
	
	$output = "
	<div class='table-responsive'>
		<table class='table'>\n
		<thead>	
			<tr>
				<th>Title</th>
				<th>Image</th>
				<th>Description</th>
				<th>Category</th>
				<th>Price</th>
				<th>Edit</th>
			</tr>\n
		</thead>"

			.$tblRows.
		"</table>\n
	</div>";
				
	$stmt->close();
} else {

	$output = "Query to retrieve product information failed.";

}

$conn->close();
?>


<div class='container-fluid'>
	<div class='buttonBox mt-3'><a href="admin_form.php" class='btn btn-primary'><span > + </span> Add a new item</a></div>
	<h3>Administrative List</h3>
	<?php echo $output ?>
</div>

<?php
	print($PageFooter);
?>

</body>
</html>