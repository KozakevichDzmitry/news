jQuery(document).ready(function ($) {

    const ajaxRequest = (args, cb) =>
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: {...dataRequest, ...args},
            type: "POST",
            success: (data) => cb(data),
        });

    $.datepicker.setDefaults($.datepicker.regional.ru);

    const resetCalendar = $(".datepicker-toggle .datepicker-reset-button");

    let last_date = null;

    const dataRequest = {
        action: "news_posts_load",
        load: 27,
        offset: 27,
    };

    resetCalendar.on("click", () => {
        last_date = null;

        dataRequest.offset = 0;
        ajaxRequest({date: null}, (data) => {
            resetCalendar.hide();

            if (data) {
                const {posts, count} = JSON.parse(data);


                $(".main-content .ta-list").empty();
                $(".main-content .ta-list").append(posts);

                dataRequest.offset += dataRequest.load;

            }
        });
    });


    $("#exchange-rates").datepicker({
        showOn: "both",
        changeYear: true,
        dateFormat: "yy-mm-dd",
        minDate: $("#exchange-rates").data("min-date"),
        maxDate: $("#exchange-rates").data("max-date"),

        onSelect: (date) => {
            last_date = date;
            dataRequest.offset = 0;
            ajaxRequest(
                {
                    date,
                },
                (data) => {
                    const {posts, count} = JSON.parse(data);
                    resetCalendar.show();

                    if (count <= dataRequest.offset + dataRequest.load) {
                        $(".load-moree-btn").hide();
                    } else {
                        $(".load-moree-btn").show();
                    }

                    $(".main-content .ta-list").empty();
                    $(".main-content .ta-list").append(posts);

                    dataRequest.offset += dataRequest.load;
                    $(".load-moree-btn button").attr("data-all-posts", count);
                }
            );
        },
    });
});

