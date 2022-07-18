jQuery(document).ready(function() {

    var isLive = false;

    var serverTime = parseInt($("#serverTime").val());
    var temp = new Date($("#auctionDate").html());
    var startTime = temp.getTime() / 1000;

    var diff = serverTime - startTime;

    var duration = parseInt(parseFloat($("#duration").html()) * 3600);

    if (diff < 0) {
        isLive = false;
        $("#status").css("color", "red");
        $("#status").html("&bull; InActive");
    } else if (diff - duration < 0) {
        isLive = true;
        $("#status").css("color", "green");
        $("#status").html("&bull; Live");
    } else {
        isLive = false;
        $("#status").css("color", "red");
        $("#status").html("&bull; Expired");
    }



    var x;
    $(".scroll_left").click(function() {
        x = $('.otherImagesOuter').scrollLeft() - 250;
        $('.otherImagesOuter').animate({
            scrollLeft: x,
        })
    })
    $(".scroll_right").click(function() {
        x = 250 + $('.otherImagesOuter').scrollLeft();
        $('.otherImagesOuter').animate({
            scrollLeft: x,
        })
    })

    $("#bidNow").click(function() {
        if (isLive) {
            window.location.href = 'auction.php';
        } else {
            $("#bidNow").css("background-color", "gray");
            $(this).html("<i class='fa fa-lock'></i> Auction is not Live now");
            setTimeout(function() {
                $("#bidNow").css("background-color", "#12CCF8");
                $("#bidNow").html("Bid Now");
            }, 2000);
        }
    })

    $(".otherImageContainer").mouseenter(function() {
        var s = "res/images/products/" + $('#product_name').html() + "/" + $(this).attr('id') + ".jpg";
        $("#main_image").attr("src", s);
        $(this).addClass("otherActive");
        $(this).siblings().removeClass("otherActive");
    })

    var price = $("#basePrice").html().toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    $("#basePrice").html(price);

    var s = "res/images/products/" + $('#product_name').html() + "/";
    $(".otherImagesOuter").children().each(function() {
        $(this).children().children().attr("src", s + $(this).attr("id") + ".jpg");
    });
    $("#main_image").attr("src", s + "img.jpg");


    //Include Header and Footer
    var includes = $('[include]');

    $.each(includes, function() {
        var file = 'res/include/' + $(this).attr("include") + '.html';
        $(this).load(file, function() {
            $("#hProducts").addClass("active");
        });
    })


});