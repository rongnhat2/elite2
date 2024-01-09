// View
const View = {
    Tour: {
        render(data){
            $(".tour-detail-header").text(data.name);
            $(".tour-name").append(data.location_name);
            if (data.discount == 0) {
                $(".data-prices").remove()
                $(".data-prices-real").text(IndexView.Config.formatPrices(data.prices) + " đ");
            }else{
                $(".data-prices").text(IndexView.Config.formatPrices(data.prices) + " đ");
                $(".data-prices-real").text(IndexView.Config.formatPrices(data.prices - (data.prices/100*data.discount)) + " đ");
            }
            data.images.split(",").map(v => {
                $(".tour-image-preview")
                    .append(`<div class="carousel-item-element"> <img src="/${v}" alt=""> </div>`)
            })
            View.Carousel.image.init();
            data.service.split(`\r\n`).map(v => {
                $(".services-content").append(`<p class="service-item">${v}</p>`)
            })
            $('.description-content').append(`<p class="overview">${data.description}</p>`)

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
            let policy = JSON.parse(data.policy)["policy"][0];
            $(".food-data").html(policy.food);
            $(".trans-data").html(policy.trans);
            $(".place-data").html(policy.place);
            $(".notin-data").html(policy.notin);
            $(".cancel-data").html(policy.cancel);
            $(".kid-data").html(policy.kid);
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
    }
};
// Controller
(() => { 
    View.init()

    getData();

    function getData(){
        let tour_id = $(".tour-id").val();

        Api.Tour.GetOne(tour_id)
            .done(res => {
                View.Tour.render(res.data)
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