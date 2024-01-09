@extends('admin.layout')
@section('title', 'Khách sạn')
@section('menu-data')
<input type="hidden" name="" class="menu-data" value="combo-group | combo">
@endsection()


@section('css')

@endsection()


@section('body')

    
<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between notification relative" id="notification">
        <div class="media align-center justify-content-between m-b-15 w-100">
            <div class="m-l-15">
                <h4 class="m-b-0">Combo - Vị trí</h4>
            </div>
            @include('admin.alert')
        </div>
    </div>
</div>
<input type="hidden" class="form-control data-hotel-id">
<div class="card data-custom-tab on-show" data-tab-name="Table">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="align-justify-center">
                    <a href="#" class="btn btn-default btn-sm flex-right tab-action" atr="Create">Tạo mới<i class="fas fa-plus m-l-5"></i></a> 
                </div>
            </div>
        </div>
        <div class="m-t-25">
            <table id="data-table" class="table"> </table>
        </div>
    </div>
</div>

<div class="data-custom-tab" data-tab-name="View" id="popup-view"> </div>
<div class="data-custom-tab" data-tab-name="Create" id="popup-create"> </div>
<div class="data-custom-tab" data-tab-name="Update" id="popup-update"> </div>
<div class="data-custom-tab" data-tab-name="Delete" id="popup-delete"> </div>
<div class="data-custom-tab" data-tab-name="CreateRoom" id="popup-create-room"> </div>
<div class="data-custom-tab" data-tab-name="UpdateRoom" id="popup-update-room"> </div>
<div class="data-custom-tab" data-tab-name="DeleteRoom" id="popup-delete-room"> </div>

<div class="layout-tab-create">
    <input type="hidden" class="form-control data-id">
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-body"> 
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tổng quan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="false">Hình ảnh</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" id="policy-tab" data-toggle="tab" href="#policy" role="tab" aria-controls="policy" aria-selected="false">Chính sách</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lưu ý và quy định</a>
                        </li> 
                    </ul>
                    <div class="tab-content m-t-15" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">   
                                    <div class="tab-content" id="myTabContent">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label control-label">Tên nhóm Combo*</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control data-name" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label control-label">Địa điểm*</label> 
                                                             <div class="col-md-8">
                                                                <div class="radio">
                                                                    <input id="radio1" name="location" value="1" type="radio">
                                                                    <label for="radio1">Trong nước</label>
                                                                </div>
                                                                <div class="radio">
                                                                    <input id="radio2" name="location" value="2" type="radio">
                                                                    <label for="radio2">Quốc tế</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row ">
                                                            <label class="col-sm-4 col-form-label control-label">Vị trí*</label> 
                                                             <div class="col-md-8 position-data">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label control-label">Nhúng bản đồ*</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control data-map" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label control-label">Tiện ích*</label> 
                                                             <div class="col-md-8 data-utilities">

                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="tab-content" id="myTabContent2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-12 col-form-label control-label m-b-10">Tổng quan giới thiệu*</label>
                                                            <div class="col-md-12">
                                                                <textarea type="text" class="form-control data-description" placeholder="" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-12 col-form-label control-label m-b-10">Dịch vụ bao gồm* ( <p style="display: inline;">Xuống dòng để tách các dịch vụ</p> )</label>
                                                            <div class="col-md-12">
                                                                <textarea type="text" class="form-control data-service" placeholder="" rows="8"></textarea>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                            <div class="form-group image-select-group">
                                <div class="form-header">
                                    <label>Hình ảnh * ( nên lựa các ảnh có cùng kích cỡ: ví dụ 450 x 300 ) </label>
                                    <label class="image-select" for="image_list"><i class="fas fa-upload m-r-10"></i>Chọn ảnh</label>
                                    <input type="file" class="form-control image-list product-images" id="image_list" name="image_list[]" required="" accept="image/*" multiple="">
                                </div>
                                <div class="form-preview multi-upload">
                                </div>
                            </div>
                        </div> 
                        <div class="tab-pane fade" id="policy" role="tabpanel" aria-labelledby="policy-tab">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label control-label m-b-10">Ẩm thực * ( <p style="display: inline;">Xuống dòng để tách các chính sách</p> )</label>
                                        <div class="col-md-12">
                                            <textarea type="text" class="form-control data-policy-01" placeholder="" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label control-label m-b-10">Phương tiện * ( <p style="display: inline;">Xuống dòng để tách các chính sách</p> )</label>
                                        <div class="col-md-12">
                                            <textarea type="text" class="form-control data-policy-02" placeholder="" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label control-label m-b-10">Giải trí * ( <p style="display: inline;">Xuống dòng để tách các chính sách</p> )</label>
                                        <div class="col-md-12">
                                            <textarea type="text" class="form-control data-policy-03" placeholder="" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="timeline-list row">
                                
                            </div>
                            <div class="timeline-create col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button class="btn btn-primary timeline-action" atr="Create TimeLine">Thêm quy định</button>
                            </div>
                        </div> 
                    </div>
                    <div class="error-log"> </div>
                    <div class="form-group text-right">
                        <button class="btn btn-defauld mr-2 tab-action" atr="Table">Hủy</button>
                        <button class="btn btn-primary full-tab-action" atr="Confirm">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="layout-tab-delete">
    <input type="hidden" class="form-control data-id">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-body">   
                    <h3>Xóa đối tượng</h3>
                    <div class="form-group text-right">
                        <button class="btn btn-defauld mr-2 tab-action" atr="Table">Hủy</button>
                        <button class="btn btn-primary full-tab-action" atr="Delete">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="layout-tab-view">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <button class="btn btn-defauld mr-2 tab-action" atr="Table"><i class="fas fa-chevron-left"></i> Quay lại</button>
                </div>
                <h3 class="col-sm-12 col-md-4 align-justify-center hotel-name"></h3>
                <div class="col-sm-12 col-md-4">
                    <div class="align-justify-center">
                        <a href="#" class="btn btn-default btn-sm flex-right tab-action" atr="CreateRoom">Tạo mới<i class="fas fa-plus m-l-5"></i></a> 
                    </div>
                </div>
            </div>
            <div class="m-t-25">
                <table id="data-room" class="table"> </table>
            </div>
        </div>
    </div>
</div>
<div class="layout-tab-create-room">
    <input type="hidden" class="form-control data-id">
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">   
                            <div class="tab-content" id="myTabContent">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label control-label">Tên combo*</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control data-name" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label control-label">Hình ảnh ( 400 x 200 )</label> 
                                                    <div class="col-md-8">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input image-input data-image" id="customFile" accept="image/*">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div> 
                                                        <div class="image-preview form-preview">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label control-label">Đơn giá*</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control data-prices type-number" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label control-label">Giảm giá ( % )</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control data-discount type-number" placeholder="" value="0">
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label control-label m-b-10">Mô tả combo*</label>
                                                <div class="col-md-12">
                                                    <textarea type="text" class="form-control data-properties" placeholder="" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label control-label m-b-10">Dịch vụ bao gồm* ( <p style="display: inline;">Xuống dòng để tách các dịch vụ</p> )</label>
                                                <div class="col-md-12">
                                                    <textarea type="text" class="form-control data-services" placeholder="" rows="8"></textarea>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="error-log"> </div>
                    <div class="form-group text-right">
                        <button class="btn btn-defauld mr-2 tab-action" atr="TableRoom">Hủy</button>
                        <button class="btn btn-primary full-tab-action" atr="Confirm">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
 

@section('js')
    
    <script src="{{ asset('manager/assets/js/page/combo.js') }}"></script>

@endsection()