<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
include("shared.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables

// make database connection
$conn = dbConnect();

?>
<?php
/*=======================

This script will add or remove a link-tag association from the LingTag table.
Three pieces of info are expected from the URL query string: lid, tid, option (A or R -- add or remove).

Based on the option, add or remove a link-tag association.

Once it's done, redirect the user back to the tag list page.
========================*/
    
//Check if all necessary info is available.

if (isset($_GET['lid']) && isset($_GET['lcid']) && isset($_GET['option'])){
    
    $lid = intval($_GET['lid']);
    $lcid = intval($_GET['lcid']);
    if ($_GET['option'] == "d") {
        $displayValue = 1;
    } else {
        $displayValue = 0;
    }
    
    $sql = "Update LinkComment Set Display = ? Where LCID = ?";
    $stmt = $conn->stmt_init();
    if($stmt->prepare($sql)){

        $stmt->bind_param('ii',$displayValue, $lcid);
        if ($stmt->execute()){
            header("Location: adminExtra_commentList.php?lid=$lid");
            exit;    
        } else {
            header("Location: adminExtra_list.php?e");
            exit;
        }
    
    } else {
        header("Location: adminExtra_list.php?e");
        exit;
    }
    
} else {
    
    // if any of the lid, tid, or option is missing from the URL query string, redirect the user to the admin home page (adminExtra_list.php)

    // a query string is added to indicate that user was redirected here because some sort of error occured. The admin home page can then print an appropriate message.
    
    header("Location: adminExtra_list.php?e");
    exit;
}
?>


<?php 
	print $HTMLHeader; 
	print $course;
    print $header;
?>

<?php echo $admin_nav ?>

<main>
