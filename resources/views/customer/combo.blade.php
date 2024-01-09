@extends('customer.layout')
@section('title', "Trang chủ")


@section('css')

@endsection()


@section('body') 
	<input type="hidden" value="combo" class="nav-highlight">
	<div class="I-tour-page">
		<div class="wrapper">
			<div class="tour-page-header">
				<div class="header-title">
					Lựa chọn hàng trăm điểm đến hấp dẫn
				</div>
				<div class="tour-page-search suggest-list">
					<select name="" id="category-search">
						<option value="1">Trong nước</option>
						<option value="2">Quốc tế</option>
					</select>
					<input type="text" placeholder="Bạn muốn đi đâu" class="product-search-field">
					<button>Tìm kiếm</button>
				</div>
			</div>
			<div class="tour-page-main">
				<div class="main-featured">
					<div class="feature-title">
						Combo nội địa đặc sắc nhất
					</div>
					<div class="feature-main owl-carousel" id="feature-carousel">
                        <a href="#" class="carousel-item-element" style="background-image: url('{{ asset("customer/assets/images/offer-03.jpg")  }}')">  </a>
                        <a href="#" class="carousel-item-element" style="background-image: url('{{ asset("customer/assets/images/offer-02.jpg")  }}')">  </a> 
                        <a href="#" class="carousel-item-element" style="background-image: url('{{ asset("customer/assets/images/offer-03.jpg")  }}')">  </a> 
					</div>
				</div>
				<div class="main-group">
					<div class="group-title">
						Tất cả các điểm đến trong nước
					</div>
					<div class="group-category inland-category">

					</div>
					<div class="group-main inland-item">

					</div>
					<div class="group-detail">
						<a href="/category?tab=combo" class="detail-button">Xem thêm</a>
					</div>
				</div>
			</div>		


			<div class="tour-page-main">
				<div class="main-featured">
					<div class="feature-title">
						Combo quốc tế đặc sắc nhất
					</div>
				</div>
				<div class="main-group">
					<div class="group-title">
						Tất cả các điểm đến quốc tế
					</div>
					<div class="group-category global-category"> 
					</div>
					<div class="group-main global-item">
						
					</div>
					<div class="group-detail">
						<a href="/category?tab=combo" class="detail-button">Xem thêm</a>
					</div>
				</div>
			</div>		
		</div>
	</div>
@endsection()

@section('js') 
<script type="text/javascript" src="{{ asset("customer/assets/js/page/combo.js") }}"></script> 
@endsection()