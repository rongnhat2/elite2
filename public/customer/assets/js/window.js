// View
const IndexView = {
    Config: {
        onNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
        isEmail(email){
            return email.match( /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ );
        },
        formatPrices(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        },
        toNoTag(string){
            return string.replace(/(<([^>]+)>)/ig, "");
        },
        toRemoveStringTag(string){
            return string.replace(/(<([^>]+)>(.*?)<\/([^>]+)>)/ig, ""); 
        },
        onPricesKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
    },
    onSearch(callback){
        $(document).on('keyup', '.product-search-field', function() {
            $('.suggest-list .suggess-wrapper').remove()
            var data            = $(this).val(); 
            var data_text      = $(this).val();
            var data_category  = $(`#category-search`).val();
            var fd = new FormData();
            fd.append('data_text', data_text);
            fd.append('data_category', data_category);
            if (data_text) callback(fd, data_text);
        });
        $(document).mouseup(function(e) {
            var container = $(".suggest-list");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.suggest-list .suggess-wrapper').remove()
            }
        });
    }, 
    init(){ 
        $(document).on('keypress', `.type-number`, function(event) {
            return IndexView.Config.onNumberKey(event);
        });
        if (localStorage.getItem("hotel") == null) {
            var hotel = `{ "hotel": { "datestart": "", "dateend": "", "time": "0", "room": "1", "man": "1", "chill": "0", "baby": "0", "roomdata": "", "prices": "" } }`;
            localStorage.setItem("hotel", hotel);
        }
    }
};

// Controller
(() => {
    IndexView.init(); 
    $(`.navigation-main a[data-nav=${$(".nav-highlight").val()}]`).addClass("is-selected")
    
    $(document).on('click', '.nav-control', function() { 
        $(`.header-nav`).toggleClass('is-open'); 
    });
    $(document).mouseup(function(e) {
        var container = $("header");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.header-nav').removeClass('is-open');
        }
    });

    window.onscroll = function() { 
        (window.pageYOffset > $('body').offset().top ? true : false) ? $('header').addClass('is-scroll') : $('header').removeClass('is-scroll')
    };

    $(document).on('click', '.nav-control', function() { 
        $(`.navigation-wrapper`).toggleClass('is-open'); 
    });
    $(document).mouseup(function(e) {
        var container = $("header");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.navigation-wrapper').removeClass('is-open');
        }
    });

    $(document).on('click', '.filter-nav-control', function() { 
        $(`.filter-wrapper`).toggleClass('is-open'); 
    });
    $(document).mouseup(function(e) {
        var container = $(".filter-wrapper");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.filter-wrapper').removeClass('is-open');
        }
    });

    IndexView.onSearch((fd, text) => {
        Api.Tour.GetSearch(fd)
            .done(res => { 
                $('.suggest-list .suggess-wrapper').remove()
                $('.suggest-list')
                    .append(`<div class="suggess-wrapper"></div>`)
                if (res.data.length > 0) {
                    res.data.map(v => {
                        $(".suggess-wrapper").append(`
                                <div class="suggess-item">
                                    <a title="${v.slug}" href="/tour-detail/${v.id}-${v.slug}">${v.name}</a>
                                    <p>${highlight(text, v.slug)}</p>
                                </div>`)
                    })
                }else{
                    $(".suggess-wrapper").append(`<div class="suggess-item">Không có kết quả tìm kiếm</div>`)
                }
            })
    })
    function highlight(text, inputText) {
        var index = inputText.toLowerCase().indexOf(text.toLowerCase());
        inputText = inputText.substring(0,index) + "<span class='highlight'>" + inputText.substring(index,index+text.length) + "</span>" + inputText.substring(index + text.length);
        return inputText
    }

    $(document).on('click', '.client-select', function() { 
        $('.client-wrapper').addClass('is-open'); 
    });
    $(document).mouseup(function(e) {
        var container = $(".client-wrapper");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.client-wrapper').removeClass('is-open');
        }
    });


    $(document).on('click', '.tour-image-preview img', function() { 
        console.log($(this).attr("src"));
    });

})();