// View
const View = {
    Room: {
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
        init(){
            var hotel = JSON.parse(localStorage.getItem("hotel"))
            let room = hotel.hotel.room;
            let man = hotel.hotel.man;
            let chill = hotel.hotel.chill;
            let baby = hotel.hotel.baby;

            $(".data-room").val(room);
            $(".data-man").val(man);
            $(".data-chill").val(chill);
            $(".data-baby").val(baby);

            $(".client-select")
                .html(`<p>${room} phòng</p> <p>${man} người lớn, ${chill} trẻ em, ${baby} em bé</p>`)
        }
    },
    Carousel:{ 
        banner: {  
            init(){
                $("#banner-carousel")
                    .append(`
                        <div class="carousel-item-element"> 
                            <img src="customer/assets/images/banner-01.png" alt="">
                        </div>
                        <div class="carousel-item-element"> 
                            <img src="customer/assets/images/banner-02.png" alt="">
                        </div>
                        <div class="carousel-item-element"> 
                            <img src="customer/assets/images/banner-03.png" alt="">
                        </div> `)
                $('#banner-carousel').owlCarousel({
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
                            items: 1
                        }
                    }
                })
            }
        },
        offer: {  
            init(){
                $("#offer-carousel")
                    .append(`
                        <a href="/combo-detail" class="carousel-item-element" style="background-image: url('customer/assets/images/offer-01.jpg')">  </a>
                        <a href="/combo-detail" class="carousel-item-element" style="background-image: url('customer/assets/images/offer-02.jpg')">  </a> 
                        <a href="/combo-detail" class="carousel-item-element" style="background-image: url('customer/assets/images/offer-03.jpg')">  </a> `)
                $('#offer-carousel').owlCarousel({
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
        place: {  
            render(data){
                data.map(v => {
                    $("#place-carousel")
                        .append(`
                            <a href="/tour-detail/${v.id}-${v.slug}" class="carousel-item-element" style="background-image: url('${v.images.split(",")[0]}')">
                                <div class="top-item">${v.location_name}</div>
                            </a>`)
                })
            },
            init(){
                $('#place-carousel').owlCarousel({
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
                        575:{
                            items: 2, 
                            margin: 10,
                        },
                        767:{
                            items: 3, 
                            margin: 10,
                        },
                        991:{
                            items: 4, 
                            margin: 10,
                        },
                        1279:{
                            items: 4,
                            margin: 10,
                        },
                        1280:{
                            items: 5,
                            margin: 15,
                        }
                    }
                })
            }
        },
        blog: {  
            render(data){
                data.map(v => {
                    $("#blog-carousel")
                        .append(` <div class="carousel-item-element">
                                    <a href="/blog-detail/${v.id}-${v.slug}" class="item-image" style="background-image: url('/${v.image}')"></a>
                                    <div class="item-desctiption-wrapper">
                                        <div class="item-time"><i class="far fa-clock m-r-10"></i>${v.created_at}</div>
                                        <a href="/blog-detail/${v.id}-${v.slug}" class="item-title">${v.name}</a>
                                        <div class="item-desctiption">${v.description}</div>
                                    </div>
                                </div>`)
                })
            },
            init(){
                $('#blog-carousel').owlCarousel({
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
        testimonials: {  
            init(){
                $("#testimonials-carousel")
                    .append(`
                        <div class="carousel-item-element">
                            <a href="#" class="item-image" style="background-image: url('customer/assets/images/blog-01.jpg')"></a>
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
        image: {  
            init(){
                $("#image-carousel")
                    .append(``)
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
    },
    init(){ 
        View.Carousel.banner.init();
        View.Carousel.offer.init();
        
        View.Carousel.testimonials.init();
        View.Carousel.feature.init();
        View.Carousel.image.init();

        View.Room.init();
        var hotel = JSON.parse(localStorage.getItem("hotel"));
        let datestart = hotel.hotel.datestart;
        let dateend = hotel.hotel.dateend;


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

            var hotel = JSON.parse(localStorage.getItem("hotel"));

            hotel.hotel.datestart = picker.startDate.format('YYYY-MM-DD');
            hotel.hotel.dateend   = picker.endDate.format('YYYY-MM-DD');
            localStorage.setItem("hotel", JSON.stringify(hotel));
        });
    }
};
// Controller
(() => { 
    View.init()
    $(".I-carousel").css({"width": $(window).width()+"px"})
    
    View.Room.onConfirm(() => {
        View.Room.init()
        $('.client-wrapper').removeClass('is-open'); 
    })
    View.Room.onConfirm2(() => {
        View.Room.init()
        $('.client-wrapper').removeClass('is-open'); 
    })

    function init(){
        getTrendingTour()
        getIndexBlog()
    }

    function getTrendingTour(){
        Api.Tour.GetTrending()
            .done(res => {
                View.Carousel.place.render(res.data);
                View.Carousel.place.init();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }
    function getIndexBlog(){
        Api.Blog.GetAll(8)
            .done(res => {
                View.Carousel.blog.render(res.data);
                View.Carousel.blog.init();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }

    init();
})();