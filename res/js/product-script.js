$(window).load(function() {

    $("#products").load("res/db-queries/populateProducts.php", function() {
        $(".minBid").each(function() {
            var price = $(this).html().toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            $(this).html(price);
        });

        $(".view_button").click(function() {
            $("#hiddenCode").load("res/php/setProductSession.php?productID=" + $(this).attr("id"), function() {
                window.location.href = 'view.php';
            });
        });

        $("body").niceScroll({
            cursorcolor: "#333",
            cursorborder: "0px",
            cursorwidth: "8px",
            zindex: "9999"
        });
    });


    //Include Header and Footer
    var includes = $('[include]');

    $.each(includes, function() {
        var file = 'res/include/' + $(this).attr("include") + '.html';
        $(this).load(file, function() {
            $("#hProducts").addClass("active");
        });
    })


});