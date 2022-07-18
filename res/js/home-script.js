$(function() {

    

    $("#startButton").mouseover(function() {
        $("#chevronRight").fadeIn(500);
    })

    $("#startButton").mouseleave(function() {
        $("#chevronRight").fadeOut(500);
    })

    $("#startButton").click(function() {
        window.location.href = 'product.php';
    })

    //Include Header and Footer
    var includes = $('[include]');

    $.each(includes, function() {
        var file = 'res/include/' + $(this).attr("include") + '.html';
        $(this).load(file, function() {
            $("#hHome").addClass("active");
        });
    })
});