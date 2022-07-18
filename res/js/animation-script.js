$(document).ready(function() {

    var serverTime = parseInt($("#hiddenTime").val());
    var tempTime = new Date($("#hiddenStartTime").val());
    var startTime = tempTime.getTime() / 1000;
    var duration = parseInt(parseFloat($("#hiddenDuration").val()) * 3600);

    var temp;

    function toggleClasses() {
        $("#BiddingBox1").toggleClass("BoxAnimation1");
        $("#BiddingBox2").toggleClass("BoxAnimation2");
        $("#BiddingBox3").toggleClass("BoxAnimation3");
        $("#BiddingBox4").toggleClass("BoxAnimation4");
        $("#BiddingBox5").toggleClass("BoxAnimation5");
        $("#BiddingBox6").toggleClass("BoxAnimation6");
        $("#BiddingBox7").toggleClass("BoxAnimation7");

        $("#BoxHighestBid1").toggleClass("SpanAnimation1");
        $("#BoxHighestBid2").toggleClass("SpanAnimation2");
        $("#BoxHighestBid3").toggleClass("SpanAnimation3");
    };

    $("#post").click(function() {
        var productID = $("#productID").html();
        var userID = $("#userID").html();
        var amount = decodeBid($("#bid").val());
        $("#hiddenOutput").load("res/db-queries/placeBid.php?userID=" + userID + "&productID=" + productID + "&amount=" + amount, function() {

            document.getElementById("timeOutCircle").setAttribute("class", "circleAnimate");
            $('#post').css('cursor', 'not-allowed');
            $('#post').attr("disabled", true);
            $("#timeLeftArea").css("display", "none");
            $("#countDownText").css("display", "block");

            var countDownInterval = setInterval(function() {
                var countDownText = parseInt($("#countDownText").html());
                if (countDownText === 0) {

                    $('#post').attr("disabled", false);
                    
                    $('#post').css('cursor', 'pointer');
                    $("#countDownText").html("3");
                    document.getElementById("timeOutCircle").setAttribute("class", "");
                    $("#countDownText").css("display", "none");
                    $("#timeLeftArea").css("display", "block");
                    clearInterval(countDownInterval);
                } else {
                    $("#countDownText").html(countDownText - 1);
                }

            }, 1000);
        })

    })

    function decodeBid(bid) {
        var len = bid.length;
        if (bid.substring(len - 1, len) == 'k') {
            bid = bid.substring(0, len - 1) * 1000;
        }
        return bid;
    }


    function Main() {
        $(".Button").attr("disabled", true);
        balancing();
        toggleClasses();
        setTimeout(function() { changeText() }, 500);
        setTimeout(function() { toggleClasses() }, 500);
        setTimeout(function() { $(".Button").attr("disabled", false) }, 500);
    };

    function changeText() {
        var i;
        for (i = 4; i > 1; i--) {
            var x = i - 1;
            $("#BoxHighestBid" + i).text($("#BoxHighestBid" + x).html());
        };
        $("#BoxHighestBid1").text(temp);
    };

    function balancing() {
        //temp = $("#BoxHighestBid4").html();
        $("#BoxHighestBid4").text("");
    }



    //Check Database Every Second
    var updateEverySecond = setInterval(function() {

        var productID = $("#productID").html();
        $("#hiddenOutput").load("res/db-queries/getBiddings.php?productID=" + productID, function() {

            var newFirst = $("#hidden1").val();
            var prevFirst = $('#BoxHighestBid1').html();
            if (newFirst !== prevFirst) {

                $('#BoxHighestBid1').html($('#hidden2').val());
                $('#BoxHighestBid2').html($('#hidden3').val());
                $('#BoxHighestBid3').html($('#hidden4').val());

                temp = newFirst;
                Main();
            }

            serverTime++;
            var timeLeft = startTime + duration - serverTime;
            var min = parseInt(timeLeft / 60);
            var sec = parseInt(timeLeft % 60);
            $("#timeLeft").html(min + ":" + sec);

            if (timeLeft === 0) {
                clearInterval(updateEverySecond);
                compileResult();
            }

        });
    }, 1000);

    function compileResult() {
        $("#biddingArea").html("Compliling Results");
    }

});