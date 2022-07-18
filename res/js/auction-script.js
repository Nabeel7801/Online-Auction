$(function() {

    var serverTime = parseInt($("#hiddenTime").val());
    var temp = new Date($("#hiddenStartTime").val());
    var startTime = temp.getTime() / 1000;

    var diff = serverTime - startTime;

    var duration = parseInt(parseFloat($("#hiddenDuration").val()) * 3600);

    if (diff < 0 || diff > duration) {
        window.location.href = 'view.php';
    }

    //Include Header and Footer
    var includes = $('[include]');

    $.each(includes, function() {
        var file = 'res/include/' + $(this).attr("include") + '.html';
        $(this).load(file, function() {
            $("#hProducts").addClass("active");
        });
    })


    $("#bid").val(encodeBid($("#bid").val()));
    var minIncrement = parseInt($("#minIncrement").val());
    var minimumBid = parseInt(decodeBid($("#bid").val()));

    $("#bidDecrease").click(function() {
        var currentBid = parseInt(decodeBid($("#bid").val()));
        if (currentBid > minimumBid) {
            currentBid = currentBid - minIncrement;
            $("#bid").val(encodeBid(currentBid));
        }

    });

    $("#bidIncrease").click(function() {
        //var lastBid = parseInt($('#highestBidding').val());
        var currentBid = parseInt(decodeBid($("#bid").val()));

        currentBid = currentBid + minIncrement;
        $("#bid").val(encodeBid(currentBid));


    });

    $(".toggleButton").click(function() {
        $(this).siblings().removeClass("activeBtn").addClass("inactiveBtn");
        $(this).toggleClass("inactiveBtn").toggleClass("activeBtn");
        if ($(this).hasClass("inactiveBtn")) {
            $("#recordsQuery").css("display", "none");
        } else {
            $("#recordsQuery").css("display", "block");
        }
    })

    $("#recordsQuery").niceScroll({
        cursorcolor: "#333",
        cursorborder: "0px",
        cursorwidth: "8px",
        zindex: "9999"
    });

    $("#allBidding").click(function() {
        var productID = $("#productID").html();
        $("#recordsQuery").load("res/db-queries/getAllBidding.php?productID=" + productID);
    })


    $("#yourBidding").click(function() {
        var userID = $("#userID").html();
        var productID = $("#productID").html();
        $("#recordsQuery").load("res/db-queries/getYourBidding.php?userID=" + userID + "&productID=" + productID);
    })


    var s = "res/images/products/" + $('#productID').html() + "/";
    $("#slideshowInner").children().each(function() {
        $(this).attr("src", s + $(this).attr("id") + ".jpg");
    });

    //Slide Show
    var count = 1;
    setInterval(function() {
        if (count < 7) {
            $(".dotActive").removeClass("dotActive").next().addClass("dotActive");
            $("#slideshowInner .item").animate({
                right: "+=100%"
            }, 1000);
        } else {
            $(".dotActive").removeClass("dotActive");
            $("#slideshowInner .item").animate({
                right: "-=600%"
            }, 1000);
            $("#slideshowIndicators li:first-child").addClass("dotActive");
            count = 0;
        }
        count++;

        //Update the value for bidding every 5 seconds
        var highestBid = $("#highestBidding").val();
        if (highestBid - decodeBid($("#bid").val()) > minIncrement) {
            $("#bid").val(encodeBid(highestBid));
        }
        if (highestBid > 0) {
            minimumBid = highestBid;
        }


    }, 5000);

    function encodeBid(bid) {
        if (bid > 9999) {
            bid = bid / 1000 + "k";
        }
        return bid;
    }

    function decodeBid(bid) {
        var len = bid.length;
        if (bid.substring(len - 1, len) == 'k') {
            bid = bid.substring(0, len - 1) * 1000;
        }
        return bid;
    }

});