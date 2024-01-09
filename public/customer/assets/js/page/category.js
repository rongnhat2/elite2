// View
const View = {
    Sort: {
        getVal(){
            return $(".sort-value").val();
        },
        setVal(data){
            $(".sort-value").val(data);
        },
        onChange(callback){
            $(document).on('change', '.sort-value', function() { 
                callback($(this).val())
            });
        }
    },
    Filter: {
        tab: "",
        page: "",
        pageSize: "",
        budget: "",
        sort: "",
        location_type: "",
        setVal(name, data){
            $(`[group-name=${name}]`).find(`.filter-item[value=${data}]`).addClass("is-selected");
        },
        onClick(callback){
            $(document).on('click', '.filter-item', function() { 
                var filter_group = $(this).parent().parent().attr("group-name");
                if ($(this).hasClass("is-selected")) {
                    $(this).removeClass("is-selected")
                }else{
                    $(`.filter-block[group-name=${filter_group}]`).find(".filter-item").removeClass("is-selected");
                    $(this).addClass("is-selected");
                }
                callback(filter_group, $(this).attr("value"));
            });
        },
    },
    pagination: {
        page: 1,
        pageSize: 8,
        total: 0,
        onChange(callback) {
            const oThis = this;
            $(document).on('click', '.woocommerce-pagination .paginate_button.page-item:not(.disabled, .active)', function () {
                const page = $(this).text();
                let nextPage = null;
                if (page.match(/Next/g)) {
                    nextPage = oThis.page + 1;
                }
                else if (page.match(/Previous/g)) {
                    nextPage = oThis.page - 1;
                }
                else {
                    nextPage = +page;
                }
                callback(+nextPage);
                oThis.page = +nextPage;
            });
        },
        length(){
            return Math.ceil(this.total / this.pageSize);
        },
        render() {
            const paginationHTML = generatePagination(this.page, Math.ceil(this.total / this.pageSize));  
            $('.woocommerce-pagination').html(paginationHTML)

            const startEntry = this.pageSize * (this.page - 1) + 1;
            const lastEntry = Math.min(this.pageSize * this.page, this.total);
        }
    },
    URL: {
        setURL(filters){
            const param     = (new URLSearchParams({ ...filters })).toString();
            window.history.pushState('','', '?' + param);
        },
        getFilterURL(){
            // lấy ra url và trả về chuỗi filter tương ứng
            var urlParam    = new URLSearchParams(window.location.search);
            return filters  = {
                tab:            View.Filter.tab,
                location_type:  View.Filter.location_type,
                page:           View.Filter.page,
                pageSize:       View.Filter.pageSize,
                budget:         View.Filter.budget,
                sort:           View.Filter.sort,
            };
        },
        get(id){
            var urlParam    = new URLSearchParams(window.location.search);
            return urlParam.get(id)
        }
    },
    init(){

    }
};
// Controller
(() => { 
    View.init()
    function init(){
        View.Filter.tab             = View.URL.get("tab") ?? "";
        View.Filter.page            = View.URL.get("page") ?? View.pagination.page;
        View.Filter.pageSize        = View.URL.get("pageSize") ?? View.pagination.pageSize;
        View.Filter.budget          = View.URL.get("budget") ?? "";
        View.Filter.location_type   = View.URL.get("location_type") ?? "";
        View.Filter.sort            = View.URL.get("sort") ?? 0;
        View.URL.setURL(View.URL.getFilterURL());

        setValData();
        getData()
    }
    function setValData(){
        if (View.Filter.tab != "") View.Filter.setVal("tab", View.Filter.tab);
        if (View.Filter.budget != "") View.Filter.setVal("budget", View.Filter.budget);
        if (View.Filter.location_type != "") View.Filter.setVal("location_type", View.Filter.location_type);
        View.Sort.setVal(View.Filter.sort);
    }
    View.Filter.onClick((name, data) => {
        View.Filter[name] = data;
        View.URL.setURL(View.URL.getFilterURL());
        setValData();
    })
    View.Sort.onChange((data) => {
        View.Filter["sort"] = data;
        View.URL.setURL(View.URL.getFilterURL());
        setValData();
    })
    View.pagination.onChange((page) => { 
        View.Filter.page  = page;
        View.URL.setURL(View.URL.getFilterURL())
        getData()
        // getProductList();
    })
    function getData(){
        Api.Category.GetAll(View.URL.getFilterURL())
            .done(res => {
                console.log(res);
                // View.Blog.render(res.data);
                View.pagination.total = 40;
                View.pagination.render();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }


    init();

})();