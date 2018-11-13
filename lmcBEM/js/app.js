$(function(){

    /* Navigation Script */
      var navToggler;
  
      $(".navbar-toggler").on("click", function(){
          navToggler = $(this);
          var navigation = $(this).attr("data-target");
          $(navigation).toggle();
          $(navToggler).toggleClass("open").toggleClass("closed");
      });
  
      $(".dropdown-menu > a").on("click", function(e){
          e.preventDefault();
  
          var dropdownMenuSiblings = $(this).parent("li").siblings(".dropdown-menu");
          if(dropdownMenuSiblings.length > 0){
              $(dropdownMenuSiblings).each(function(){
                  var dropdownOpen = $(this).hasClass("open");
                  if(dropdownOpen == true){
                      var menuSelector = $(this).find("a").first();
                      toggleMenuItem(menuSelector);
                  }
              });
          }
  
          toggleMenuItem(this);
      });
  
      function toggleMenuItem( menu ) {
          var dropdown = $(menu).parent("li").toggleClass("open").toggleClass("closed").find("ul").first();
          dropdown.toggle();
      }
  
  });