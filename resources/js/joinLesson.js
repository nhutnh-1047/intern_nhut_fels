$(document).ready(function () {
    $('.join-class').click(function (e) {
        let idLesson = $(this).closest(".text-center").find("input[name=id-lesson]").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: `/join/lesson`,
            data: {
                idLesson: idLesson
            }
        });
    });
});
