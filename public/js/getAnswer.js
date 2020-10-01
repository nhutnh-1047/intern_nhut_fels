$(document).ready(function () {
    $('.form').submit(function (e) {
        e.preventDefault();
        let classQues = $('.question');
        let listUserChoose = [];
        for (let index = 0; index <= classQues.length; index++) {
            let selectedOption = $("input:radio[name=option" + index + "]:checked").val();
            listUserChoose.push(selectedOption);
        }
        let idPost = $('.idPost').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: `/lesson/${idPost}/exam`,
            data: {
                choose: listUserChoose,
                total: classQues.length,
                idPost: idPost
            },
            success: function (response) {
                alert(response.alert);
                if (response.success) {
                    window.location.href = "/mylessons";
                }
            }
        });
    });
});
