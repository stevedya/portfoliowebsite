$(document).ready(function () {
    //ISOTOPE Grid for portfolio page
    var $grid =  $('.grid').isotope({
        // options
        itemSelector: '.grid-item',
    });
    // layout Isotope after each image loads
    $grid.imagesLoaded().progress( function() {
        $grid.isotope('layout');
    });
    // filter items on button click
    $('.filter-button-group').on( 'click', 'button', function() {
        //add the data-filter attr
        var filterValue = $(this).attr('data-filter');
        //add active class and remove old
        $(this).parents('.button-group').children().removeClass('active');
        $(this).addClass('active');
        $grid.isotope({
            filter: filterValue
        });
    });

    //overlay animation
    $('.portfolio-card').on('mouseenter', function () {
        $(this).children('.portfolio-overlay').animate({
            top: '0',
            opacity: 0.9
        }, 400);
        $(this).children('img').addClass('enlarge-img');
    });
    //overlay animation
    $('.portfolio-card').on('mouseleave', function () {
        $(this).children('.portfolio-overlay').animate({
            top: '300px',
            opacity: 0
        }, 400);
        $(this).children('img').removeClass('enlarge-img');
    });
});
