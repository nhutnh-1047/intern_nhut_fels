$(document).ready(function () {
    $('.change-status-word').click(function (e) {
        let thisClick = $(this);
        let idWord = $(this).val();
        let status = $(this).hasClass('btn-primary');
        let idUser = $('#user-id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PATCH",
            url: `/words/${idWord}`,
            data: {
                idWord: idWord,
                status: status,
                idUser: idUser
            },
            success: function (response) {
                if (status) {
                    $(thisClick).removeClass('btn-primary').addClass('btn-danger').text(response.alert);
                } else {
                    $(thisClick).removeClass('btn-danger').addClass('btn-primary').text(response.alert);
                }
            }
        });
    });
});
