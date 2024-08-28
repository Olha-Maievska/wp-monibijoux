jQuery(document).ready(function($) {
    $('#newsletter_form').on('submit', function(event) {
        event.preventDefault();

        var form = $(this);
        var messageDiv = $('#newsletter_message');
        var submitButton = form.find('button[type="submit"]');

        submitButton.html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');

        $.ajax({
            type: 'POST',
            url: 'http://monibijoux.loc/?na=s',
            data: form.serialize(),
            success: function (response, status, xhr) {
                if (xhr.status === 200 || xhr.status === 201) {
                    messageDiv.html('<p class="success-message">Thank you for subscribing!</p>');
                    form[0].reset();
                } else {
                    messageDiv.html('<p class="error-message">Subscription failed. Please try again.</p>');
                    setTimeout(() => {
                        messageDiv.html('<p class="error-message"></p>');
                    }, 5000)
                }
                submitButton.html('Subscribe');
            },
            error: function() {
                messageDiv.html('<p class="error-message">An error occurred. Please try again later.</p>');
                submitButton.html('Subscribe');
            }
        });
    });
});