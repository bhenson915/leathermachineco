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

<main>
<?php
    
// Retrieve tag options (tag names) and put it in an array for later use
    
// Retrieve the link & category info using a join query
	$sql = "SELECT Products.Title, Products.Price, Products.Image, Products.Description, Products.PID, Products.CatID, Category.Category FROM Products, Category WHERE Products.CatID = Category.CatID ORDER BY Products.CatID ASC ";

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
			<td><img src='img/products/$Image' alt='' class='admin-list-img'>
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
</main>

<div class="footer">
    <div class="footer-content">
      <div class="footer-products">
        <p class="subheading">Products</p>
        <a href="#">Most Popular Items</a><br>
        <a href="#">Cobra Machines</a><br>
        <a href="#">Other Machines</a><br>
        <a href="#">Motors/Reducers</a><br>
        <a href="#">Accessories</a>
        </li>
      </div>
      <div class="footer-support">
        <p class="subheading">Support</p>
        <a href="#">FAQs</a><br>
        <a href="#">Videos/Tips</a><br>
        <a href="#">Forum</a>
      </div>
      <div class="footer-info">
        <p class="subheading">Info</p>
        <a href="#">About Us</a><br>
        <a href="#">Contact</a>
      </div>
      <div class="footer-account">
        <p class="subheading">Account</p>
        <a href="#">Log In</a><br>
        <a href="#">Register</a>
      </div>
      <div class="footer-newsletter">
        <p class="subheading">Subscribe to our newsletter</p>
        <input type="email" name="email" id="footer-email" placeholder="Email"><br><br>
        <button type="button" class="btn-secondary" id="footer-btn">Submit</button>
      </div>
      <p class="subheading social">Connect with us</p>
      <div class="footer-social">
        <img src="img/icons/facebook.png">
        <img src="img/icons/twitter.png">
        <img src="img/icons/youtube.png">
      </div>
      <p class="copyright">© 2018 Leather Machine Co</p>
    </div>
  </div>

</body>
</html>