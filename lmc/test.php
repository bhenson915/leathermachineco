<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection

// make database connection
$conn = dbConnect();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/svg" href="img/lmc-logo.svg"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Leather Machine Co. | BEM</title>
</head>
<body>
    <div class="top-hat-container">
      <div class="top-hat-cta">
        <p>Free Ground Shipping on All Orders $30+ (Excludes HI, AK, PR)</p>
      </div>
      <div class="top-hat-search">
        
      </div>
      <ul class="top-hat-user">
        <li><a href="#">Login</a></li>
        <span>|</span> 
        <li><a href="#">Register</a></li> 
        <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li> 
        <div class="top-hat-search">
            <div >
                <input type="text" placeholder="What are you looking for?">
                <button type="submit" class="searchButton">
                  <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
      </ul>
    </div>
    
    <header>
        <h1 class="branding"><a href="index.html">Leather Machine Co. | BEM</a></h1>
        <nav>
            <button class="navbar-toggler closed" type="button" data-target="#navigation">
                <i class="fa fa-bars"></i>
            </button>

            <ul id="navigation">
               <li class="dropdown-menu">
                 <a href="products.html">Products</a>
                 <ul class="dropdown-links">
                   <li>Cobra Machines</li>
                 </ul>
               </li>
               <li>
                 <a href="support.html">Support</a>
               </li> 
               <li>
                 <a href="madewithcobra.html">Made with Cobra</a>
               </li>
               <li>
                 <a href="about.html">About</a>              
               </li>
               <li>
                 <button class="btn-primary">Contact</button>
               </li>
            </ul>
        </nav>
    </header>

    <div class="products-main-container">
        <aside id="products-side-navigation">
            <section>
                <h4>COBRA Machines</h4>
                <hr>
                <ul>
                    <a href="">
                    <li>10 Ton Clicker</li>
                    </a>
                    <a href="">
                    <li>5110 Post Machine</li>
                    </a>
                    <a href="">
                    <li>5550 BB Single Needle Boot Top Machine</li>
                    </a>
                    <a href="">
                    <li>8810 Post Machine</li>
                    </a>
                    <a href="">
                    <li>AK 20 'PLUS' Leather Strap Cutting Machine</li>
                    </a>
                    <a href="">
                    <li>Class 17 Walking Foot Machine</li>
                    </a>
                    <a href="">
                    <li>Class 18 Compound Needle Feed (Triple Feed) Walking Foot Machine</li>
                    </a>
                    <a href="">
                    <li>Class 20</li>
                    </a>
                    <a href="">
                    <li>Class 26</li>
                    </a>
                    <a href="">
                    <li>Class 29-18 Patch Machine</li>
                    </a>
                    <a href="">
                    <li>Class 3 Heavy Duty Leather Stitcher</li>
                    </a>
                    <a href="">
                    <li>Class 4-P Premium Package</li>
                    </a>
                    <a href="">
                    <li>Class 4-S Standard Package</li>
                    </a>
                    <a href="">
                    <li>MP Finisher</li>
                    </a>
                </ul>
    
            </section>
            <section>
                <h4>Leather Splitters</h4>
                <hr>
                <ul>
                    <a href="">
                    <li>Class 14 Leather splitter Complete Unit</li>
                    </a>
                    <a href="">
                    <li>Class 14 Leather Splitter Head Only</li>
                    </a>
                    <a href="">
                    <li>Osborne 86 Splitter</li>
                    </a>
                </ul>
            </section>
            <section>
                <h4>Motors</h4>
                <hr>
                <ul>
                    <a href="">
                    <li>Brushless Digital D.C. Servo Motor</li>
                    </a>
                    <a href="">
                    <li>Brushless Positioner Motor With Synchronizer</li>
                    </a>
                </ul>
            </section>
            <section>
                <h4>Reducers</h4>
                <hr>
                <ul>
                    <a href="">
                    <li>Speed Reducer</li>
                    </a>
                </ul>
            </section>
            <section>
                <h4>Accessories</h4>
                <hr>
                <ul>
                    <a href="">
                        <li>Battery Powered Thread Burner</li>
                    </a>
                    <a href="">
                        <li>Blanket Set</li>
                    </a>
                    <a href="">
                        <li>Bobbin Case for Cobra Class 17, 18 & 5550B</li>
                    </a>
                    <a href="">
                        <li>Bobbin for Cobra Class 17, 18 & 5550B</li>
                    </a>
                    <a href="">
                        <li>Bobbin for Cobra Class 3, 4 & King Cobra 4-25</li>
                    </a>
                    <a href="">
                        <li>Center toe Presser Foot</li>
                    </a>
                    <a href="">
                        <li>Class 26 Work Platform</li>
                    </a>
                    <a href="">
                        <li>Class 3 Work Platform</li>
                    </a>
                    <a href="">
                        <li>Class 4 Work Platform</li>
                    </a>
                    <a href="">
                        <li>Double Toe Presser Foot</li>
                    </a>
                    <a href="">
                        <li>Fiebing's Glycerine Saddle Soap</li>
                    </a>
                    <a href="">
                        <li>Heavy Duty Roller Edge Guide</li>
                    </a>
                    <a href="">
                        <li>Holster Plate</li>
                    </a>
                    <a href="">
                        <li>Hook for Cobra Class 17, 18 & 5550B</li>
                    </a>
                    <a href="">
                        <li>Left Toe Presser Foot</li>
                    </a>
                    <a href="">
                        <li>Magnetic Guide</li>
                    </a>
                </ul>
            </section>
            <section>
                <h4>Needles and Thread</h4>
                <hr>
                <ul>
                    <a href="">
                        <li>Silicone Thread Lubricant</li>
                    </a>
                    <a href="">
                        <li>Magnetic Thread Lubricator</li>
                    </a>
                    <a href="">
                        <li>Premium Thread New Colors</li>
                    </a>
                    <a href="">
                        <li>1lb Spool of Thread</li>
                    </a>
                    <a href="">
                        <li>Pre-Wound Bobbins</li>
                    </a>
                    <a href="">
                        <li>135 x 8 Leather Point Needles</li>
                    </a>
                    <a href="">
                        <li>135 x 17 Round Point Needles</li>
                    </a>
                    <a href="">
                        <li>7 x 3 Round Point Needles</li>
                    </a>
                    <a href="">
                        <li>Premium Thread</li>
                    </a>
                    <a href="">
                        <li>7 x 4 NW Leather Point Needles</li>
                    </a>
                    <a href="">
                        <li>135 x 16 DIA, 18-23 Leather Point Needles</li>
                    </a>
                </ul>
            </section>
          </aside>
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
                        <div class='product-single-description'>
                          <h3>$Title</h3>
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

        



      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
      <script src="js/app.js"></script>
          
</body>
</html>