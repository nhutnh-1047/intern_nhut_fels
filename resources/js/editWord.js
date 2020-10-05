$(document).ready(function () {
    $('form').submit(function (e) {
        e.preventDefault();
    });
    $('form').validate({
        rules: {
            "title": {
                required: true
            }
        },
        submitHandler: function (form) {
            let idWord = $('#idWord').val();
            let word_eng = $('.word_eng').val();
            let word_vi = $('.word_vi').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: `/admin/word/edit/${idWord}`,
                data: {
                    word_eng: word_eng,
                    word_vi: word_vi
                }
            }).done(function (success) {
                alert(success.alert);
                window.location.href = "/admin";
            }).fail(function (error) {
                alert(error.alert);
            });
        }
    });

});
