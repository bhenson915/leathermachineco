<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection
include("shared.php"); // shared components

// make database connection
$conn = dbConnect();

?>
<?php
    print($HTMLHeader);
?>
<?php
    print($navigation);
?>

    <div class="products-main-container">
    
        <?php
        print($sideNavigation);
        ?>

        <?php
            if (!empty($_GET['PID']) && is_numeric($_GET['PID'])){

                $PID = intval($_GET['PID']);

                $sql = "SELECT Title, Price, Image, Description, Specifications, CatID FROM Products where PID = ?";

                /* create a prepared statement */
                $stmt = $conn->stmt_init();

                if ($stmt->prepare($sql)) {

                /* bind the parameter onto the query */
                    $stmt->bind_param('i', $PID);

                    /* execute statement */
                    $stmt->execute();

                    /* store result: this will allow the use of $stmt->num_rows (providing the number of the rows/records in the result set).  Note that num_rows is not used in this version. */
                        $stmt->store_result();

                    /* bind result variables */
                    $stmt->bind_result($Title, $Price, $Image, $Description, $Specifications, $CatID);

                    /* fetch values */
                    if ($stmt->fetch()) {
                        print ("
                        <div class='container-fluid center mb-3'
                            <nav aria-label='breadcrumb'>
                                <ol class='breadcrumb'>
                                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                    <li class='breadcrumb-item'><a href='allproducts.php'>Products</a></li>
                                    <li class='breadcrumb-item'><a href='splitter-product-list.php'>Lether Splitters</a></li>
                                    <li class='breadcrumb-item active' aria-current='page'>$Title</li>
                                </ol>
                            </nav>
                        
                        <div class='product-single-container'>
                            <div class='product-single-images'>
                            <img src='img/products/$Image' alt=''>
                            </div>
                            <div class='product-single-description'>
                            <h3 class='mb-3'>$Title</h3>
                            <p>$Description</p><br>
                            <span class='product-price'>$$Price</span><br/>
                            <button class='btn-primary'>Add to Cart</button>
                            </div>
                        </div>
                        <ul class='nav nav-tabs'>
                            <li class='nav-item'>
                            <a class='nav-link active' href='#'>Specifications</a>
                            </li>
                            <li class='nav-item'>
                            <a class='nav-link' href='#'>Related Products</a>
                            </li>
                        </ul>
                        <div class='product-single-specifications p-3'>
                        <p>$Specifications</p>
                        </div>

                        ");
                    } else {
                    print ("<div class='error'>No product category found that matches your request. If you believe this is an error, please contact our webmaster at admin@mycompany.com.</div>");
                    }

                    print ("</div></div>");


                    /* close statement */
                    $stmt->close();

                } else {
                    print ("query failed");
                }

                /* close connection */
                $conn->close();
                }
                        

                ?>
        </div>

    <?php

        print($PageFooter);

    ?>
          
</body>
</html>