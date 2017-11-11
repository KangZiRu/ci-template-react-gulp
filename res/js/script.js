"use strict";

$(document).ready(function () {
    $("[data-modal").on("modalClosed", function () {
        $(this).anderlyne("clearInput");
    });

    $("input[type='datetime']").datetimepicker({
        controlType: 'select',
        oneLine: true,
        timeFormat: 'hh:mm tt'
    });

    if ($.browser['mozilla'] == true) {
        $("input[type='date']").datepicker({
            dateFormat: "yy-mm-dd"
        });
    }
});