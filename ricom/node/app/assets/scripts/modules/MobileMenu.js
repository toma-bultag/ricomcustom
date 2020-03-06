

jQuery(document).ready(function( $ ) {
	//mobileMenu
    $( ".burger" ).click(function() {
        $( ".header-7__nav" ).toggleClass( "expanded" );
    });

    $( ".menu-item-has-children" ).click(function() {
        $( this ).toggleClass( "expanded" );
        $( ".sub-menu", this ).toggleClass( "expanded" );
    });

    $( ".nav-trigger" ).click(function() {
        $( ".header-9" ).toggleClass( "visible" );
    });

    $( ".nav-trigger__menu" ).click(function() {
        $( ".header" ).toggleClass( "overflow" );
    });
});
