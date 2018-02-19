$(document).ready(function () {
    //ISOTOPE Grid for portfolio page
    var $grid =  $('.grid').isotope({
        // options
        itemSelector: '.grid-item',
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
});
