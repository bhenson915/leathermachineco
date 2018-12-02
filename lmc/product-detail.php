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
            //send the query to the database and get results
            ##You will have to edit this query using your table name and field names. For the exercise, you are going to use this script to list all link categories in your database table.

            $sql = "SELECT Title, Description, Price, Image, Specifications FROM Products where CatID = 1";

            /* create a prepared statement */
            $stmt = $conn->stmt_init();

            if ($stmt->prepare($sql)) {

                /* execute statement */
                $stmt->execute();

                /* bind result variables */
                $stmt->bind_result($Title, $Description, $Price, $Image, $Specifications);

                /* fetch values */
                while ($stmt->fetch()) {
                    print ("
                    <div class='container'>
                      <div class='product-single-container'>
                        <div class='product-single-images'>
                          <img src='img/products/cobraMachines/$Image' alt=''>
                        </div>
                        <div class='product-single-description simpleCart_shelfItem'>
                          <h3 class='item_name'>$Title</h3>
                          <p>$Description</p><br>
                          <label for='item_Quantity'>Quantity</label><br>
                          <input type='text' value='1' name='item_Quantity' class='item_Quantity'><br>
                          <span class='product-price item_price'>$$Price</span><br/>
                          <a class='item_add btn btn-primary' href='javascript:;'> Add to Cart </a></p>
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
                      <div class='product-single-specifications'>
                      <p>$Specifications</p>
                      </div>
                      <div class='container'>
                      <h3>Recommended for you</h3>
                      <div class='product-carousel-container'>
                        <a href='#'>
                            <div class='product-carousel-card'>
                            <div class='product-carousel-image'>
                                <img src='img/products/cobraMachines/class425.jpg' alt=''>
                            </div>
                            <h4 class='product-carousel-title'>COBRA Class 4-P Premium Package</h4>
                            <button class='btn-primary'>Add to Cart</button>
                            </div>
                        </a>
                        <a href='#'>
                            <div class='product-carousel-card'>
                            <div class='product-carousel-image'>
                                <img src='img/products/cobraMachines/class425.jpg' alt=''>
                            </div>
                            <h4 class='product-carousel-title'>COBRA Class 4-P Premium Package</h4>
                            <button class='btn-primary'>Add to Cart</button>
                            </div>
                        </a>
                        <a href='#'>
                            <div class='product-carousel-card'>
                            <div class='product-carousel-image'>
                                <img src='img/products/cobraMachines/class425.jpg' alt=''>
                            </div>
                            <h4 class='product-carousel-title'>COBRA Class 4-P Premium Package</h4>
                            <button class='btn-primary'>Add to Cart</button>
                            </div>
                        </a>
                        <a href='#'>
                            <div class='product-carousel-card'>
                            <div class='product-carousel-image'>
                                <img src='img/products/cobraMachines/class425.jpg' alt=''>
                            </div>
                            <h4 class='product-carousel-title'>COBRA Class 4-P Premium Package</h4>
                            <button class='btn-primary'>Add to Cart</button>
                            </div>
                        </a>
                        <a href='#'>
                            <div class='product-carousel-card'>
                            <div class='product-carousel-image'>
                                <img src='img/products/cobraMachines/class425.jpg' alt=''>
                            </div>
                            <h4 class='product-carousel-title'>COBRA Class 4-P Premium Package</h4>
                            <button class='btn-primary'>Add to Cart</button>
                            </div>
                        </a>
                        <a href='#'>
                            <div class='product-carousel-card'>
                            <div class='product-carousel-image'>
                                <img src='img/products/cobraMachines/class425.jpg' alt=''>
                            </div>
                            <h4 class='product-carousel-title'>COBRA Class 4-P Premium Package</h4>
                            <button class='btn-primary'>Add to Cart</button>
                            </div>
                        </a>
                        <a href='#' class='arrow-left'><span><i class='fas fa-arrow-left fa-lg'></i></span></a> 
                        <a href='#' class='arrow-right'><span><i class='fas fa-arrow-right fa-lg'></i></span></a> 
                        </div>
                        </div>
                        </div?
                    </div>");
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

        <div class="simpleCart_shelfItem">
            <h2 class="item_name"> Awesome T-shirt </h2>
            <select class="item_size">
                <option value="Small"> Small </option>
                <option value="Medium"> Medium </option>
                <option value="Large"> Large </option>
            </select><br>
            <input type="text" value="1" class="item_Quantity"><br>
            <span class="item_price">$35.99</span><br>
            <a class="item_add btn btn-primary" href="javascript:;"> Add to Cart </a>
        </div>

        <!-- create a checkout button -->
        <a href="javascript:;" class="simpleCart_checkout">Checkout</a>
        <!-- button to empty the cart -->
        <a href="javascript:;" class="simpleCart_empty"></a>
        <!-- show the cart -->
        <div class="simpleCart_items"></div>
        <!-- cart total (ex. $23.11)-->
        <div class="simpleCart_total"></div>
        <!-- cart quantity (ex. 3) -->
        <div class="simpleCart_quantity"></div>
        <!-- tax cost (ex. $1.38) -->
        <div class="simpleCart_tax"></div>
        <!-- tax rate (ex. %0.6) -->
        <div class="simpleCart_taxRate"></div>
        <!-- shipping (ex. $5.00) -->
        <div class="simpleCart_shipping"></div>
        <!-- grand total, including tax and shipping (ex. $28.49) -->
        <div class="simpleCart_grandTotal"></div>

        


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/simpleCart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="js/app.js"></script>
          
</body>
</html>