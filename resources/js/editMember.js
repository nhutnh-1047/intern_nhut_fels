$(document).ready(function () {
    $('form').submit(function (e) {
        e.preventDefault();
    });
    $('form').validate({
        rules: {
            "name": {
                required: true
            },
            "phone": {
                required: true
            },
            "address": {
                required: true
            },
            "password": {
                required: true
            },
            "repassword": {
                equalTo: "#password",
                required: true
            }
        },
        submitHandler: function (form) {
            let idMember = $('#idMember').val();
            let name = $('.name').val();
            let address = $('.address').val();
            let phone = $('.phone').val();
            let password = $('.password').val();
            let repassword = $('.repassword').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: `/admin/member/edit/${idMember}`,
                data: {
                    name: name,
                    phone: phone,
                    address: address,
                    password: password,
                }
            }).done(function (success) {
                alert(success.alert);
                window.location.href = "/admin";
            }).fail(function (error) {
                alert(error.alert);
            });;
        }
    });

});
