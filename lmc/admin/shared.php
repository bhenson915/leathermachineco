<?php
// store shared information in this file, such as headers, menu, and footers

//HTML Header
$HTMLHeader = 
"<!DOCTYPE html>
<html>
<head>
	<title>CTEC4321 Code Example</title>
	<link rel='stylesheet' href='http://cyjang.uta.cloud/ctec4321/lab/LinkList/style.css' type='text/css'>
</head>
<body>
";

//Course identifier
$course = "<div class='course'>COMM4321 Code Example</div>";

// Page title
$SubTitle_Admin = "<h1>Link List Administration (Extra Edition)</h1>";

// Header
$header = "
<header class='headerExEd'>
    <h1>$SubTitle_Admin</h1>
</header>\n";

// Admin Nav
$admin_nav = "<nav class='flexboxContainer'><div>
                <div class='buttonBox'><a href='adminExtra_form.php'><span class='button'>+</span> Add a new item</a></div>
                <div class='buttonBox'><a href='adminExtra_list.php'><span class='button'> ./ </span> List all items</a></div>
              </div></nav>
                ";

//Page Footer
$PageFooter = "
<footer>
	<a href='http://cyjang.uta.cloud/ctec4321/'>Back to the course site</a>
</footer>
";

/*========================================*/
    function getTagOptions() {
        // This function will retrieve all tag id and tag name and put them in an array with tag id as the keys and tag name as the values.
    
        global $conn;
        $sql = "Select TagID, TagName from TagForLink";
        $stmt = $conn->stmt_init();
        
        // empty array to store the tag option names
        $tagArr = array();

        if ($stmt->prepare($sql)){

            $stmt->execute();
            $stmt->bind_result($TagID, $TagName);

            while($stmt->fetch()){
                $tagArr[$TagID] = $TagName;
            }


        } else {
            // note this is for debugging purpose only.  
            print "<p>Query to retrieve tag options failed.</p>";
            
        }
        
        $stmt->close();
        
        return $tagArr;

    }

/*========================================*/
    function getTags($LID) {
        // This function will retrieve all tags associated with a specific link (LinkID) and put them in an array.  How to present the tags is left for the main script to work on. Since we will retrieve tags in different parts of the application, this way, we can reuse this function throughout the application.
        
        // set up an empty array to store all TagIDs
        $tidArr = array();
        
        $conn1 = dbConnect(); // make a new connection to the DB since the connection on the main process is occupied by the main DB query results
        $sql = "Select TagID from LinkTag Where LinkID = ?";
        $stmt = $conn1->stmt_init();

        if ($stmt->prepare($sql)){
            
            $stmt->bind_param("i", $LID);  // note $LID here comes from the function parameter
            
            $stmt->execute();
            $stmt->bind_result($TagID);

            while($stmt->fetch()){
                $tidArr[] = $TagID;
            }
            
            $stmt->close();
    
        } else {

            print "<p>Query to retrieve tags failed.<br>\$LID: $LID</p>";

        }
        
        $conn1->close();
        
        return $tidArr;
        
    }

/*========================================*/
    function getComments($LID) {
        // This function will retrieve all comments associated with a specific link (LinkID) and put them in an array.  How to present the comments is left for the main script to work on. Since we will retrieve comments in different parts of the application, this way, we can reuse this function throughout the application.
        
        // set up an empty array to store all the TagID
        $cArr = array();
        
        $conn1 = dbConnect(); // make a new connection to the DB since the connection on the main process is occupied by the main DB query results
        $sql = "Select Comment from LinkComment Where LinkID = ?";
        $stmt = $conn1->stmt_init();

        if ($stmt->prepare($sql)){
            
            $stmt->bind_param("i", $LID);  // note $LID here is the function parameter
            
            $stmt->execute();
            $stmt->bind_result($Comment);

            while($stmt->fetch()){
                $cArr[] = $Comment;
            }
            
            $stmt->close();
            
        } else {

            print "<p>Query to retrieve comments failed.</p>";

        }
        
        $conn1->close();
        
        return $cArr;
        
        
    }