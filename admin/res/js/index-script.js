$(document).ready(function() {

    $("input").click(function() {
        $(".formError").css("display", "none");
    });

    $('#submit').click(function() {
        mainRun();
    });
    $('#password').keyup(function(event) {
        if (event.keyCode == 13) {
            mainRun();
        }
    });


    if (screen.width > 1224) {
        $('#hiddenArea3').load('../updateTime.php', function() {

            var serverTime = $('#hiddenArea3').html();

            serverTime = serverTime + '000';
            serverTime = parseInt(serverTime);
            setInterval(function() {
                serverTime = serverTime + 1000;
                var serverTimeString = new Date(serverTime);
                $('#timeSpace').html('' + serverTimeString);
            }, 1000);

        });
    }

    function mainRun() {

        var username = $('#username').val();
        var password = $('#password').val();

        if (!(username === '' || password === '')) {

            $('#hiddenArea').load('res/db-queries/login.php?user=' + username + '&pass=' + password, function(response, status, xhr) {
                if (status == "error") {
                    var msg = "Sorry but there was an error: ";
                    alert(msg + xhr.status + " " + xhr.statusText);
                } else {
                    var code = $('#hiddenCode').val();
                    if (code == "yes") {
                        window.open('home.php', '_self');
                    } else if (code == "no") {
                        $("#loginError").css("display", "block");
                    }
                }
            });
        }
    }

});