const View = {
    table: {
        __generateDTRow(data){ 
            return [
                `<div class="id-order">${data.id}</div>`,
                data.name,  
                `<img src="/${data.images.split(",")[0]}" style="width:150px" alt="">`,   
                data.location_position == 1 ? "Trong nước" : "Quốc tế",  
                data.prices,  
                `<label class="switch" data-id="${data.id}" atr="Status"> <span class="slider round ${data.trending == '1' ? 'active' : ''}"></span> </label>`,
                `<div class="view-data tab-action" atr="View" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-edit"></i></div>
                <div class="view-data tab-action" atr="Delete" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-delete"></i></div>`
            ]
        },
        init(){
            var row_table = [
                    { title: 'ID', name: 'id', orderable: true, width: '10%', },
                    { title: 'Tên', name: 'name', orderable: true, width: '20%', },
                    { title: 'Hình ảnh', name: 'name', orderable: true, width: '20%', },
                    { title: 'Vị trí', name: 'image', orderable: true, width: '20%', }, 
                    { title: 'Giá tour', name: 'name', orderable: true, },
                    { title: 'Trending', name: 'image', orderable: true, },   
                    { title: 'Hành động', name: 'Action', orderable: true, width: '10%',},
                ];
            IndexView.table.init("#data-table", row_table);
        }
    },
    Location: {
        Data: [],
        render(id){
            $(".position-data .radio").remove()
            View.Location.Data.map((v, k) => {
                if (v.type == id) {
                    $(".position-data")
                        .append(`<div class="radio">
                                    <input id="position-${k}" name="position" value="${v.id}" type="radio">
                                    <label for="position-${k}">${v.name}</label>
                                </div>`)
                }
            })
        },
        onChange(callback){
            $(document).on('change', `input[type=radio][name=location]`, function() {
                callback($(this).val());
            });
        }
    },
    Layout: {
        FormCreate: "",
        FormUpdate: "",
        FormDelete: "",
        init(){
            View.Layout.FormCreate = $(".layout-tab-create").html();
            View.Layout.FormUpdate = $(".layout-tab-create").html();
            View.Layout.FormDelete = $(".layout-tab-delete").html();
            $(".layout-tab-create").remove();
            $(".layout-tab-delete").remove();
        }
    },
    Timeline: {
        item: Template.Timeline.Item,
        render(data){
            return `<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 timeline-item-data">
                        <div class="item-remove">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label control-label">Tiêu đề</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control data-item-name" placeholder="( NGÀY 01: HÀ NỘI – NGHĨA LỘ - TRẠM TẤU(ĂN - / TRƯA / TỐI) )" value="${data.name.replaceAll( '"', '“' )}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label control-label m-b-10">Nội dung ( <p style="display: inline;">Xuống dòng để tách các nội dung</p> )</label>
                                    <div class="col-md-12">
                                        <textarea type="text" class="form-control data-item-description" placeholder="" rows="5" >${data.description.replaceAll('<br>', '\r\n' ).replaceAll( '"', '“' )}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
        },
        setVal(resource, data){
            var json_data = JSON.parse(data.detail)["timeline"];
            json_data.map(v => {
                $(".timeline-list")
                    .append(View.Timeline.render(v))
            })
        },
        getVal(){
            var timeline = `{ "timeline": [] }`;
            var timelineList = JSON.parse(timeline);
            console.log($('.timeline-list .timeline-item-data').length);
            if ($('.timeline-list .timeline-item-data').length == 0) {
                return null;
            }else{
                $('.timeline-list .timeline-item-data').each(function(index, el) {
                    timelineList
                        .timeline
                        .push(
                            JSON.parse(`{ "name": "${$(this).find(".data-item-name").val().replaceAll( '"', '“' )}", 
                                "description": "${$(this).find(".data-item-description").val().replaceAll( /\n/g, '<br>' ).replaceAll( '"', '“' )}"}`)
                        );
                });
                return JSON.stringify(timelineList);
            }
        },
        doCreate(){
            $(document).on('click', `.timeline-action`, function() {
                $('.timeline-list').append(View.Timeline.item);
            }); 
        },
        doRemove(){
            $(document).on('click', `.item-remove`, function() {
                $(this).parent().remove()
            }); 
        },
        init(){
            View.Timeline.doCreate();
            View.Timeline.doRemove();
        }
    },
    Policy: {
        setVal(resource, data){
            var json_data = JSON.parse(data.policy)["policy"][0];
            $(`${resource}`).find(".data-policy-01").val(json_data["food"].replaceAll('<br>', '\r\n' ));
            $(`${resource}`).find(".data-policy-02").val(json_data["trans"].replaceAll('<br>', '\r\n' ));
            $(`${resource}`).find(".data-policy-03").val(json_data["place"].replaceAll('<br>', '\r\n' ));
            $(`${resource}`).find(".data-policy-04").val(json_data["notin"].replaceAll('<br>', '\r\n' ));
            $(`${resource}`).find(".data-policy-05").val(json_data["cancel"].replaceAll('<br>', '\r\n' ));
            $(`${resource}`).find(".data-policy-06").val(json_data["kid"].replaceAll('<br>', '\r\n' ));
        },
        getVal(){
            var policy = `{ "policy": [] }`;
            var policyList = JSON.parse(policy);
            let food    = $(".data-policy-01").val()
            let trans   = $(".data-policy-02").val()
            let place   = $(".data-policy-03").val()
            let notin   = $(".data-policy-04").val()
            let cancel  = $(".data-policy-05").val()
            let kid     = $(".data-policy-06").val()
            if (food == "" || trans == "" || place == "" || notin == "" || cancel == "" || kid == "") {
                return null;
            }else{
                policyList
                    .policy
                    .push(
                        JSON.parse(`{ 
                                        "food": "${food.replace( /\n/g, '<br>' )}", 
                                        "trans": "${trans.replace( /\n/g, '<br>' )}",
                                        "place": "${place.replace( /\n/g, '<br>' )}",
                                        "notin": "${notin.replace( /\n/g, '<br>' )}",
                                        "cancel": "${cancel.replace( /\n/g, '<br>' )}",
                                        "kid": "${kid.replace( /\n/g, '<br>' )}"
                                    }`)
                    );
                return JSON.stringify(policyList)
            }
        }
    },
    FullTab: {  
        Create: { 
            setVal(resource, data){ },
            getVal(resource){ 
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
                const noTag = /(<([^>]+)>)/ig;
                const noScript = /(<\s*script[^>]*>(.*?)<\s*\/\s*script>)/ig;

                var data_name        = $(`${resource}`).find('.data-name').val().replace(noTag, "");
                var data_position    = $(`${resource}`).find('[name=position]:checked').val(); 
                var data_prices      = $(`${resource}`).find('.data-prices').val();
                var data_discount    = $(`${resource}`).find('.data-discount').val();
                var data_description = $(`${resource}`).find('.data-description').val();
                var data_service     = $(`${resource}`).find('.data-service').val();
                var data_policy      = View.Policy.getVal();
                var data_timeline    = View.Timeline.getVal();
                var data_images         = $(".product-images")[0].files;
                var data_images_preview = [];
                $(`.multi-upload`).find('.image-preview-item.image-load-data').each(function(index, el) {
                    data_images_preview.push($(this).attr("data-url"));
                });

                // --Required Value
                if (data_name == '') { required_data.push('Nhập tên.'); onPushData = false }
                if (data_position == null) { required_data.push('Chọn địa điểm.'); onPushData = false }
                if (data_prices == '') { required_data.push('Nhập giá tour.'); onPushData = false }
                if (data_description == '') { required_data.push('Nhập mô tả ngắn.'); onPushData = false }
                if (data_service == '') { required_data.push('Nhập thông tin dịch vụ.'); onPushData = false }
                if (data_policy == null) { required_data.push('Nhập thông tin chính sách.'); onPushData = false }
                if (data_timeline == null) { required_data.push('Nhập thông tin lịch trình.'); onPushData = false }
                if (data_images.length <= 0) { required_data.push('Hãy chọn ảnh.'); onPushData = false } 

                if (onPushData) {
                    fd.append('data_name', data_name); 
                    fd.append('data_position', data_position);  
                    fd.append('data_prices', data_prices);  
                    fd.append('data_discount', data_discount ?? 0);  
                    fd.append('data_description', data_description);  
                    fd.append('data_service', data_service);  
                    fd.append('data_policy', data_policy);  
                    fd.append('data_timeline', data_timeline);
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
            init(name){
                $(`[data-tab-name=${name}]`).html(View.Layout.FormCreate)
            }
        },
        Update: { 
            setVal(resource, data){
                $(`${resource}`).find('.data-id').val(data.id);
                $(`${resource}`).find('.data-name').val(data.name);
                $(`${resource}`).find(`[name=location][value=${data.location_position}]`).prop('checked', true);
                View.Location.render(data.location_position)
                $(`${resource}`).find(`[name=position][value=${data.location_id}]`).prop('checked', true);
                $(`${resource}`).find('.data-prices').val(data.prices);
                $(`${resource}`).find('.data-discount').val(data.discount);
                $(`${resource}`).find('.data-description').val(data.description)
                $(`${resource}`).find('.data-service').val(data.service)
                data.images == "" ? null : IndexView.multiImage.setVal(data.images);  
                View.Policy.setVal(resource, data);
                View.Timeline.setVal(resource, data);
            },
            getVal(resource){ 
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
                const noTag = /(<([^>]+)>)/ig;
                const noScript = /(<\s*script[^>]*>(.*?)<\s*\/\s*script>)/ig;

                var data_id             = $(`${resource}`).find('.data-id').val().replaceAll(noTag, "");

                var data_name        = $(`${resource}`).find('.data-name').val().replace(noTag, "");
                var data_position    = $(`${resource}`).find('[name=position]:checked').val(); 
                var data_prices      = $(`${resource}`).find('.data-prices').val();
                var data_discount    = $(`${resource}`).find('.data-discount').val();
                var data_description = $(`${resource}`).find('.data-description').val();
                var data_service     = $(`${resource}`).find('.data-service').val();
                var data_policy      = View.Policy.getVal();
                var data_timeline    = View.Timeline.getVal();
                var data_images         = $(".product-images")[0].files;
                var data_images_preview = [];
                $(`.multi-upload`).find('.image-preview-item.image-load-data').each(function(index, el) {
                    data_images_preview.push($(this).attr("data-url"));
                });

                // --Required Value
                if (data_name == '') { required_data.push('Nhập tên.'); onPushData = false }
                if (data_position == null) { required_data.push('Chọn địa điểm.'); onPushData = false }
                if (data_prices == '') { required_data.push('Nhập giá tour.'); onPushData = false }
                if (data_description == '') { required_data.push('Nhập mô tả ngắn.'); onPushData = false }
                if (data_service == '') { required_data.push('Nhập thông tin dịch vụ.'); onPushData = false }
                if (data_policy == null) { required_data.push('Nhập thông tin chính sách.'); onPushData = false }
                if (data_timeline == null) { required_data.push('Nhập thông tin lịch trình.'); onPushData = false }

                if (onPushData) {
                    fd.append('data_id', data_id); 
                    fd.append('data_name', data_name); 
                    fd.append('data_position', data_position);  
                    fd.append('data_prices', data_prices);  
                    fd.append('data_discount', data_discount ?? 0);  
                    fd.append('data_description', data_description);  
                    fd.append('data_service', data_service);  
                    fd.append('data_policy', data_policy);  
                    fd.append('data_timeline', data_timeline);
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
            init(name){
                $(`[data-tab-name=${name}]`).html(View.Layout.FormCreate)
            }
        },
        Delete: {
            setVal(resource, id){
                $(resource).find('.data-id').val(id)
            },
            getVal(resource){ 
                $(resource).find('.data-id').val()
            },
            init(name){
                $(`[data-tab-name=${name}]`).html(View.Layout.FormDelete)
            }
        },
        onPush(name, resource, callback){ 
            $(document).on('click', `${resource} .full-tab-action`, function() {
                $(this).attr('atr').trim()
                if($(this).attr('atr').trim() == name) {
                    callback();
                }
            }); 
        },
        default(name){
            $(`[data-tab-name=${name}]`).html("");
        },
        doShow(name){
            $(".data-custom-tab").removeClass("on-show");
            $(`.data-custom-tab[data-tab-name=${name}]`).addClass("on-show"); 
        }, 
        onShow(name, callback){
            $(document).on('click', `.tab-action`, function() {
                if($(this).attr('atr').trim() == name) {
                    var id = $(this).attr("data-id");
                    callback(id);
                }
            });
        },
    },
    init(){
        View.Layout.init();
        View.table.init(); 

        View.Timeline.init();
    }
};
(() => {
    View.init();
    function init(){
        getData();
    }

    View.Location.onChange((id) => {
        View.Location.render(id)
    })

    // Table
    View.FullTab.onShow("Table", () => {
        View.FullTab.doShow("Table");
        View.FullTab.default("Create");
        View.FullTab.default("Update");
        getData();
    })
    
    // Create
    View.FullTab.onShow("Create", () => {
        View.FullTab.doShow("Create");
        View.FullTab.Create.init("Create"); 
    })
    View.FullTab.onPush("Confirm", "#popup-create", () => { 
        var fd = View.FullTab.Create.getVal("#popup-create");
        if (fd) {
            View.FullTab.doShow("Table");
            View.FullTab.default();
            IndexView.helper.showToastProcessing('Process', 'Đang xử lí');
            Api.Tour.Store(fd)
                .done(res => { 
                    IndexView.helper.showToastSuccess('Success', 'Thành công');
                    getData();
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
        }
    })

    // Update
    View.FullTab.onShow("View", (id) => {
        View.FullTab.doShow("Update");
        View.FullTab.Update.init("Update");
        IndexView.helper.showToastProcessing('Process', 'Đang xử lí');
        Api.Tour.getOne(id)
            .done(res => { 
                View.FullTab.Update.setVal("#popup-update", res.data)
                IndexView.helper.showToastSuccess('Success', 'Lấy ra dữ liệu'); 
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    })
    View.FullTab.onPush("Confirm", "#popup-update", () => { 
        var fd = View.FullTab.Update.getVal("#popup-update");
        if (fd) {
            View.FullTab.doShow("Table");
            View.FullTab.default();
            IndexView.helper.showToastProcessing('Process', 'Đang xử lí');
            Api.Tour.Update(fd)
                .done(res => { 
                    IndexView.helper.showToastSuccess('Success', 'Thành công');
                    getData();
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
        }
    })

    // Delete
    View.FullTab.onShow("Delete", (id) => {
        View.FullTab.doShow("Delete");
        View.FullTab.Delete.init("Delete"); 
        View.FullTab.Delete.setVal("#popup-delete", id)
    })
    View.FullTab.onPush("Delete", "#popup-delete", () => {
        View.FullTab.doShow("Table");
        View.FullTab.default();
        IndexView.helper.showToastProcessing('Process', 'Đang xử lí');
        Api.Tour.Delete($("#popup-delete").find('.data-id').val())
            .done(res => { 
                IndexView.helper.showToastSuccess('Success', 'Thành công');
                getData();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });

    })

    IndexView.table.onSwitch(debounce((item) => {
        Api.Tour.Trending(item.attr('data-id'))
            .done(res => {
                getData()
                item.find('.slider').toggleClass('active');
            })
            .fail(err => {
                console.log(err);
            })
            .always(() => {
            });
    }, 500));


    function getData(){
        Api.Location.GetAll()
            .done(res => {
                View.Location.Data = res.data;
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
        Api.Tour.GetAll()
            .done(res => {
                IndexView.table.clearRows();
                Object.values(res.data).map(v => {
                    IndexView.table.insertRow(View.table.__generateDTRow(v));
                    IndexView.table.render();
                })
                IndexView.table.render();
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
