  $('.accordion-faqs-content').on('click', '.accordion-faqs-control', function(e){ // When clicked
    e.preventDefault();                    
    $(this)                                
      .next('.accordion-faqs-panel')      
      .not(':animated')                   
      .slideToggle();                     
  });