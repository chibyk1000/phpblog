$(document).ready(function () {
    
    $('.loginfrm').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "./includes/login.inc.php",
            data: $(this).serialize(),
            dataType: "text",
            success: function (response) {
                if (response !== 'success') {
                    
                    $('.err').html(response)
                    return
                }

                location.href = '../';


            }
        });
    });
});