$(document).ready(function() {
    $("#--nav-main li").click(function() {
        $(".main-item").hide();
        $("#" + $(this).attr("data-show")).show();

        $(this).siblings(".active").removeClass("active");
        $(this).addClass("active");
    });

    $(".search-bar").on("change", "select", function() {
        var parent = $(this).parent();
        console.log(parent);
        parent.find("input").val($(this).find("option[value='" + $(this).val() + "']").text());
    })


    $(".search-bar > input").keyup(function(e) {
        const parent = $(this).parent();
        const that = $(this);
        var $select = parent.find("select");

        if ($(this).val() == "") {
            $select.html('<option value=""></option>');
            return false;
        }

        $.ajax({
            url: parent.attr("data-source") + $(this).val(),
            type: "GET",
            success: response => {
                const res = JSON.parse(response);
                $select.html('<option value=""></option>' + res.data.map(value => `<option value="${value.id}">${value.name}</option>`));
            }
        })
    });

    // $("#--table-schedule").scroll(function() {
    //     const translate = `translate(0, ${this.scrollTop}px)`;
    //     $(this).find("thead").css("transform", translate);
    // });
});
