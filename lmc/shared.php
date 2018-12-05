<?php
// store shared information in this file, such as headers, menu, and footers

//HTML Header
$HTMLHeader =
"<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link rel='shortcut icon' type='image/svg' href='img/favicon.png'/>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    <link rel='stylesheet' href='css/normalize.css'>
    <link rel='stylesheet' href='css/styles.css'>

    <title>Leather Machine Co. | Home of the Cobra</title>
</head>
<body>
";
?>
<?php
$navigation =
  "<div class='top-hat-container'>
  <div class='top-hat-cta'>
    <p>Free Ground Shipping on All Orders $30+ (Excludes HI, AK, PR)</p>
  </div>
  <div class='top-hat-search'>

  </div>
  <ul class='top-hat-user'>
    <li><a href='admin_list.php'>Login</a></li>
    <span>|</span>
    <li><a href='#'>Register</a></li>
    <li><a href='checkout/cart.html'><i class='fas fa-shopping-cart'></i></a></li>
    <div class='wrap'>
      <div class='search'>
        <input type='text' class='searchTerm' placeholder='What are you looking for?'>
        <button type='submit' class='searchButton'>
          <i class='fa fa-search'></i>
        </button>
      </div>
    </div>
  </ul>
</div>

<header>
  <h1 class='branding'><a href='index.html'>Leather Machine Co. | BEM</a></h1>
  <nav>
    <button class='navbar-toggler closed' type='button' data-target='#navigation'>
      <i class='fa fa-bars'></i>
    </button>

    <ul id='navigation'>
      <li class='dropdown-menu'>
        <a href='#'>Products <i class='fas fa-caret-down'></i></a>
        <ul class='dropdown-links'>
          <li><a href='allproducts.php'>All Products</a></li>
          <li><a href='cobra-product-list.php'>Cobra Machines</a> </li>
          <li><a href='splitter-product-list.php'>Leather Splitters</a> </li>
          <li><a href='motors-product-list.php'>Motors</a> </li>
          <li><a href='reducers-product-list.php'>Reducers</a> </li>
          <li><a href='accessories-product-list.php'>Accessories</a> </li>
          <li><a href='needle-product-list.php'>Needles and Thread</a> </li>
        </ul>
      </li>
      <li>
        <a href='support.html'>Support</a>
      </li>
      <li>
        <a href='madewithcobra.html'>Made with Cobra</a>
      </li>
      <li>
        <a href='about.html'>About</a>
      </li>
      <li>
          <a href='contact.html'><button class='btn-primary'>Contact</button></a> 
      </li>
    </ul>
  </nav>
</header>"

?>

<?php
$sideNavigation = "
<aside id='products-side-navigation'>
    <h3 class='white-text mt-0 mb-3'>Products</h3>
    <section>
    <div id='accordion'>
        <div class='card'>
            <button class='card-header btn btn-cta' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                Cobra Machines <i class='fas fa-angle-right fa-lg fa-fw'></i>
            </button>

            <div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#accordion'>
            <div class='card-body'>
            <ul>
                <a href='cobra-product-detail.php?PID=4'>
                <li>10 Ton Clicker</li>
                </a>
                <a href='cobra-product-detail.php?PID=5'>
                <li>5110 Post Machine</li>
                </a>
                <a href='cobra-product-detail.php?PID=6'>
                <li>5550 BB Single Needle Boot Top Machine</li>
                </a>
                <a href='cobra-product-detail.php?PID=7'>
                <li>8810 Post Machine</li>
                </a>
                <a href='cobra-product-detail.php?PID=8'>
                <li>AK 20 'PLUS' Leather Strap Cutting Machine</li>
                </a>
                <a href=''>
                <li>Class 17 Walking Foot Machine</li>
                </a>
                <a href=''>
                <li>Class 18 Compound Needle Feed (Triple Feed) Walking Foot Machine</li>
                </a>
                <a href=''>
                <li>Class 20</li>
                </a>
                <a href=''>
                <li>Class 26</li>
                </a>
                <a href=''>
                <li>Class 29-18 Patch Machine</li>
                </a>
                <a href=''>
                <li>Class 3 Heavy Duty Leather Stitcher</li>
                </a>
                <a href='cobra-product-detail.php?PID=2'>
                <li>Class 4-P Premium Package</li>
                </a>
                <a href='cobra-product-detail.php?PID=1'>
                <li>Class 4-S Standard Package</li>
                </a>
                <a href=''>
                <li>MP Finisher</li>
                </a>
            </ul>
            </div>
            </div>
        </div>
        <div class='card'>
            <button class='card-header btn btn-cta collapsed' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
                Leather Splitters <i class='fas fa-angle-right fa-lg fa-fw'></i>
            </button>
            <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordion'>
                <div class='card-body'>
                    <ul>
                        <a href=''>
                        <li>Class 14 Leather splitter Complete Unit</li>
                        </a>
                        <a href=''>
                        <li>Class 14 Leather Splitter Head Only</li>
                        </a>
                        <a href=''>
                        <li>Osborne 86 Splitter</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class='card'>
            <button class='card-header btn btn-cta collapsed' data-toggle='collapse' data-target='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>
                Motors <i class='fas fa-angle-right fa-lg fa-fw'></i>
            </button>
            <div id='collapseThree' class='collapse' aria-labelledby='headingThree' data-parent='#accordion'>
                <div class='card-body'>
                    <ul>
                        <a href=''>
                        <li>Brushless Digital D.C. Servo Motor</li>
                        </a>
                        <a href=''>
                        <li>Brushless Positioner Motor With Synchronizer</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class='card'>
            <button class='card-header btn btn-cta collapsed' data-toggle='collapse' data-target='#collapseFour' aria-expanded='true' aria-controls='collapseFour'>
                Reducers <i class='fas fa-angle-right fa-lg fa-fw'></i>
            </button>
            <div id='collapseFour' class='collapse' aria-labelledby='headingFour' data-parent='#accordion'>
                <div class='card-body'>
                    <ul>
                        <a href=''>
                        <li>Speed Reducer</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class='card'>
            <button class='card-header btn btn-cta collapsed' data-toggle='collapse' data-target='#collapseFive' aria-expanded='true' aria-controls='collapseFive'>
                Accessories <i class='fas fa-angle-right fa-lg fa-fw'></i>
            </button>
            <div id='collapseFive' class='collapse' aria-labelledby='headingFive' data-parent='#accordion'>
                <div class='card-body'>
                    <ul>
                        <a href=''>
                            <li>Battery Powered Thread Burner</li>
                        </a>
                        <a href=''>
                            <li>Blanket Set</li>
                        </a>
                        <a href=''>
                            <li>Bobbin Case for Cobra Class 17, 18 & 5550B</li>
                        </a>
                        <a href=''>
                            <li>Bobbin for Cobra Class 17, 18 & 5550B</li>
                        </a>
                        <a href=''>
                            <li>Bobbin for Cobra Class 3, 4 & King Cobra 4-25</li>
                        </a>
                        <a href=''>
                            <li>Center toe Presser Foot</li>
                        </a>
                        <a href=''>
                            <li>Class 26 Work Platform</li>
                        </a>
                        <a href=''>
                            <li>Class 3 Work Platform</li>
                        </a>
                        <a href=''>
                            <li>Class 4 Work Platform</li>
                        </a>
                        <a href=''>
                            <li>Double Toe Presser Foot</li>
                        </a>
                        <a href=''>
                            <li>Fiebing's Glycerine Saddle Soap</li>
                        </a>
                        <a href=''>
                            <li>Heavy Duty Roller Edge Guide</li>
                        </a>
                        <a href=''>
                            <li>Holster Plate</li>
                        </a>
                        <a href=''>
                            <li>Hook for Cobra Class 17, 18 & 5550B</li>
                        </a>
                        <a href=''>
                            <li>Left Toe Presser Foot</li>
                        </a>
                        <a href=''>
                            <li>Magnetic Guide</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>

        <div class='card'>
            <button class='card-header btn btn-cta collapsed' data-toggle='collapse' data-target='#collapseSix' aria-expanded='true' aria-controls='collapseSix'>
                Needles and Thread <i class='fas fa-angle-right fa-lg fa-fw'></i>
            </button>
            <div id='collapseSix' class='collapse' aria-labelledby='headingSix' data-parent='#accordion'>
                <div class='card-body'>
                    <ul>
                        <a href=''>
                            <li>Silicone Thread Lubricant</li>
                        </a>
                        <a href=''>
                            <li>Magnetic Thread Lubricator</li>
                        </a>
                        <a href=''>
                            <li>Premium Thread New Colors</li>
                        </a>
                        <a href=''>
                            <li>1lb Spool of Thread</li>
                        </a>
                        <a href=''>
                            <li>Pre-Wound Bobbins</li>
                        </a>
                        <a href=''>
                            <li>135 x 8 Leather Point Needles</li>
                        </a>
                        <a href=''>
                            <li>135 x 17 Round Point Needles</li>
                        </a>
                        <a href=''>
                            <li>7 x 3 Round Point Needles</li>
                        </a>
                        <a href=''>
                            <li>Premium Thread</li>
                        </a>
                        <a href=''>
                            <li>7 x 4 NW Leather Point Needles</li>
                        </a>
                        <a href=''>
                            <li>135 x 16 DIA, 18-23 Leather Point Needles</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section>          
</aside>";
?>

<?php
//Page Footer
$PageFooter = "
<div class='footer'>
    <div class='footer-content'>
      <div class='footer-products'>
        <p class='subheading'>Products</p>
        <a href='#'>Most Popular Items</a><br>
        <a href='#'>Cobra Machines</a><br>
        <a href='#'>Other Machines</a><br>
        <a href='#'>Motors/Reducers</a><br>
        <a href='#'>Accessories</a>
        </li>
      </div>
      <div class='footer-support'>
        <p class='subheading'>Support</p>
        <a href='#'>FAQs</a><br>
        <a href='#'>Videos/Tips</a><br>
        <a href='#'>Forum</a>
      </div>
      <div class='footer-info'>
        <p class='subheading'>Info</p>
        <a href='#'>About Us</a><br>
        <a href='#'>Contact</a>
      </div>
      <div class='footer-account'>
        <p class='subheading'>Account</p>
        <a href='#'>Log In</a><br>
        <a href='#'>Register</a>
      </div>
      <div class='footer-newsletter'>
        <p class='subheading'>Subscribe to our newsletter</p>
        <input type='email' name='email' id='footer-email' placeholder='Email'><br><br>
        <button type='button' class='btn-secondary' id='footer-btn'>Submit</button>
      </div>
      <p class='subheading social'>Connect with us</p>
      <div class='footer-social'>
        <img src='img/icons/facebook.png'>
        <img src='img/icons/twitter.png'>
        <img src='img/icons/youtube.png'>
      </div>
      <p class='copyright'>© 2018 Leather Machine Co</p>
    </div>
  </div>

    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js'></script>
    <script src='js/app.js'></script>

";
?>

