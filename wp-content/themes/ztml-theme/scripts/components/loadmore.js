jQuery(function ($) {
    let lastPost = $(".main-content .post:last")[0];

    let dataRequest = {
        action: 'loadmore',
        offset: 3,
        exclude: $('.main-content').attr('id'),
    }
    let offset = 9;

    const observer = new IntersectionObserver(
        ([entry]) => {
            if (entry.isIntersecting) {
                $.ajax({
                    type: 'POST',
                    url: ajax.ajaxurl,
                    data: dataRequest,
                    beforeSend: function(){
                        $('.loading-posts').addClass('active');
                    },
                    success: function (data) {
                        if (data) {
                            dataRequest.offset += offset;

                            $(lastPost).after(data);
                            observer.unobserve(lastPost);
                            lastPost = $(".main-content .post:last")[0];
                            $('.loading-posts').removeClass('active');
                            observer.observe(lastPost);
                        }else{
                            observer.unobserve(lastPost);
                            $('.loading-posts').removeClass('active');
                        }
                    }

                });
            }
        },
        {
            root: null,
            rootMargin: "10px",
            threshold: 0.1,
        }
    );

    observer.observe(lastPost);


});

