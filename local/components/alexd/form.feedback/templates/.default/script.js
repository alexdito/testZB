$(document).ready(function () {
    $("#sendResult").click(function() {
        $("#form-data").submit();
    });

    $("#closeErrors").click(function() {
        $(".errors").empty();
    });

    $('#form-data').submit(function () {
        var values = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: values,
            success: function (data) {
                if ($.parseJSON(data) == null) {
                    $('.errors').text('');
                    $('form').trigger('reset');
                    grecaptcha.reset();
                } else {
                    var obj = $.parseJSON(data);
                    $.each( obj, function( key, value ) {
                        $('.errors').append(value + "<br>");
                    });
                    $("#modalError").modal();

                }
            },
            error: function () {
                alert('ERROR');
            },
        });
        return false;
    });
});



