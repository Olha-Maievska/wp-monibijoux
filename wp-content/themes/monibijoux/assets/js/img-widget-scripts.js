jQuery(document).ready(function($){
    function media_upload(button_class) {
        $(document).on('click', button_class, function(e) {
            e.preventDefault();
            var button = $(this);
            var custom_uploader = wp.media({
                title: 'Select Image',
                button: {
                    text: 'Use this image'
                },
                multiple: false
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                button.prev('.widefat').val(attachment.url).trigger('change');
            })
            .open();
        });
    }

    media_upload('.upload_image_button.button');
    media_upload('.upload_intro_image_button.button');
});