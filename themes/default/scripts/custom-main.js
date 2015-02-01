$(document).ready(function() {

    /* open up dialogue box to login */
    $('#login').click(function() {
        var status = $(this).attr('status');
        if (parseInt(status) === 1)
        {
            //$(this).attr('status', 2);
            //$(this).html('Logout');
            $('#login-modalBox').modal('show');
        }
        else if (parseInt(status) === 2)
        {
            //$(this).attr('status', 1);
            //$(this).html('ola Sandy!');
            /* ajax request for logout */
            $.post("",
                    {
                        submit: 'logout-user'
                    },
            function(data)
            {
                window.location.reload();
            });
        }
    });

    /* for hiding screen-message */
    try {
        $("#screen-messages .customalert").delay(3000).fadeOut(600);
    }
    catch (e)
    {

    }

    /* for liking the blog */
    $('#like').click(function() {
        var bid = $(this).attr('bid');
        $.post("",
                {
                    submit: 'like-blog',
                    bid: bid
                },
        function(data) {
            var response = $.parseJSON(data);
           console.log(response.data);
            if (response.success === true)
            {
                /* change the button color */
                window.location.reload();
            }
            else
            {
               window.location.reload();
            }
        });
    });

});