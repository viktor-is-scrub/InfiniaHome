/**
 * Created by Roso Home on 5/2/2016.
 */
$(function() {
    // Get the form.
    var form = $('#contact');

    // Get the messages div.
    var formMessages = $('#succ-err-msg');

    // TODO: The rest of the code will go here...

    $(form).submit(function(event) {
        // Stop auto-submit
        event.preventDefault();

        // TODO

        var fdata = $(form).serialize();
    });

    var fdata = $(form).serialize();





// Submit


// AJAX- begin
    $.ajax({
            type: 'POST',
            url: $(form).attr("action"),
            data: fdata
        })


        .done(function(response) {
            // Make sure that the formMessages div has the 'success' class.
            $(formMessages).removeClass('error');
            $(formMessages).addClass('success');

            // Set the message text.
            $(formMessages).text(response);

            // Clear the form.
            $('#name').val('');
            $('#email').val('');
            $('#message').val('');
        })

        .fail(function(data) {
            // Make sure that the formMessages div has the 'error' class.
            $(formMessages).removeClass('success');
            $(formMessages).addClass('error');

            // Set the message text.
            if (data.responseText !== '') {
                $(formMessages).text(data.responseText);
            } else {
                $(formMessages).text('Oops! An error occured and your message could not be sent.');
            }
        });


// Ajax - done


});

