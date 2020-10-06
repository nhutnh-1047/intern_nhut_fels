$(document).ready(function () {
    $('form').submit(function (e) {
        e.preventDefault();
    });
    $('form').validate({
        rules: {
            "title": {
                required: true
            },
            "category": {
                required: true
            },
            "question_ids": {
                required: true
            },
            "description": {
                required: true
            }

        },
        submitHandler: function (form) {
            let idLesson = $('#idLesson').val();
            let category = $("#category option:selected").val();
            let question_ids = $('.question_ids').val();
            let description = CKEDITOR.instances.description.getData();
            let title = $('.title').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: `/admin/lesson/edit/${idLesson}`,
                data: {
                    category_id: category,
                    question_ids: question_ids,
                    description: description,
                    title: title
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
