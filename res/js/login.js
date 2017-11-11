"use strict";

$("#login").submit(function (e) {
    var formData = new FormData(this);

    $.ajax({
        url: base + "account/login",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: function success(response) {
            var res = JSON.parse(response);

            if (res.status == true) {
                anderlyne.notifBar(res.message, 'good');
                window.location = base;
                return;
            }

            anderlyne.notifBar(res.message);
        }
    });

    e.preventDefault();
});