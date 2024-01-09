// View
const View = {
    Blog: {
        render(data){
            data.map(v => {
                $(`[data-category=${v.category_id}]`)
                    .append(`<div class="item-block">
                                <div class="item-wrapper">
                                    <a href="/blog-detail" class="item-image" style="background-image: url('/${v.image}')"></a>
                                    <div class="item-desctiption-wrapper">
                                        <div class="item-time"><i class="far fa-clock m-r-10"></i>${v.created_at}</div>
                                        <a href="/blog-detail/${v.id}-${v.slug}" class="item-title">${v.name}</a>
                                        <div class="item-desctiption">${v.description}</div>
                                    </div>
                                </div>
                            </div>`)
            })
        }
    },
    init(){

    }
};
// Controller
(() => { 
    View.init()

    function init(){
        getTour()
    }
    
    function getTour(){
        Api.Blog.GetAll()
            .done(res => {
                View.Blog.render(res.data);
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }

    init();

})();