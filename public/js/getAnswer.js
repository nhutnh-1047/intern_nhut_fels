$(document).ready(function() {
    $('.form').submit(function(e) {
        e.preventDefault();
        let classQues = $('.question');
        let listUserChoose = [];
        for (let index = 1; index <= classQues.length; index++) {
            let selectedOption = $("input:radio[name=option" + index + "]:checked").val();
            listUserChoose.push(selectedOption);
        }
        let idPost = $('.idPost').val();
        console.log(listUserChoose);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: `/lesson/${idPost}/ajax`,
            data: {
                choose: listUserChoose,
                total: classQues.length,
                id: idPost
            },
            success: function(response) {
                if (response) {
                    alert('Chúc mừng, bạn đã pass');
                    window.location.href = "/mylessons";
                } else {
                    alert('Thất bại, bạn hãy cố gắng lên nhé');
                }
            }
        });

    });


});