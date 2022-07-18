$(document).ready(function() {

    $('.registerAccount').click(function() {
        $("#registerText").css("display", "none");
        $("#signinText").css("display", "block");
        $("#signinForm .formContent").fadeOut(1000);
        $("#registerForm .formContent").fadeIn(1000);
        $(".movingBackground").animate({
            left: "-=70%"
        }, 1000);
    });

    $('.signinAccount').click(function() {
        $("#signinText").css("display", "none");
        $("#registerText").css("display", "block");
        $("#signinForm .formContent").fadeIn(1000);
        $("#registerForm .formContent").fadeOut(1000);
        $(".movingBackground").animate({
            left: "+=70%"
        }, 1000);
    });
    
    $("#openRegister").click(function() {
        $("#signinForm .formContent").fadeOut(500);
        $("#registerForm .formContent").fadeIn(1000);
    });
    $("#openSignin").click(function() {
        $("#registerForm .formContent").fadeOut(500);
        $("#signinForm .formContent").fadeIn(1000);
    });

    //Forgot Password//
    $("#openModal").click(function() {
        $("#myModal").fadeIn(500);
    });

    $("#closeModal").click(function() {
        $("#myModal").fadeOut(500);
        $(".modal-body form").addClass("hidden");
        $("#userVerification").removeClass("hidden");
    });

    $("#UserPass").click(function() {
        var user = $("#resetUser").val();
        if (user !== '') {
            $("#hiddenArea").load("res/db-queries/getEmail.php?user=" + user, function() {

                var status = $("#emailStatus").val();
                if (status == "no") {
                    $("#changeError").html("No such Username Exist");
                    $("#changeError").css("display", "block");
                } else {
                    $("#userVerification").addClass("hidden");
                    $("#emailVerification").removeClass("hidden");
                    $("#forgotEmail").html(encodeEmail(status));
                }

            })
        }
    })

    $("#EmailPass").click(function() {

        var enteredEmail = $("#resetEmail").val();
        if (enteredEmail !== '') {
            var email = $("#emailStatus").val();


            if (email == enteredEmail) {
                $("#emailVerification").addClass("hidden");
                $("#codeVerification").removeClass("hidden");
            } else {
                $("#changeError").html("Wrong Email Entered");
                $("#changeError").css("display", "block");
            }
        }

    })

    $("#forgotResend").click(function() {
        //Six Digit Code
        var code = Math.floor(Math.random() * 900000 + 100000);
        var email = $("#emailStatus").val();
        var name = $("#nameStatus").val();

        var uri = encodeURI("res/sendmail/sendCode.php?code=" + code + "&name=" + name + "&email=" + email);
        $("#hiddenArea").load(uri, function() {
            if ($("#mailSentStatus").val() == code) {
                $('#forgotResend').prop('disabled', true);
            } else {
                alert($("Server Error").val());
            }
        });

    })

    $("#CodePass").click(function() {
        var code = $("#resetCode").val();
        if (code !== '') {
            var c = $("#mailSentStatus").val();
            if (code == c) {
                $("#codeVerification").addClass("hidden");
                $("#resetPassword").removeClass("hidden");
            } else {
                $("#changeError").html("Incorrect Code Entered");
                $("#changeError").css("display", "block");
            }
        }

    })

    $("#ChangePass").click(function() {
        var user = $("#resetUser").val();
        var pass1 = $("#resetPass1").val();
        var pass2 = $("#resetPass2").val();
        if (pass1 !== '' && pass2 !== '') {
            if (pass1 == pass2) {
                $("#hiddenArea").load("res/db-queries/changePassword.php?user=" + user + "&pass=" + pass1, function() {
                    if ($("#changePassStatus").val() == "yes") {
                        alert("Changed");
                    } else {
                        alert("Not Changed");
                    }
                });
            } else {
                $("#changeError").html("Password Not same");
                $("#changeError").css("display", "block");
            }
        }
    })

    //Forgot Password
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

    $('#register').click(function() {
        var firstname = $('#firstnameR').val();
        var email = $('#emailR').val();
        var username = $('#usernameR').val();
        var password = $('#passwordR').val();
        var password2 = $('#password2R').val();

        if (!(firstname === '' || email === '' || username === '' || password === '' || password2 === '')) {
            firstname = firstname.charAt(0).toUpperCase() + firstname.slice(1);
            if (firstname.length > 10 || username.length > 10) {
                $("#registerError").html("Length of username or firstname exceed Limits");
                $("#registerError").css("display", "block");
                
            }else if ( (/\s/.test(firstname)) || (/\s/.test(username)) ) {
                $("#registerError").html("No space allowed in username and firstname");
                $("#registerError").css("display", "block");
                
            } else if (password != password2) {
                $("#registerError").html("Passwords Entered are not same");
                $("#registerError").css("display", "block");
            } else {

                var uri = encodeURI('res/db-queries/register.php?fname=' + firstname + '&user=' + username + '&email=' + email + '&pass=' + password);

                $('#hiddenArea').load(uri, function(response, status, xhr) {
                    if (status == "error") {
                        var msg = "Sorry but there was an error: ";
                        alert(msg + xhr.status + " " + xhr.statusText);
                    } else {
                        var alreadyExist = $('#alreadyExist').val();

                        if (alreadyExist == "yes") {
                            $("#registerError").html("Username Already Exist");
                            $("#registerError").css("display", "block");
                        } else {
                            var emailAlreadyRegistered = $('#emailAlreadyR').val();
                            if (emailAlreadyRegistered == "yes") {
                                $("#registerError").html("Email Already Registered");
                                $("#registerError").css("display", "block");
                            } else {

                                var registered = $('#registered').val();
                                if (registered == "yes") {
                                    window.open('home.php', '_self');
                                } else {
                                    $("#registerError").html("Couldn't register. Try Again");
                                    $("#registerError").css("display", "block");
                                }
                            }

                        }

                    }
                });

            }

        }

    });

    if (screen.width > 1224) {
        $('#hiddenArea3').load('res/php/updateTime.php', function() {

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

    function encodeEmail(email) {
        var longerStr = "*****************************************************";
        var len = email.length;
        var startLen = len / 6;
        var endLen = len / 3;
        var newStr = email.substring(0, startLen) + longerStr.substring(0, len - startLen - endLen) + email.substring(len - endLen, len);
        return newStr;
    }

    

});