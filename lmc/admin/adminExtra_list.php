<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

?>
<?php 
	print $HTMLHeader; 
	print $course;
    print $header;
?>

<script>
function confirmDel(title, lid) {
// javascript function to ask for deletion confirmation

	url = "adminExtra_delete.php?lid="+lid;
	var agree = confirm("Delete this item: <" + title + "> ? ");
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

<?php echo $admin_nav ?>

<main>
<?php
    
// Retrieve tag options (tag names) and put it in an array for later use
   $tagNameArr = getTagOptions();
    
// Retrieve the link & category info using a join query
	$sql = "SELECT Links.LinkID, Links.AnchorText, Links.URL, LinkCategory.CategoryName FROM Links, LinkCategory where Links.CID = LinkCategory.CID order by LinkCategory.CategoryName, Links.AnchorText";

	$stmt = $conn->stmt_init();

	if ($stmt->prepare($sql)){

		$stmt->execute();
		$stmt->bind_result($LinkID, $AnchorText, $URL, $CategoryName);
	
		$tblRows = "";
		while($stmt->fetch()){
            
            //-- for each link retrieved --//
            
            // Set up a text string based on $AnchorText for the use of the JavaScript function call confirmDel()
			$Title_js = htmlspecialchars($AnchorText, ENT_QUOTES); 
            
            // Get the tags for this link (based on LinkID) and mark them up with proper HTML tags for presentation
            $tagIDArr = getTags($LinkID);
            $tagHTML = "";
            foreach ($tagIDArr as $tagID) {
                $tagName = $tagNameArr[$tagID];
                $tagHTML = $tagHTML."<span>$tagName</span>";
            }
            $tagHTML = $tagHTML. "<span class='action'><a href='adminExtra_tagList.php?lid=$LinkID'> Edit </a></span>";
            
            // Get the comments fort this link (based on LinkID).  Create a message stating the number of comments with a link to view comments
            $commentArr = getComments($LinkID);
            $commentHTML = count($commentArr)." <span class='action'><a href='adminExtra_commentList.php?lid=$LinkID'>View</a></span>";

			$tblRows = $tblRows."
                        <tr><td><a href='$URL'>$AnchorText</a></td>
								 <td>$CategoryName</td>
                                 <td class='tagCell'>$tagHTML</td>
                                 <td class='commentCell'>$commentHTML</td>
							     <td><span class='action'><a href='adminExtra_form.php?lid=$LinkID'>Edit</a></span>   <span class='action'><a href='javascript:confirmDel(\"$Title_js\",$LinkID)'>Delete</a></span> </td></tr>\n";
		}
		
		$output = "
        <table class='itemList'>\n
		<tr><th>Link</th><th>Category</th><th>Tags</th><th>Comments</th><th>Options</th></tr>\n".$tblRows.
		"</table>\n";
					
		$stmt->close();
	} else {

		$output = "<div class=''>Query to retrieve product information failed.</div>";
	
	}

	$conn->close();
        
/* handling the opening error message */

if (isset($_GET['e'])){
    // with the query string e ("?e") being set, it means that users are directed here due to some errors in tag/comment operations
    $openingErrMsg = "<div class='error'>Oops! Your previous operation is not successful.  Please try again or contact the Web master.</div>";
}

?>
	
<?php echo $openingErrMsg ?>	

<div class='flexboxContainer'>
    
    <div>
        <h2>Link List</h2>
        <?php echo $output ?>
    </div>
</div>
</main>

<?php print $PageFooter; ?>

</body>
</html>