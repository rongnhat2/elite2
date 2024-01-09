@extends('admin.layout')
@section('title', 'Tin tức')
@section('menu-data')
<input type="hidden" name="" class="menu-data" value="news-group | news">
@endsection()


@section('css')

@endsection()


@section('body')

    
<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between notification relative" id="notification">
        <div class="media align-center justify-content-between m-b-15 w-100">
            <div class="m-l-15">
                <h4 class="m-b-0">Tin tức</h4>
            </div>
            @include('admin.alert')
        </div>
    </div>
</div>
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

<div class="layout-tab-create">
    <input type="hidden" class="form-control data-id">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">   
                    <div class="tab-content" id="myTabContent"> 
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="error-log"> </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label control-label">Hình ảnh ( 1920 x 600 )</label> 
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
                                            <label class="col-sm-4 col-form-label control-label">Tiêu đề</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control data-name" placeholder="">
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label control-label">Danh mục</label> 
                                            <div class="col-md-8 data-category">
                                                <div class="radio">
                                                    <input id="radio1" name="category" value="1" type="radio">
                                                    <label for="radio1">Chương trình khuyến mại</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="radio2" name="category" value="2" type="radio">
                                                    <label for="radio2">Kinh nghiệm du lịch</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="radio3" name="category" value="3" type="radio">
                                                    <label for="radio3">Lịch trình hấp dẫn</label>
                                                </div>
                                                <div class="radio">
                                                    <input id="radio4" name="category" value="4" type="radio">
                                                    <label for="radio4">Thiên đường nghỉ dưỡng</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label control-label">Mô tả ngắn</label>
                                            <div class="col-md-8">
                                                <textarea type="text" class="form-control data-description" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label control-label">Nội dung</label>
                                            <div class="col-md-8">
                                                <textarea type="text" class="form-control summernote data-detail" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
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

<div class="data-custom-tab" data-tab-name="Create" id="popup-create">
    
</div>
<div class="data-custom-tab" data-tab-name="Update" id="popup-update">
    
</div>
<div class="data-custom-tab" data-tab-name="Delete" id="popup-delete">

</div>

@endsection()
 

@section('js')
    
    <script src="{{ asset('manager/assets/js/page/news.js') }}"></script>

@endsection()