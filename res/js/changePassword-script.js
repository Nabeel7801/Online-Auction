$(document).ready(function () {
    $('#login').click(function () {
       login();
    });
    $('#password').keydown(function(e) {
        if (e.keyCode == 13) {
            login();
        }
    });

    $('#change').click(function () {
       change();
    });
    $('#pass2').keydown(function(e) {
        if (e.keyCode == 13) {
            change();
        }
    });
});



function login() {
    
    var userpass = $('#password').val();
    var username = $('#hiddenUsername').val();
    var upass = $('#passTrans').html();
    

    if (userpass.length === 0) {
        $('#loginCheck2').css('display','none');
        $('#loginCheck1').css('display','block');
    }else {
        if (userpass == upass) {
            $('#login-form').fadeOut(0);
            $('#change-form').delay(200).fadeIn("fast");
        }else {
            $('#loginCheck1').css('display','none');
            $('#loginCheck2').css('display','block');
        
        }
    }
}


function change() {
    var passOne = $('#pass1').val();
    var passTwo = $('#pass2').val();
    var username = $('#hiddenUsername').val();
    
    if (passOne.length === 0 || passTwo.length === 0) {
        $('#checkError2').css('display','none');
        $('#successMessage').css('display','none');
        $('#checkError1').css('display','block');
        if (passOne.length === 0) {
            $('#pass2').css('border','solid 2px rgba(255, 255, 255, 0.125)');
            $('#pass1').css('border','2px red solid');
        }else {
            $('#pass1').css('border','solid 2px rgba(255, 255, 255, 0.125)');
            $('#pass2').css('border','2px red solid');
        }
    }else {
        $('#pass1').css('border','solid 2px rgba(255, 255, 255, 0.125)');
        $('#pass2').css('border','solid 2px rgba(255, 255, 255, 0.125)');
        if (passOne == passTwo) {
            $('#checkError1').css('display','none');
            $('#checkError2').css('display','none');
            $('#successMessage').css('display','block');
            $('#pass1').val('');
            $('#pass2').val('');
            $('#alertHidden').load('changePassword-query.php?&code2=' + passOne + '&code1=' + username );
           
        }else {
            $('#checkError1').css('display','none');
            $('#successMessage').css('display','none');
            $('#checkError2').css('display','block');
        }
    }
}