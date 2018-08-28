$(document).ready(function(){
    
    
    var honeypot = $('#your-email247htj');
    honeypot.hide();

    $('input[type="text"], input[type="email"]').on('focus', function(e){
      $(this).removeClass('fadeIn');
      $(this).addClass('rubberBand');
    });
    
    
});