jQuery(function ($) {
    $(document.body).on('service.submitForm', {},
        // Bind submit handler for service saving.
        function (event, $panel, data) {
            if ($panel.find('input[name=type]:checked').val() == 'package') {
                data.push({name: 'sub_services[]', value: $panel.find('.bookly-js-package-sub-service').val()});
            }
        }
    );
});