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

    <title>Leather Machine Co. | BEM</title>
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
    <li><a href='#'>Login</a></li>
    <span>|</span> 
    <li><a href='#'>Register</a></li> 
    <li><a href='#'><i class='fas fa-shopping-cart'></i></a></li>
    <li><div class='simpleCart_quantity' id='cart-quantity'></div></li>
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
        <li class='nav-dropdown-menu'>
        <a href='#'>Products</a>
        <ul class='dropdown-links'>
            <li><a href='products.php?CatID=1'></a> Cobra Machines</li>
            <li><a href='products.php?CatID=2'></a> Leather Splitters</li>
            <li><a href='products.php?CatID=3'></a> Motors</li>
            <li><a href='products.php?CatID=4'></a> Reducers</li>
            <li><a href='products.php?CatID=5'></a> Accessories</li>
            <li><a href='products.php?CatID=6'></a> Needles and Thread</li>
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
                <a href=''>
                <li>10 Ton Clicker</li>
                </a>
                <a href=''>
                <li>5110 Post Machine</li>
                </a>
                <a href=''>
                <li>5550 BB Single Needle Boot Top Machine</li>
                </a>
                <a href=''>
                <li>8810 Post Machine</li>
                </a>
                <a href=''>
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
                <a href=''>
                <li>Class 4-P Premium Package</li>
                </a>
                <a href=''>
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
<footer>
    <div class='container-fluid p-5'>
        <div class='footer-links'>
            <div class='row'>
                <div class='col'>
                    <h4 class='orange'>Need Help?</h4>
                    <ul class='footer-links-list'>
                        <li><a href='#'>Contact Us</a></li>
                        <li><a href='#'>Track Order</a></li>
                        <li><a href='#'>Shipping & Returns</a></li>
                        <li><a href='#'>Tech Articles</a></li>
                        <li><a href='#'>Installation Instructions</a></li>
                        <li><a href='#'>Regulatory Compliance</a></li>
                        <li><a href='#'>Promo Exclusions</a></li>
                    </ul>
                </div>
                <div class='col'>
                    <h4 class='orange'>Quick Links</h4>
                    <ul class='footer-links-list'>
                        <li><a href='#'>My Account</a></li>
                        <li><a href='#'>Gift Cards</a></li>
                        <li><a href='#'>Catalog Request</a></li>
                        <li><a href='#'>ATK Answers</a></li>
                        <li><a href='#'>Digital Catalog</a></li>
                        <li><a href='#'>E-Mail Signup</a></li>
                    </ul>
                </div>
                <div class='col'>
                    <h4 class='orange'>About Us</h4>
                    <ul class='footer-links-list'>
                        <li><a href='#'>Contact Us</a></li>
                        <li><a href='#'>Track Order</a></li>
                        <li><a href='#'>Shipping & Returns</a></li>
                        <li><a href='#'>Tech Articles</a></li>
                        <li><a href='#'>Installation Instructions</a></li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>
</footer>
<script
  src='https://code.jquery.com/jquery-3.3.1.min.js' integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src='js/app.js'</script>

";
?>

