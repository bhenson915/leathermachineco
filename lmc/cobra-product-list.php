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

            $sql = "SELECT Title, Description, Price, Image, PID FROM Products where CatID = 1";

            /* create a prepared statement */
            $stmt = $conn->stmt_init();

            if ($stmt->prepare($sql)) {

                /* execute statement */
                $stmt->execute();

                /* bind result variables */
                $stmt->bind_result($Title, $Description, $Price, $Image, $PID);
                /* fetch values */
                print ("
                  <nav aria-label='breadcrumb'>
                        <ol class='breadcrumb'>
                            <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                            <li class='breadcrumb-item'><a href='allproducts.php'>Products</a></li>
                            <li class='breadcrumb-item'><a href='cobra-product-list.php'>Cobra Machines</a></li>
                        </ol>
                    </nav>
                    <div class='row'>");

                print("
                    <div class='container-fluid mb-5'>
                        <div class='product-header-container' id='cobra-machines-header'>
                            <div class='product-header-content'>
                                <h1>COBRA Machines</h1>
                            </div>
                        </div>
                    </div>
                    <div class='container-fluid mx-auto'>
                        <div class='row'>
                            <div class='homepage-product-highlight col'>
                                    <div class='highlight-row center'>
                                        <div class='col-2 align-self-center text-center'>
                                            <img src='img/products/cobraMachines/Cobra-Class-20.png' alt=''>
                                        </div>
                                        <div class='col-3'>
                                            <h5>Best Selling</h5>
                                            <h2 class='m-0 king'>COBRA MACHINE</h2>
                                            <h4>Cobra Class 20</h4>
                                            <hr class='my-4'>
                                            <a href='cobra-product-detail.php?PID=14'>Shop Now!</a>
                                        </div>
                                        <div class='col-2 align-self-center text-center'>
                                            <img src='img/products/cobraMachines/Cobra-Class-26.png' alt=''>
                                        </div>
                                        <div class='col-3'>
                                            <h5>Select Models</h5>
                                            <h2 class='m-0 king'>10% OFF REGULAR PRICE</h2>
                                            <h4>Sale ends January 1st!</h4>
                                            <hr class='my-4'>
                                            <a href='cobra-product-detail.php?PID=15'>Shop Now!</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ");

                print ("
                    
                    <div class='container-fluid'>
                        <form class="form-inline">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Preference</label>
                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            </select>
                        
                            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Remember my preference</span>
                            </label>
                        
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                ");
                while ($stmt->fetch()) {
                    print ("
                    <a href='cobra-product-detail.php?PID=$PID'>
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
                          <button class='btn-cta'>View More</button>
                        </div>
                      </div>
                      </a>

                    ");
                }

                print ("</div>");


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

<?php print $PageFooter; ?>

<input type="select">
</body>
</html>
