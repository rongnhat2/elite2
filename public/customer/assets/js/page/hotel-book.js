// View
const View = {
    FormData: {
        getVal(){
            var fd = new FormData();
            var required_data = [];
            var onPushData = true;
            const noTag = /(<([^>]+)>)/ig;
            const noScript = /(<\s*script[^>]*>(.*?)<\s*\/\s*script>)/ig;

            var data_name        = $('.data-name').val().replace(noTag, ""); 
            var data_email        = $('.data-email').val().replace(noTag, ""); 
            var data_telephone    = $('.data-phone').val().replace(noTag, ""); 
            var data_meta    = localStorage.getItem("hotel"); 

            // --Required Value
            if (data_name == '') { required_data.push('Nhập tên.'); onPushData = false }
            if (IndexView.Config.isEmail(data_email) == null || data_email == '') { required_data.push('Nhập Email.'); onPushData = false }
            if (data_telephone == '') { required_data.push('Nhập số điện thoại.'); onPushData = false } 

            if (onPushData) {
                fd.append('data_name', data_name); 
                fd.append('data_email', data_email);  
                fd.append('data_telephone', data_telephone);   
                fd.append('data_meta', data_meta);  
                return fd;
            }else{
                $('.noti .js-errors').remove();
                var required_noti = ``;
                for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                $('.noti').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                return false;
            }
        },
        onPush(callback){ 
            $(document).on('click', `.send-form-data`, function() {
                callback();
            }); 
        },
    },
    Carousel:{ 
        feature: {  
            init(){
                $("#feature-carousel")
                    .append(``)
                $('#feature-carousel').owlCarousel({
                    loop: true,
                    nav: true,
                    // dots: true,
                    // autoplay: true,
                    // autoplayTimeout: 7000,
                    autoWidth: false, 
                    lazyLoad: false,
                    margin: 0,
                    responsive:{
                        0:{
                            items: 1, 
                        }, 
                        675:{
                            items: 1,
                        },
                        767:{
                            items: 1, 
                        },
                        991:{
                            items: 1, 
                        },
                        1279:{
                            items: 1,
                        },
                        1280:{
                            items: 1,
                        }
                    }
                })
            }
        },
    },
    init(){
        View.Carousel.feature.init();
    }
};
// Controller
(() => { 
    View.init()

    function init(){
        var hotel = JSON.parse(localStorage.getItem("hotel"));
        $(".form-book-wrapper .datestart").val(hotel.hotel.datestart)
        $(".form-book-wrapper .dateend").val(hotel.hotel.dateend)
        $(".form-book-wrapper .room").val(hotel.hotel.room)
        $(".form-book-wrapper .time").val(hotel.hotel.time)
        $(".form-book-wrapper .prices").val(hotel.hotel.prices)
        let count_price = 0;
        JSON.parse(hotel.hotel.roomdata).map(v => {
            count_price -= -JSON.parse(v).room_prices;
            Api.Room.GetOne(JSON.parse(v).room_id)
                .done(res => {
                    $(".hotel-data-room")
                        .append(`<div class="room-item">
                                    <div class="room-name">
                                        <span>Loại phòng</span> ${res.data.name}
                                    </div>
                                    <div class="room-prices">
                                        <span>Đơn giá</span> ${IndexView.Config.formatPrices(JSON.parse(v).room_prices) + " đ"} 
                                    </div>
                                </div>`)
                })
        })
        $(".count_prices").val(count_price)
    }

    View.FormData.onPush( () => { 
        var fd = View.FormData.getVal();
        if (fd) {
            Api.Message.Sending(fd)
                .done(res => { 
                    if (res.status == 201) {
                        window.location.replace("/booking-success");
                    }else{
                        $('.noti').prepend(` <ul class="js-errors">Có lỗi sảy ra</ul> `)
                    }
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
        }
    })

    init();

})();