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

<?php echo $admin_nav ?>

<main>
<?php
    
/*=======================

This script will list all tags associated with a link (link id) and provide action options.

Note that once we learn AJAX, the interface can be a lot more streamlined.  
========================*/
    
//Check if a link id is available.
    
if (isset($_GET['lid'])) { // note that the spelling 'lid' is based on the query string variable name

	// product id available, validate the information, then compose a query accordingly to retrieve information.

	$lid = intval($_GET['lid']); // force all input into an integer.  If the input is a string or empty, it will be converted to 0.

	// validate the product id -- check to see if it is greater than 0
    if ($lid>0 ){
        /* ----------------
            Got a valid link id, start composing the content of this page including
            (1) link info:
                This will be used in the page sub-title
            (2) tag list:
                List all tag options.  For each one, offer an appropriate action option.
        -----------------*/
        
        // (1) Get the link info
        $sql = "SELECT AnchorText, URL from Links WHERE LinkID = ?"; 

		$stmt = $conn->stmt_init();
        
		if ($stmt->prepare($sql)){

            $stmt->bind_param('i',$lid);

            $stmt->execute();
            
            $stmt->store_result();
            
            $stmt->bind_result($AnchorText, $URL);
            
            // compose link info
            if ($stmt->num_rows > 0){
                $stmt->fetch();
                // there should be only one match, therefore, no need for a while loop
                $link = "<a href='$URL'>$AnchorText</a>";
            } else {
                $link = "(Link info is not available. Please contact the Web master.)";
            }
            
            $stmt->close();
        } else {
            $linkInfo = "<div class='error'>The database operation to retrieve the link information has failed.  Please try again or contact the system administrator.</div>";
        }
        
        // (2) tag list
        
        //  Get all tag options
        $tagNameArr = getTagOptions();

        // Get the tags for this link (based on $lid) 
        $tagIDArr = getTags($lid);
        
        // check each tag option.  If it's part of the tagIDArr, then offer an option to remove it.  If it's not part of the tagIDArr, then offer an option to select it.
        $tagList = "";
        foreach ($tagNameArr as $tid => $tagname) {
            if (in_array($tid, $tagIDArr)){
                $optionAnchorText = 'Remove';
                $optionValue = "R";
                $tagClass = "tagName selected";
            } else {
                $optionAnchorText = 'Add';
                $optionValue = "A";
                $tagClass = "tagName";
            }
            
            $tagList = $tagList."
            <div class='tagItem'><span class='$tagClass'>$tagname</span> <span class='action'><a href='adminExtra_tagEdit.php?lid=$lid&tid=$tid&option=$optionValue'>$optionAnchorText</a></span></div>
            ";
            
        }
        
        $output = $tagList;
			
    } else {
			// link id <= 0. reset $lid. prepare error message
			$lid = "";
			// compose an error message
			$output = "<p><b>!</b> If you are expecting to edit tags, there are some error occured in the process, our system cannot recognize which record you expect to work on. Please try again by following the hyperlink below to visit the admin page, or contact the webmaster.  Thank you.</p>";
    }
} else {
	// $_GET['lid'] is not set, which means that no link id is provided
	$output = "<p><b>!</b> To manage tag records, please follow the hyperlink below to visit the admin page.  Thank you. </p>";
}


    
$conn->close
    
?>
	
		

<div class='flexboxContainer'>
    <div>
        <h2 id='tagSubheading'>Tag List for <?php echo $link ?></h2>
        <?php echo $output ?>
    </div>
</div>
</main>

<?php print $PageFooter; ?>

</body>
</html>