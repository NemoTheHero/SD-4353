(function() {
    $('form > input').keyup(function() {

        var empty = false;
        $('form > input').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) {
            $('#quote-submit').attr('disabled', 'disabled');
        } else {
            $('#quote-submit').removeAttr('disabled');
        }
    });
})()