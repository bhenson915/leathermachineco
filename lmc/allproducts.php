<?php
// acquire shared info from other files
include("shared.php");
include("dbconn.inc.php"); // database connection

// make database connection
$conn = dbConnect();

    print($HTMLHeader);
?>
<?php
    print($navigation);
?>
    <div class="products-main-container">
<?php

    print($sideNavigation);

?>
<div class="container">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="allproducts.php">Products</a></li>
  </ol>
</nav>

         <?php
        //send the query to the database and get results
            ##You will have to edit this query using your table name and field names. For the exercise, you are going to use this script to list all link categories in your database table.

            $sql = "SELECT Title, Description, Price, Image, PID FROM Products WHERE CatID = 1";

            /* create a prepared statement */
            $stmt = $conn->stmt_init();

            if ($stmt->prepare($sql)) {

                /* execute statement */
                $stmt->execute();

                /* bind result variables */
                $stmt->bind_result($Title, $Description, $Price, $Image, $PID);
                /* fetch values */
                print ("
                  <div class='container-fluid'>
                    <h1>COBRA Machines</h1>
                    <div class='row'>");
                while ($stmt->fetch()) {
                    print ("

                      <div class='product-medium-card'>
                        <div class='product-medium-image'>
                          <img src='img/products/$Image' alt=''>
                        </div>
                        <div class='product-medium-content'>
                          <h3 class='product-medium-title'>
                            $Title
                          </h3>
                          <div class='product-medium-rating king'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star-half-alt'></i>
                          </div>
                          <a href='cobra-product-detail.php?PID=$PID'><button class='btn-cta'>View More</button></a>
                        </div>
                      </div>

                    ");
                }

                print ("</div></div>");


                /* close statement */
                $stmt->close();

            } else {
                print ("query failed");
            }

            $sql = "SELECT Title, Description, Price, Image, PID FROM Products WHERE CatID = 2";

            /* create a prepared statement */
            $stmt = $conn->stmt_init();

            if ($stmt->prepare($sql)) {

                /* execute statement */
                $stmt->execute();

                /* bind result variables */
                $stmt->bind_result($Title, $Description, $Price, $Image, $PID);
                /* fetch values */
                print ("
                  <div class='container-fluid'>
                    <h1>Leather Splitters</h1>
                    <div class='row'>");
                while ($stmt->fetch()) {
                    print ("

                      <div class='product-medium-card'>
                        <div class='product-medium-image'>
                          <img src='img/products/$Image' alt=''>
                        </div>
                        <div class='product-medium-content'>
                          <h3 class='product-medium-title'>
                            $Title
                          </h3>
                          <div class='product-medium-rating king'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star-half-alt'></i>
                          </div>
                          <a href='cobra-product-detail.php?PID=$PID'><button class='btn-cta'>View More</button></a>
                        </div>
                      </div>

                    ");
                }

                print ("</div></div>");


                /* close statement */
                $stmt->close();

            } else {
                print ("query failed");
            }

            $sql = "SELECT Title, Description, Price, Image, PID FROM Products WHERE CatID=3";

            /* create a prepared statement */
            $stmt = $conn->stmt_init();

            if ($stmt->prepare($sql)) {

                /* execute statement */
                $stmt->execute();

                /* bind result variables */
                $stmt->bind_result($Title, $Description, $Price, $Image, $PID);
                /* fetch values */
                print ("
                  <div class='container-fluid'>
                    <h1>Motors</h1>
                    <div class='row'>");
                while ($stmt->fetch()) {
                    print ("

                      <div class='product-medium-card'>
                        <div class='product-medium-image'>
                          <img src='img/products/$Image' alt=''>
                        </div>
                        <div class='product-medium-content'>
                          <h3 class='product-medium-title'>
                            $Title
                          </h3>
                          <div class='product-medium-rating king'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star-half-alt'></i>
                          </div>
                          <a href='cobra-product-detail.php?PID=$PID'><button class='btn-cta'>View More</button></a>
                        </div>
                      </div>

                    ");
                }

                print ("</div></div>");


                /* close statement */
                $stmt->close();

            } else {
                print ("query failed");
            }

            $sql = "SELECT Title, Description, Price, Image, PID FROM Products WHERE CatID=4";

            /* create a prepared statement */
            $stmt = $conn->stmt_init();

            if ($stmt->prepare($sql)) {

                /* execute statement */
                $stmt->execute();

                /* bind result variables */
                $stmt->bind_result($Title, $Description, $Price, $Image, $PID);
                /* fetch values */
                print ("
                  <div class='container-fluid'>
                    <h1>Reducers</h1>
                    <div class='row'>");
                while ($stmt->fetch()) {
                    print ("

                      <div class='product-medium-card'>
                        <div class='product-medium-image'>
                          <img src='img/products/$Image' alt=''>
                        </div>
                        <div class='product-medium-content'>
                          <h3 class='product-medium-title'>
                            $Title
                          </h3>
                          <div class='product-medium-rating king'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star-half-alt'></i>
                          </div>
                          <a href='cobra-product-detail.php?PID=$PID'><button class='btn-cta'>View More</button></a>
                        </div>
                      </div>

                    ");
                }

                print ("</div></div>");


                /* close statement */
                $stmt->close();

            } else {
                print ("query failed");
            }

            $sql = "SELECT Title, Description, Price, Image, PID FROM Products WHERE CatID = 5";

            /* create a prepared statement */
            $stmt = $conn->stmt_init();

            if ($stmt->prepare($sql)) {

                /* execute statement */
                $stmt->execute();

                /* bind result variables */
                $stmt->bind_result($Title, $Description, $Price, $Image, $PID);
                /* fetch values */
                print ("
                  <div class='container-fluid'>
                    <h1>Accessories</h1>
                    <div class='row'>");
                while ($stmt->fetch()) {
                    print ("

                      <div class='product-medium-card'>
                        <div class='product-medium-image'>
                          <img src='img/products/$Image' alt=''>
                        </div>
                        <div class='product-medium-content'>
                          <h3 class='product-medium-title'>
                            $Title
                          </h3>
                          <div class='product-medium-rating king'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star-half-alt'></i>
                          </div>
                          <a href='cobra-product-detail.php?PID=$PID'><button class='btn-cta'>View More</button></a>
                        </div>
                      </div>

                    ");
                }

                print ("</div></div>");


                /* close statement */
                $stmt->close();

            } else {
                print ("query failed");
            }

            $sql = "SELECT Title, Description, Price, Image, PID FROM Products WHERE CatID = 6";

            /* create a prepared statement */
            $stmt = $conn->stmt_init();

            if ($stmt->prepare($sql)) {

                /* execute statement */
                $stmt->execute();

                /* bind result variables */
                $stmt->bind_result($Title, $Description, $Price, $Image, $PID);
                /* fetch values */
                print ("
                  <div class='container-fluid'>
                    <h1>Needles and Thread</h1>
                    <div class='row'>");
                while ($stmt->fetch()) {
                    print ("

                      <div class='product-medium-card'>
                        <div class='product-medium-image'>
                          <img src='img/products/$Image' alt=''>
                        </div>
                        <div class='product-medium-content'>
                          <h3 class='product-medium-title'>
                            $Title
                          </h3>
                          <div class='product-medium-rating king'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star-half-alt'></i>
                          </div>
                          <a href='cobra-product-detail.php?PID=$PID'><button class='btn-cta'>View More</button></a>
                        </div>
                      </div>

                    ");
                }

                print ("</div></div>");


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

  <?php
    print($PageFooter);
  ?>

</body>
</html>
