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

 <div class="products-main-container">
    
    <?php
    print($sideNavigation);
    ?>

    <div class='container-fluid center mb-3'>

          <?php
            //send the query to the database and get results
            ##You will have to edit this query using your table name and field names. For the exercise, you are going to use this script to list all link categories in your database table.

            $sql = "SELECT Category, CatID, Image FROM Category";

            /* create a prepared statement */
            $stmt = $conn->stmt_init();

            if ($stmt->prepare($sql)) {

                /* execute statement */
                $stmt->execute();

                /* bind result variables */
                $stmt->bind_result($Category, $CatID, $Image);
                print ("
                <nav aria-label='breadcrumb'>
                      <ol class='breadcrumb'>
                          <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                          <li class='breadcrumb-item'><a href='allproducts.php'>Products</a></li>
                          <li class='breadcrumb-item'><a href='cobra-product-list.php'>Cobra Machines</a></li>
                      </ol>
                  </nav>
                  <h1>Categories</h1>
                  <div class='row'>");
                /* fetch values */
                while ($stmt->fetch()) {
                    print ("
                      <div class='product-medium-card'>
                        <div class='product-medium-image'>
                          <img src='img/categories/$Image' alt=''>
                        </div>
                        <div class='product-medium-content'>
                          <h3 class='product-medium-title'>
                            $Category
                          </h3>
                          <button class='btn-cta'>View More</button>
                        </div>
                      </div>
                    ");
                }


                /* close statement */
                $stmt->close();

            } else {
                print ("query failed");
            }

        /* close connection */
        $conn->close();

    ?>
    </div>
        </div>
        </div>
        

      <?php
        print($PageFooter);
      ?>
          
</body>
</html>