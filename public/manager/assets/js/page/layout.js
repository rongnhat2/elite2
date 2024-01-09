const View = {
    setVal(data){
        data.carousel == "" ? null : IndexView.multiImage.setVal(data.carousel);  
        $('.data-address').val(data.address) 
        $('.data-hotline').val(data.hotline) 
        $('.data-email').val(data.email) 
        $('.data-description-vi').val(data.description_vi)
        $('.data-description-en').val(data.description_en)
    },
    getVal(){
        var resource = "#form-data";
        var fd = new FormData();
        var required_data = [];
        var onPushData = true;

        var data_address           = $(`${resource}`).find('.data-address').val();  
        var data_hotline           = $(`${resource}`).find('.data-hotline').val();  
        var data_email           = $(`${resource}`).find('.data-email').val();  
        var data_description_en           = $(`${resource}`).find('.data-description-en').val(); 
        var data_description_vi           = $(`${resource}`).find('.data-description-vi').val();   
        var data_images         = $(`${resource}`).find(".image-list")[0].files; 

        var data_images_preview = [];
        $(`${resource}`).find('.image-preview-item.image-load-data').each(function(index, el) { 
            data_images_preview.push($(this).attr("data-url"));
        });


        if (onPushData) { 
            fd.append('data_address', data_address);   
            fd.append('data_hotline', data_hotline);   
            fd.append('data_email', data_email);   
            fd.append('data_description_en', data_description_en);  
            fd.append('data_description_vi', data_description_vi);   
            fd.append('data_images_preview', data_images_preview.toString()); 
            fd.append('image_list_length', data_images.length);
            for (var i = 0; i < data_images.length; i++) {
                fd.append('image_list_item_'+i, data_images[i]);
            }
            return fd;
        }else{
            $(`${resource}`).find('.error-log .js-errors').remove();
            var required_noti = ``;
            for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
            $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
            return false;
        }
    },
    onPush(name, callback){
        $(document).on('click', `.full-tab-action`, function() {
            $(this).attr('atr').trim()
            if($(this).attr('atr').trim() == name) {
                callback();
            }
        }); 
    },
    init(){
        $('#image-update').val("")
    }
};
(() => {
    View.init();
    function init(){
        getData();
    }

    View.onPush("Confirm", (fd) => {
        IndexView.helper.showToastProcessing('Process', 'Đang xử lí');
        Api.Layout.Update(View.getVal())
            .done(res => { 
                IndexView.helper.showToastSuccess('Success', 'Thành công');
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    })

    function getData(){
        Api.Layout.GetAll()
            .done(res => {
                View.setVal(res.data[0])
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }


    
    function debounce(f, timeout) {
        let isLock = false;
        let timeoutID = null;
        return function(item) {
            if(!isLock) {
                f(item);
                isLock = true;
            }
            clearTimeout(timeoutID);
            timeoutID = setTimeout(function() {
                isLock = false;
            }, timeout);
        }
    }
    init();
})();
