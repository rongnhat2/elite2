@extends('admin.layout')
@section('title', 'Bố cục')
@section('menu-data')
<input type="hidden" name="" class="menu-data" value="layout-group | layout">
@endsection()


@section('css')

@endsection()


@section('body')

    
<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between notification relative" id="notification">
        <div class="media align-center justify-content-between m-b-15 w-100">
            <div class="m-l-15">
                <h4 class="m-b-0">Bố cục</h4>
            </div>
            @include('admin.alert')
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 offset-3">
        <div class="card">
            <div class="card-body" id="form-data"> 
                <div class="form-group">
                    <label>Carousel ( 1920 x 800 )</label>
                    <input type="file" class="form-control image-list" id="image-update" name="image"  accept="image/*" multiple="">
                    <div class="form-preview multi-upload"> </div>
                </div> 
                <p>Nếu có 2 thông tin trở lên, hãy xuống dòng</p>
                <div class="form-group">
                    <label >Địa chỉ</label>
                    <textarea type="text" class="form-control data-address" placeholder=""></textarea>
                </div>
                <div class="form-group">
                    <label >Hotline</label>
                    <textarea type="text" class="form-control data-hotline" placeholder=""></textarea>
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <textarea type="text" class="form-control data-email" placeholder=""></textarea>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tiếng việt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tiếng anh</a>
                    </li> 
                </ul>
                <div class="tab-content m-t-15" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="form-group">
                            <label >Mô tả cuối trang</label>
                            <textarea type="text" class="form-control data-description-vi" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="form-group">
                            <label >Mô tả cuối trang</label>
                            <textarea type="text" class="form-control data-description-en" placeholder=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary full-tab-action" atr="Confirm">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection()
 

@section('js')
    
    <script src="{{ asset('manager/assets/js/page/layout.js') }}"></script>

@endsection()