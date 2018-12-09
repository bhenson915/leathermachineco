<?php
session_start();
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

    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">SubTotal</td>
                    </tr>
                    <tr>
                        <td class="item-quantity"></td>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="page-header">
            <h1>Products
            <div style="float: right; cursor: pointer;">
                <span class="my-cart-icon"><i class='fas fa-shopping-cart'></i></span>
            </div>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-3 text-center">
                <img src="img/products/cobraMachines/class425.jpg" width="150px" height="150px">
                <br>
                product 1 - <strong>$10</strong>
                <br>
                <button class="btn btn-primary my-cart-btn" data-id="1" data-name="product 1" data-summary="summary 1" data-price="10" data-quantity="1" data-image="img/products/cobraMachines/class425.jpg">Add to Cart</button>
                <a href="#" class="btn btn-cta">Details</a>
            </div>

            <div class="col-md-3 text-center">
                <img src="img/products/cobraMachines/class425.jpg" width="150px" height="150px">
                <br>
                product 2 - <strong>$20</strong>
                <br>
                <button class="btn btn-primary my-cart-btn" data-id="2" data-name="product 2" data-summary="summary 2" data-price="20" data-quantity="1" data-image="img/products/cobraMachines/class425.jpg">Add to Cart</button>
                <a href="#" class="btn btn-cta">Details</a>
            </div>

            <div class="col-md-3 text-center">
                <img src="img/products/cobraMachines/class425.jpg" width="150px" height="150px">
                <br>
                product 3 - <strong>$30</strong>
                <br>
                <button class="btn btn-primary my-cart-btn" data-id="3" data-name="product 3" data-summary="summary 3" data-price="30" data-quantity="1" data-image="img/products/cobraMachines/class425.jpg">Add to Cart</button>
                <a href="#" class="btn btn-cta">Details</a>
            </div>

            <div class="col-md-3 text-center">
                <img src="img/products/cobraMachines/class425.jpg" width="150px" height="150px">
                <br>
                product 4 - <strong>$40</strong>
                <br>
                <button class="btn btn-primary my-cart-btn" data-id="4" data-name="product 4" data-summary="summary 4" data-price="40" data-quantity="1" data-image="img/products/cobraMachines/class425.jpg">Add to Cart</button>
                <a href="#" class="btn btn-cta">Details</a>
            </div>

            <div class="col-md-3 text-center">
                <img src="img/products/cobraMachines/class425.jpg" width="150px" height="150px">
                <br>
                product 5 - <strong>$50</strong>
                <br>
                <button class="btn btn-primary my-cart-btn" data-id="5" data-name="product 5" data-summary="summary 5" data-price="50" data-quantity="1" data-image="img/products/cobraMachines/class425.jpg">Add to Cart</button>
                <a href="#" class="btn btn-cta">Details</a>
            </div>
        </div>

        <div class="simpleCart_items"></div>

    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Password</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
            
            </div>
        </div>
    </div>
    </div>

    
        


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      currencySymbol: '$',
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',
      affixCartIcon: true,
      showCheckoutModal: true,
      numberOfDecimals: 2,
      cartItems: [
        {id: 1, name: 'product 1', summary: 'summary 1', price: 10, quantity: 1, image: 'images/img_1.png'},
        {id: 2, name: 'product 2', summary: 'summary 2', price: 20, quantity: 2, image: 'images/img_2.png'},
        {id: 3, name: 'product 3', summary: 'summary 3', price: 30, quantity: 1, image: 'images/img_3.png'}
      ],
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      afterAddOnCart: function(products, totalPrice, totalQuantity) {
        console.log("afterAddOnCart", products, totalPrice, totalQuantity);
      },
      clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
        console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
      },
      checkoutCart: function(products, totalPrice, totalQuantity) {
        var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
        checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
        $.each(products, function(){
          checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);
        });
        alert(checkoutString)
        console.log("checking out", products, totalPrice, totalQuantity);
      },
      getDiscountPrice: function(products, totalPrice, totalQuantity) {
        console.log("calculating discount", products, totalPrice, totalQuantity);
        return totalPrice * 0.5;
      }
    });

    $("#addNewProduct").click(function(event) {
      var currentElementNo = $(".row").children().length + 1;
      $(".row").append('<div class="col-md-3 text-center"><img src="images/img_empty.png" width="150px" height="150px"><br>product ' + currentElementNo + ' - <strong>$' + currentElementNo + '</strong><br><button class="btn btn-danger my-cart-btn" data-id="' + currentElementNo + '" data-name="product ' + currentElementNo + '" data-summary="summary ' + currentElementNo + '" data-price="' + currentElementNo + '" data-quantity="1" data-image="images/img_empty.png">Add to Cart</button><a href="#" class="btn btn-info">Details</a></div>')
    });
  });
  </script>
    <script src="js/simpleCart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="js/app.js"></script>
          
</body>
</html>