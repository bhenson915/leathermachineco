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

This script will list all comments associated with a link (link id) and provide action options.

Note that once we learn AJAX, the interface can be more streamlined.  
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
            (2) comment list:
                List all comments.  For each one, offer an appropriate action option.
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
            $output = "<div class='error'>The database operation to retrieve the link information has failed.  Please try again or contact the system administrator.</div>";
        }
        
        // (2) comment list
        
        //  Get all tag options
        $sql = "SELECT LCID, Comment, `Date`, Display from LinkComment WHERE LinkID = ? Order by `Date` DESC"; 

		$stmt = $conn->stmt_init();
        
		if ($stmt->prepare($sql)){

            $stmt->bind_param('i',$lid);

            $stmt->execute();
            
            $stmt->store_result();
            
            $stmt->bind_result($LCID, $Comment, $Date, $Display);
            
            // compose comment list
            if ($stmt->num_rows > 0){
                while ($stmt->fetch()){
                    // prepare for action option ('display' or 'hide' a comment)
                    if ($Display == 1) {
                        // the comment is currently set to be displayed, offer an option to hide it
                        $optionValue = 'h';
                        $optionText = 'Hide this message';
                        $commentClass = 'displayed';
                    } else {
                        // the comment is currently set to be hidden, offer an option to display it
                        $optionValue = 'd';
                        $optionText = 'Display this message';
                        $commentClass = 'hidden';
                    }
                    $commentList = $commentList.
                        "<div class='commentBox'>
                            <div>
                                <span class='commentDate'>$Date</span>
                                <span class='action'><a href='adminExtra_commentEdit.php?lid=$lid&lcid=$LCID&option=$optionValue'>$optionText</a></span>
                            </div>
                            <div class='comment $commentClass'>$Comment</div>
                        </div>";
                }
            } else {
                $commentList = "Currently no comment available for this link.";
            }
            
            $stmt->close();
        } else {
            $output = "<div class='error'>The database operation to retrieve the comment information has failed.  Please try again or contact the system administrator.</div>";
        }
            
        
        
        $output = $output.$commentList;
			
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
        <h2 id='tagSubheading'>Comment List for <?php echo $link ?></h2>
        <?php echo $output ?>
    </div>
</div>
</main>

<?php print $PageFooter; ?>

</body>
</html>