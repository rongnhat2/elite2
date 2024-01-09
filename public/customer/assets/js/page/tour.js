// View
const View = {
    Location:{
        render(data){
            data.map(v => {
                if (v.type == 1) {
                    $(".inland-category").append(`<a href="" class="category-item" data-slug="${v.slug}">${v.name}</a>`)
                }else{
                    $(".global-category").append(`<a href="" class="category-item" data-slug="${v.slug}">${v.name}</a>`)
                }
            })
        }
    },
    Tour: {
        render(data){
            data.inland.map(v => {
                $(".inland-item").append(View.Tour.item(v));
            })
            data.global.map(v => {
                $(".global-item").append(View.Tour.item(v));
            })
        },
        item(v){
            let data_discount = "";
            let value_discount = `<div class="price-real"> ${IndexView.Config.formatPrices(v.prices)} đ </div>`
            if (v.discount != 0) {
                data_discount = `<div class="item-badge">Giảm ${ v.discount}%</div>`;
                value_discount = ` <div class="price-data">
                                        ${IndexView.Config.formatPrices(v.prices)} đ
                                    </div>
                                    <div class="price-real">
                                        ${IndexView.Config.formatPrices(v.prices - (v.prices/100*v.discount)) } đ
                                    </div>`
            }
            return `<div class="tour-wrapper">
                        <div class="I-tour tour-item">
                            ${data_discount}
                            <a href="/tour-detail/${v.id}-${v.slug}" class="item-image" style="background-image: url('/${v.images.split(",")[0]}')"></a>
                            <div class="item-desctiption">
                                <a href="/tour-detail/${v.id}-${v.slug}" class="item-name">${v.name}</a>
                                <div class="item-time">
                                    <span><i class="fas fa-map-marker-alt m-r-10"></i>${v.location_name}</span>
                                </div>
                                <div class="item-price">
                                    ${value_discount}
                                </div>
                            </div>
                        </div>
                    </div>`
        }
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
        getCategory()
        getTour()
    }

    function getCategory(){
        Api.Location.GetAll()
            .done(res => {
                View.Location.render(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }
    function getTour(){
        Api.Tour.GetTourNew()
            .done(res => {
                View.Tour.render(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }

    init();

})();