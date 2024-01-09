const View = {
    table: {
        __generateDTRow(data){ 
            return [
                `<div class="id-order">${data.id}</div>`,
                data.name,  
                `<img src="/${data.images.split(",")[0]}" style="width:150px" alt="">`,   
                data.location_position == 1 ? "Trong nước" : "Quốc tế", 
                `<div class="view-data tab-action" atr="View" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-eye"></i></div>
                <div class="view-data tab-action" atr="Edit" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-edit"></i></div>
                <div class="view-data tab-action" atr="Delete" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-delete"></i></div>`
            ]
        },
        init(){
            var row_table = [
                    { title: 'ID', name: 'id', orderable: true, width: '10%', },
                    { title: 'Tên', name: 'name', orderable: true, width: '20%', },
                    { title: 'Hình ảnh', name: 'name', orderable: true, width: '20%', },
                    { title: 'Vị trí', name: 'image', orderable: true, width: '20%', }, 
                    { title: 'Hành động', name: 'Action', orderable: true, width: '10%', },
                ];
            IndexView.table.init("#data-table", row_table);
        }
    },
    room: {
        __generateDTRow(data){ 
            return [
                `<div class="id-order">${data.id}</div>`,
                data.name,  
                `<img src="/${data.image}" style="width:150px" alt="">`,   
                data.prices, 
                `<div class="view-data tab-action" atr="RoomEdit" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-edit"></i></div>
                <div class="view-data tab-action" atr="RoomDelete" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-delete"></i></div>`
            ]
        },
        init(){
            var row_table = [
                    { title: 'ID', name: 'id', orderable: true, width: '10%', },
                    { title: 'Tên', name: 'name', orderable: true, width: '20%', },
                    { title: 'Hình ảnh', name: 'name', orderable: true, width: '20%', },
                    { title: 'Giá tiền', name: 'image', orderable: true, width: '20%', }, 
                    { title: 'Hành động', name: 'Action', orderable: true, width: '10%', },
                ];
            IndexView.table.init("#data-room", row_table);
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
    Utilities: {
        render(){
            var data = Data.Utilities;
            data.map((v, k) => { 
                $(".data-utilities")
                    .append(`<div class="checkbox f-left m-r-20">
                                <input id="checkbox-${k}" name="utilities" value="${k}" type="checkbox">
                                <label for="checkbox-${k}">${v}</label>
                            </div>`)
            })
        },
        setVal(resource, data){
            data.utilities.split(",")
                .map(v => {
                    $(`${resource}`).find(`[name=utilities][value=${v}]`).prop('checked', true);
                })
        },
        getVal(){
            if ($('[name=utilities]:checked').length == 0) {
                return null;
            }else{
                var item = $(`[name=utilities]:checked`); 
                var data_return = [];
                item.each(function(index, el) {
                    data_return.push($(this).val())
                });
                return data_return.toString();
            }
        }
    },
    Layout: {
        FormView: "",
        FormCreate: "",
        FormUpdate: "",
        FormDelete: "",
        FormCreateRoom: "",
        FormUpdateRoom: "",
        FormDeleteRoom: "",
        init(){
            View.Layout.FormView    = $(".layout-tab-view").html();
            View.Layout.FormCreate  = $(".layout-tab-create").html();
            View.Layout.FormUpdate  = $(".layout-tab-create").html();
            View.Layout.FormDelete  = $(".layout-tab-delete").html();
            View.Layout.FormCreateRoom  = $(".layout-tab-create-room").html();
            View.Layout.FormUpdateRoom  = $(".layout-tab-create-room").html();
            View.Layout.FormDeleteRoom  = $(".layout-tab-delete").html();
            $(".layout-tab-view").remove();
            $(".layout-tab-create").remove();
            $(".layout-tab-delete").remove();
            $(".layout-tab-create-room").remove();
        }
    },
    Timeline: {
        item: Template.Hotel.Item,
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
                                        <input type="text" class="form-control data-item-name" placeholder="Thời gian nhận – trả phòng" value="${data.name.replaceAll( '"', '“' )}">
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
        },
        getVal(){
            var policy = `{ "policy": [] }`;
            var policyList = JSON.parse(policy);
            let food    = $(".data-policy-01").val()
            let trans   = $(".data-policy-02").val()
            let place   = $(".data-policy-03").val()
            if (food == "" || trans == "" || place == "") {
                return null;
            }else{
                policyList
                    .policy
                    .push(
                        JSON.parse(`{ 
                                        "food": "${food.replace( /\n/g, '<br>' )}", 
                                        "trans": "${trans.replace( /\n/g, '<br>' )}",
                                        "place": "${place.replace( /\n/g, '<br>' )}"
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
                var data_description = $(`${resource}`).find('.data-description').val();
                var data_service     = $(`${resource}`).find('.data-service').val();
                var data_map         = $(`${resource}`).find('.data-map').val();
                var data_utilities   = View.Utilities.getVal();
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
                if (data_map == '') { required_data.push('Nhập bản đồ.'); onPushData = false }
                if (data_description == '') { required_data.push('Nhập mô tả ngắn.'); onPushData = false }
                if (data_service == '') { required_data.push('Nhập thông tin dịch vụ.'); onPushData = false }
                if (data_policy == null) { required_data.push('Nhập thông tin chính sách.'); onPushData = false }
                if (data_timeline == null) { required_data.push('Nhập thông tin lịch trình.'); onPushData = false }
                if (data_utilities == null) { required_data.push('Chọn thông tin tiện ích.'); onPushData = false }
                if (data_images.length <= 0) { required_data.push('Hãy chọn ảnh.'); onPushData = false } 

                if (onPushData) {
                    fd.append('data_name', data_name); 
                    fd.append('data_position', data_position);  
                    fd.append('data_map', data_map);  
                    fd.append('data_utilities', data_utilities);  
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
                $(`${resource}`).find('.data-map').val(data.map); 
                $(`${resource}`).find('.data-description').val(data.description)
                $(`${resource}`).find('.data-service').val(data.service)
                data.images == "" ? null : IndexView.multiImage.setVal(data.images);  
                View.Policy.setVal(resource, data);
                View.Timeline.setVal(resource, data);
                View.Utilities.setVal(resource, data);
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
                var data_description = $(`${resource}`).find('.data-description').val();
                var data_service     = $(`${resource}`).find('.data-service').val();
                var data_map         = $(`${resource}`).find('.data-map').val();
                var data_utilities   = View.Utilities.getVal();
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
                if (data_map == '') { required_data.push('Nhập bản đồ.'); onPushData = false }
                if (data_description == '') { required_data.push('Nhập mô tả ngắn.'); onPushData = false }
                if (data_service == '') { required_data.push('Nhập thông tin dịch vụ.'); onPushData = false }
                if (data_policy == null) { required_data.push('Nhập thông tin chính sách.'); onPushData = false }
                if (data_timeline == null) { required_data.push('Nhập thông tin lịch trình.'); onPushData = false }
                if (data_utilities == null) { required_data.push('Chọn thông tin tiện ích.'); onPushData = false }

                if (onPushData) {
                    fd.append('data_id', data_id); 
                    fd.append('data_name', data_name); 
                    fd.append('data_position', data_position);  
                    fd.append('data_map', data_map);  
                    fd.append('data_utilities', data_utilities);  
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
        View: {
            init(name, id){
                $(".data-hotel-id").val(id)
                $(`[data-tab-name=${name}]`).html(View.Layout.FormView)
            }
        },
        CreateRoom: { 
            setVal(resource, data){ },
            getVal(resource){ 
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
                const noTag = /(<([^>]+)>)/ig;
                const noScript = /(<\s*script[^>]*>(.*?)<\s*\/\s*script>)/ig;

                var data_id         = $('.data-hotel-id').val();
                var data_name       = $(`${resource}`).find('.data-name').val();
                var data_prices     = $(`${resource}`).find('.data-prices').val();
                var data_discount   = $(`${resource}`).find('.data-discount').val();
                var data_properties = $(`${resource}`).find('.data-properties').val();
                var data_service    = $(`${resource}`).find('.data-services').val();
                var data_image      = $(".data-image")[0].files;

                // --Required Value
                if (data_name == '') { required_data.push('Nhập tên.'); onPushData = false }
                if (data_prices == '') { required_data.push('Nhập giá phòng.'); onPushData = false }
                if (data_properties == '') { required_data.push('Nhập mô tả ngắn.'); onPushData = false }
                if (data_service == '') { required_data.push('Nhập thông tin dịch vụ.'); onPushData = false }
                if (data_image.length <= 0) { required_data.push('Hãy chọn ảnh.'); onPushData = false } 

                if (onPushData) {
                    fd.append('data_id', data_id);
                    fd.append('data_name', data_name); 
                    fd.append('data_prices', data_prices);  
                    fd.append('data_discount', data_discount);  
                    fd.append('data_properties', data_properties);  
                    fd.append('data_service', data_service);
                    fd.append('data_image', data_image[0] ?? "null");  
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
                $(`[data-tab-name=${name}]`).html(View.Layout.FormCreateRoom)
            }
        },
        UpdateRoom: { 
            setVal(resource, data){ 
                $(`${resource}`).find('.data-id').val(data.id);
                $(`${resource}`).find('.data-name').val(data.name);
                $(`${resource}`).find('.data-prices').val(data.prices);
                $(`${resource}`).find('.data-discount').val(data.discount);
                $(`${resource}`).find('.data-properties').val(data.properties);
                $(`${resource}`).find('.data-services').val(data.services);
                $(`${resource}`).find('.image-preview').css({
                    'background-image': `url('/${data.image ?? 'icon/noimage.png'}')`
                })
            },
            getVal(resource){ 
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
                const noTag = /(<([^>]+)>)/ig;
                const noScript = /(<\s*script[^>]*>(.*?)<\s*\/\s*script>)/ig;

                var data_id         = $(`${resource}`).find('.data-id').val();
                var data_name       = $(`${resource}`).find('.data-name').val();
                var data_prices     = $(`${resource}`).find('.data-prices').val();
                var data_discount   = $(`${resource}`).find('.data-discount').val();
                var data_properties = $(`${resource}`).find('.data-properties').val();
                var data_service    = $(`${resource}`).find('.data-services').val();
                var data_image      = $(".data-image")[0].files;

                // --Required Value
                if (data_name == '') { required_data.push('Nhập tên.'); onPushData = false }
                if (data_prices == '') { required_data.push('Nhập giá phòng.'); onPushData = false }
                if (data_properties == '') { required_data.push('Nhập mô tả ngắn.'); onPushData = false }
                if (data_service == '') { required_data.push('Nhập thông tin dịch vụ.'); onPushData = false }

                if (onPushData) {
                    fd.append('data_id', data_id);
                    fd.append('data_name', data_name); 
                    fd.append('data_prices', data_prices);  
                    fd.append('data_discount', data_discount);  
                    fd.append('data_properties', data_properties);  
                    fd.append('data_service', data_service);
                    fd.append('data_image', data_image[0] ?? "null");  
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
                $(`[data-tab-name=${name}]`).html(View.Layout.FormCreateRoom)
            }
        },
        DeleteRoom: {
            setVal(resource, id){
                $(resource).find('.data-id').val(id)
            },
            getVal(resource){ 
                $(resource).find('.data-id').val()
            },
            init(name){
                $(`[data-tab-name=${name}]`).html(View.Layout.FormDeleteRoom)
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
        View.Utilities.render();
    })
    View.FullTab.onPush("Confirm", "#popup-create", () => { 
        var fd = View.FullTab.Create.getVal("#popup-create");
        if (fd) {
            View.FullTab.doShow("Table");
            View.FullTab.default();
            IndexView.helper.showToastProcessing('Process', 'Đang xử lí');
            Api.Position.Store(fd)
                .done(res => { 
                    IndexView.helper.showToastSuccess('Success', 'Thành công');
                    getData();
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
        }
    })

    // Update
    View.FullTab.onShow("Edit", (id) => {
        View.FullTab.doShow("Update");
        View.FullTab.Update.init("Update");
        View.Utilities.render();
        IndexView.helper.showToastProcessing('Process', 'Đang xử lí');
        Api.Position.getOne(id)
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
            Api.Position.Update(fd)
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
        Api.Position.Delete($("#popup-delete").find('.data-id').val())
            .done(res => { 
                IndexView.helper.showToastSuccess('Success', 'Thành công');
                getData();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    })

    // View
    View.FullTab.onShow("View", (id) => {
        View.FullTab.doShow("View");
        View.FullTab.View.init("View", id);
        View.room.init();
        getDataRoom(id);
    })

    // TableRoom
    View.FullTab.onShow("TableRoom", () => {
        let id = $('.data-hotel-id').val();
        View.FullTab.doShow("View");
        View.FullTab.View.init("View", id);
        View.room.init();
        getDataRoom(id);
    })
    
    // Create Combo
    View.FullTab.onShow("CreateRoom", () => {
        View.FullTab.doShow("CreateRoom");
        View.FullTab.CreateRoom.init("CreateRoom");
    })
    View.FullTab.onPush("Confirm", "#popup-create-room", () => { 
        var fd = View.FullTab.CreateRoom.getVal("#popup-create-room");
        if (fd) {
            View.FullTab.doShow("View");
            View.FullTab.default();
            IndexView.helper.showToastProcessing('Process', 'Đang xử lí');
            Api.Combo.Store(fd)
                .done(res => { 
                    IndexView.helper.showToastSuccess('Success', 'Thành công');
                    getDataRoom($('.data-hotel-id').val());
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
        }
    })

    // Update Combo
    View.FullTab.onShow("RoomEdit", (id) => {
        View.FullTab.doShow("UpdateRoom");
        View.FullTab.UpdateRoom.init("UpdateRoom");
        IndexView.helper.showToastProcessing('Process', 'Đang xử lí');
        Api.Combo.getOne(id)
            .done(res => { 
                IndexView.helper.showToastSuccess('Success', 'Lấy ra dữ liệu'); 
                View.FullTab.UpdateRoom.setVal("#popup-update-room", res.data);
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    })
    View.FullTab.onPush("Confirm", "#popup-update-room", () => { 
        var fd = View.FullTab.UpdateRoom.getVal("#popup-update-room");
        if (fd) {
            View.FullTab.doShow("View");
            View.FullTab.default();
            IndexView.helper.showToastProcessing('Process', 'Đang xử lí');
            Api.Combo.Update(fd)
                .done(res => { 
                    IndexView.helper.showToastSuccess('Success', 'Thành công');
                    getDataRoom($('.data-hotel-id').val());
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
        }
    })

    // Delete Combo
    View.FullTab.onShow("RoomDelete", (id) => {
        View.FullTab.doShow("DeleteRoom");
        View.FullTab.Delete.init("DeleteRoom"); 
        View.FullTab.Delete.setVal("#popup-delete-room", id)
    })
    View.FullTab.onPush("Delete", "#popup-delete-room", () => {
        View.FullTab.doShow("View");
        View.FullTab.default();
        IndexView.helper.showToastProcessing('Process', 'Đang xử lí');
        Api.Combo.Delete($("#popup-delete-room").find('.data-id').val())
            .done(res => { 
                IndexView.helper.showToastSuccess('Success', 'Thành công');
                getDataRoom($('.data-hotel-id').val());
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    })

    function getData(){
        Api.Location.GetAll()
            .done(res => {
                View.Location.Data = res.data;
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
        Api.Position.GetAll()
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

    function getDataRoom(id){
        Api.Combo.GetAll(id)
            .done(res => {
                $(".hotel-name").html(res.data.position.name)
                IndexView.table.clearRows();
                Object.values(res.data.combo).map(v => {
                    IndexView.table.insertRow(View.room.__generateDTRow(v));
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
