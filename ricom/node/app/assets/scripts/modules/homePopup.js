

jQuery(document).ready(function( $ ) {

    //home popup

     $( ".contact-us__item.phone" ).click(function() {
        $( ".contact-us__popup.phone" ).addClass( "visible" );
        $( ".contact-us" ).addClass( "visible" );
    });

     $( ".contact-us__item.mail" ).click(function() {
        $( ".contact-us__popup.mail" ).addClass( "visible" );
        $( ".contact-us" ).addClass( "visible" );
    });

     $( ".contact-us__item.address" ).click(function() {
        $( ".contact-us__popup.address" ).addClass( "visible" );
        $( ".contact-us" ).addClass( "visible" );
    });

     $( ".close" ).click(function() {
        $( ".contact-us__popup" ).removeClass( "visible" );
        $( ".contact-us" ).removeClass( "visible" );
    });

});
