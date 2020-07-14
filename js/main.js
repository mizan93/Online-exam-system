$(document).ready(function () {
    //User Registration
    $('#regsubmit').click(function () { 
       
        var name = $('#name').val();
        var username = $('#username').val();
        var pass = $('#pass').val();
        var email = $('#email').val();
        $.ajax({
            method: "POST",
            url: "getregister.php",
            data: {
                name: name,
                username: username,
                pass: pass,
                email: email},
            success: function (data) {
                $('#regmsg').html(data);
            }
        });
        return false;
    });
    // $('#login_submit').click(function () { 
    //     var pass = $('#pass').val();
    //     var email = $('#email').val();
    //     $.ajax({
    //         method: "POST",
    //         url: "getlogin.php",
    //         data: {
    //             pass: pass,
    //             email: email},
    //         success: function (data) {
    //             if ($.trim(data) == "empty") {
    //                $('.empty').show();
    //                $('.disable').hide();
    //                $('.error').hide();
    //            } else if ($.trim(data) == "disable") {
    //                $('.disable').show();
    //                $('.disable').hide();
    //                $('.disable').hide();

    //             } else if ($.trim(data) == "error") {
    //                $('.error').show();
    //                $('.empty').hide();
    //                $('.disable').hide();

    //            } else {
    //                window.location = 'exam.php';
    //            }
    //         }
    //     });
    //     return false;
    // });
    
      
});