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

<?php
    $query = $_GET['query']; 
    // gets value sent over search form     
    $min_length = 3;
    // you can set minimum length of the query if you want
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;$query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection

        $sql = "SELECT Title, Price, Image, Description, PID FROM Products WHERE (`Title` LIKE '%$query%') OR (`Description` LIKE '%$query%')";

        $stmt = $conn->stmt_init();

        if ($stmt->prepare($sql)){
    
        $stmt->execute();

        $stmt->bind_result($Title, $Price, $Image, $Description, $PID);
    
        $tblRows = "";
        while($stmt->fetch()){
    
            $tblRows = $tblRows."
            <div class='container'>
                <article class='search-result row'>
                    <div class='col-xs-12 col-sm-12 col-md-3'>
                        <a href='#' class='thumbnail'><img src='img/products/$Image' alt='' /></a>
                    </div>
                    <div class='col-xs-12 col-sm-12 col-md-7 excerpet'>
                        <h3><a href='#' title=''>$Title</a></h3>
                        <p>$Description</p>						
                        <a href='#' class='btn btn-primary'>See More</a>
                    </div>
                </article>
            </div>";
        }
        
        $output = "
        <div "
    
                .$tblRows."
        </div>";
                    
        $stmt->close();
    } else {
    
        $output = "Query to retrieve product information failed.";
    
    }
}
    
    $conn->close();
?>
        
    <div class='container-fluid'>
	<h3>Search Results</h3>
    <?php echo $output ?>
    
    
</div>
</main>

<?php print $PageFooter; ?>

</body>
</html>