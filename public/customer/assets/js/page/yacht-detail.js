// View
const View = {
    Utilities: ["Gym", 
                "Kids Club", 
                "Hồ sinh thái", 
                "Nhà hàng",
                "Khu vui chơi",
                "Spa",
                "Giữ hành lý",
                "Bãi đậu xe",
                "Quầy lưu niệm",
                "Đưa đón sân bay",
                "Thang máy",
                "Dịch vụ giặt ủi",
                "Sân Golf",
                "Hồ bơ",
                "Thuê xe đạp",
                "Sân vườn",
                "Bar/Club/Pub",
                "Phòng Y tế",
                "Dọn phòng",
                "Xe điện",
                "Trà / Cafe / Nước",
                "Wifi",
                "Máy sấy tóc",
                "Phòng tắm đứng",
                "Điện thoại",
                "Bồn tắm nằm",
                "Phòng hội nghị",
                "Giặt là"], 
    Yacht: {
        render(data){
            $(".tour-detail-header").text(data.name);
            $(".hotel-name").text(data.name);
            $(".tour-name").append(data.location_name);
            data.images.split(",").map(v => {
                $(".tour-image-preview")
                    .append(`<div class="carousel-item-element"> <img src="/${v}" alt=""> </div>`)
            })
            View.Carousel.image.init();
            data.service.split(`\r\n`).map(v => {
                $(".services-content").append(`<p class="service-item">${v}</p>`)
            })
            $('.description-content').append(`<p class="overview">${data.description}</p>`)
            $(".info-map-wrapper").html(data.map)

            data.utilities.split(",").map(v => {
                $(".combo-content").append(`<p class="combo-item"><img src="/customer/assets/images/icon.png" alt="">${View.Utilities[v]}</p>`)
            })
            
            $(".image-banner").attr("src", `/${data.images.split(",")[0]}`)

            JSON.parse(data.detail)["timeline"]
                .map((v, k) => {
                $(".schedule-content")
                    .append(`<div class="schedule-wrapper" data-id="timeline-${k}">
                                <div class="schedule-title">
                                    <span>${v.name}</span>
                                    <i class="fas fa-caret-down"></i>
                                </div>
                                <div class="schedule-body">
                                    ${v.description}
                                </div>  
                            </div>`)
            })
            JSON.parse(data.policy)["services"]
                .map((v, k) => {
                $(".detail-data")
                    .append(`<h4 class="bold m-b-10">${k + 1}. ${v.name}</h4>
                            <div class="m-b-10">
                                <p>${v.description}</p> 
                            </div> `)
            })

            let policy = JSON.parse(data.vehicle)["policy"][0];
            $(".food-data").html(policy.food);
            $(".trans-data").html(policy.trans);
            $(".place-data").html(policy.place);
        }
    },
    Room: {
        onSelect(callback){
            $(document).on('click', '.room-item', function(event) {
                $(".room-item").removeClass("is-select")
                $(this).addClass("is-select")
                callback();
            });
        },
        onConfirm2(callback){
            $(document).on('click', '.form-confirm', function(event) {
                let room = $(".data-room").val();
                let man = $(".data-man").val();
                let chill = $(".data-chill").val();
                let baby = $(".data-baby").val();
                var hotel = JSON.parse(localStorage.getItem("hotel"));
                hotel.hotel.room = room;
                hotel.hotel.man = man;
                hotel.hotel.chill = chill;
                hotel.hotel.baby = baby;
                localStorage.setItem("hotel", JSON.stringify(hotel));
                callback();
            });
        },
        onConfirm(callback){
            $(document).on('click', '.room-confirm', function(event) {
                let room = $(".data-room").val();
                let man = $(".data-man").val();
                let chill = $(".data-chill").val();
                let baby = $(".data-baby").val();

                var hotel = JSON.parse(localStorage.getItem("hotel"));
                hotel.hotel.room = room;
                hotel.hotel.man = man;
                hotel.hotel.chill = chill;
                hotel.hotel.baby = baby;
                localStorage.setItem("hotel", JSON.stringify(hotel));
                callback();
            });
        },
        onRoomSelect(callback){
            $(document).on('click', '.room-order', function(event) {
                $(".room-item.is-select").attr("data-id", $(this).attr("data-id"))
                $(".room-item.is-select").attr("data-prices", $(this).attr("data-prices"))
                $(".room-item.is-select .data-init").html(`<p>${$(this).attr("data-name")}</p><p>${IndexView.Config.formatPrices($(this).attr("data-prices"))} đ</p>`)
                $(".room-item.is-select").addClass("is-done");
                View.Room.setPrices()
                callback();
            });
        },
        onOrder(callback){
            $(document).on('click', '.form-action', function(event) {
                var hotel = JSON.parse(localStorage.getItem("hotel"));
                if (hotel.hotel.prices != 0) {
                    hotel.hotel.room = $(".room-item.is-done").length
                    localStorage.setItem("hotel", JSON.stringify(hotel));
                    callback()
                }else{
                    $(".noti").text("Hãy nhập đủ các trường")
                }
            });
            
        },
        setPrices(){
            var hotel = JSON.parse(localStorage.getItem("hotel"));
            let data = [];
            let total_prices = 0;
            let time = hotel.hotel.time ?? 0;
            $(".room-item.is-done").each(function(index, el) {
                data.push(`{"room_id": "${$(this).attr("data-id")}", "room_prices": "${$(this).attr("data-prices")}"}`);
                total_prices -= -$(this).attr("data-prices");
            });
            $(".day-prices").html(`${IndexView.Config.formatPrices(total_prices)} đ`)
            $(".total-prices").html(`${IndexView.Config.formatPrices(time * total_prices)} đ`)
            hotel.hotel.roomdata = JSON.stringify(data);
            hotel.hotel.prices = time * total_prices;
            localStorage.setItem("hotel", JSON.stringify(hotel));
        },
        render(data){
            data.map(v => {
                let prices = v.discount == 0 ? v.prices : v.prices - (v.prices / 100 * v.discount);
                let discount = v.discount == 0 ? " " : `<div class="room-discount"> ${v.prices} đ</div>`;
                $('.hotel-room-list')
                    .append(`<div class="room-block">
                                <div class="room-image" style="background-image: url('/${v.image}');"></div> 
                                <div class="room-content">
                                    <h3 class="room-name">
                                        ${v.name}
                                    </h3>
                                    <div class="room-type">
                                        <div class="room-group-name">Loại phòng: </div>
                                        ${v.properties}
                                    </div>
                                    <div class="room-type">
                                        <div class="room-group-name">Dịch vụ: </div>
                                        ${v.services}
                                    </div>
                                    <div class="room-prices">
                                        <div class="room-group-name">Giá tiền: </div>
                                        ${IndexView.Config.formatPrices(prices)} đ ${IndexView.Config.formatPrices(discount)}
                                    </div> 
                                </div>
                            </div>`)
            })
        },
        init(){
            var hotel = JSON.parse(localStorage.getItem("hotel"))
            let room = hotel.hotel.room;
            let man = hotel.hotel.man;
            let chill = hotel.hotel.chill;
            let baby = hotel.hotel.baby;
            let datestart = hotel.hotel.datestart;
            let dateend = hotel.hotel.dateend;
            let time = hotel.hotel.time;

            $(".data-room").val(room);
            $(".data-man").val(man);
            $(".data-chill").val(chill);
            $(".data-baby").val(baby);

            $(".date-start").html(datestart ?? "");
            $(".date-end").html(dateend ?? "");
            $(".numberdays").html(time != 0 ? time : "");

            $(".room-list .room-item").remove();
                for (var i = 0; i < room; i++) {
                    $(".room-list").append(`<div class="room-item ${i==0 ? "is-select" : ""}">Phòng ${i+1}<div class="data-init"></div></div>`);
                }
            $(".client-select")
                .html(`<p>${room} phòng</p> <p>${man} người lớn, ${chill} trẻ em, ${baby} em bé</p>`)
            $(".hotel-element-people")
                .html(`<p>(Người lớn: ${man}, Trẻ em: ${chill}, Em bé: ${baby})</p>`)
            $(".room-size").html(`${room} Phòng`)
        }
    },
    Carousel:{ 
        image: {  
            init(){
                $('#image-carousel').owlCarousel({
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
                            items: 2, 
                            margin: 10,
                        },
                        991:{
                            items: 2, 
                            margin: 10,
                        },
                        1279:{
                            items: 3,
                            margin: 10,
                        },
                        1280:{
                            items: 3,
                            margin: 10,
                        }
                    }
                })
            }
        },
        testimonials: {  
            init(){
                $("#testimonials-carousel")
                    .append(`
                        <div class="carousel-item-element">
                            <a href="#" class="item-image" style="background-image: url('/customer/assets/images/blog-01.jpg')"></a>
                            <div class="item-desctiption-wrapper">
                                <ul class="star-list">
                                    <li><span class="fa fa-star checked"></span></li>
                                    <li><span class="fa fa-star checked"></span></li>
                                    <li><span class="fa fa-star checked"></span></li>
                                    <li><span class="fa fa-star checked"></span></li>
                                    <li><span class="fa fa-star checked"></span></li>
                                </ul>
                                <div class="item-title">
                                    "Bữa tiệc Team Building tuyệt vời cùng Elite Tour"
                                </div>
                                <div class="item-desctiption">
                                    Ban Tài Chính Kế Toán AIC Group đã cùng tổ chức Team Building với Elite Tour tại Resort Emeralda Ninh Bình trong không khí vui vẻ và đã có những hoạt động vui chơi giải trí hấp dẫn
                                </div>
                                <div class="item-name">Hồng Hạnh</div>
                                <div class="item-tour">Đi <a href="">Mù Cang Chải</a>  29/09/2022 4:32:52 CH</div>
                            </div>
                        </div>`)
                $('#testimonials-carousel').owlCarousel({
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
                            items: 2, 
                            margin: 10,
                        },
                        767:{
                            items: 2, 
                            margin: 10,
                        },
                        991:{
                            items: 3, 
                            margin: 10,
                        },
                        1279:{
                            items: 3,
                            margin: 10,
                        },
                        1280:{
                            items: 4,
                            margin: 15,
                        }
                    }
                })
            }
        },
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
        View.Carousel.testimonials.init();
        View.Carousel.feature.init();
        View.Room.init();
        var hotel = JSON.parse(localStorage.getItem("hotel"));
        let datestart = hotel.hotel.datestart;
        let dateend = hotel.hotel.dateend;
        hotel.hotel.prices = 0;
        hotel.hotel.roomdata = [];
        localStorage.setItem("hotel", JSON.stringify(hotel));

        $('input[name="dates"]').daterangepicker({
                timePicker: true,
                startDate: datestart == "" ? moment().add(1, 'day') : datestart,
                endDate: dateend == "" ? moment().add(2, 'day') : dateend,
                minDate: moment().add(1, 'day'),
                time: {
                    enabled: false
                },
                locale: {
                    format: 'YYYY/MM/DD'
                }
            },
            function (start, end, label) {
                // hiển thị
                $(".date-start").html(start.format('YYYY-MM-DD'));
                $(".date-end").html(end.format('YYYY-MM-DD'));
                // input hinde
                $("[name='arrivalDate']").val(start.format('YYYY-MM-DD'));
                $("[name='departDate']").val(end.format('YYYY-MM-DD'));
            },
        );
        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            // picker.startDate and picker.endDate are already Moment.js objects.
            // You can use diff() method to calculate the day difference.
            let day = picker.endDate.diff(picker.startDate, "days");
            $(".date-start").html(picker.startDate.format('YYYY-MM-DD'));
            $(".date-end").html(picker.endDate.format('YYYY-MM-DD'));
            $('.numberdays').html(`${day+1} ngày ${day} đêm`);
            var hotel = JSON.parse(localStorage.getItem("hotel"));
            hotel.hotel.time      = day - -1;
            hotel.hotel.datestart = picker.startDate.format('YYYY-MM-DD');
            hotel.hotel.dateend   = picker.endDate.format('YYYY-MM-DD');
            localStorage.setItem("hotel", JSON.stringify(hotel));
            View.Room.setPrices()
        });
    }
};
// Controller
(() => { 
    View.init()

    getData();

    View.Room.onConfirm(() => {
        View.Room.init()
        $('.client-wrapper').removeClass('is-open'); 
    })
    View.Room.onConfirm2(() => {
        View.Room.init()
        $('.client-wrapper').removeClass('is-open'); 
    })
    View.Room.onSelect(() => {

    })
    View.Room.onRoomSelect(() => {

    })
    View.Room.onOrder(() => {
        window.location.replace("/hotel-book");
    })

    function getData(){
        let tour_id = $(".tour-id").val();
        Api.Yacht.GetOne(tour_id)
            .done(res => {
                View.Yacht.render(res.data.yacht) 
                View.Room.render(res.data.room)
                localStorage.setItem("hotel-data", `{"id": "${res.data.yacht.id}", "name": "${res.data.yacht.name}", "location_name": "${res.data.yacht.location_name}"}`)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }
    $(document).on('click', '.schedule-wrapper', function(event) {
        if ($(this).hasClass("is-open")) {
            $(this).removeClass("is-open");
        }else{
            $(this).addClass("is-open");
        }
    });

})();