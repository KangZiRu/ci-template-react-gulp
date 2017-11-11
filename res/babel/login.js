$("#login").submit(function(e) {
    let formData = new FormData(this);

    $.ajax({
        url: base + "account/login",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: response => {
            const res = JSON.parse(response);

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
