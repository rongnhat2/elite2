@extends('customer.layout')
@section('title', "Khách sạn")


@section('css')

@endsection()


@section('body') 
	<input type="hidden" value="hotel" class="nav-highlight">
	<div class="I-tour-page">
		<div class="wrapper">
			<div class="tour-page-wrapper">
				<div class="page-booking">
					<div class="booking-form" style="width: 100%;">
						<div class="form-book-wrapper">
							<h3>Đặt lịch thành công</h3>
							<h3>Thông tin chuyển khoản</h3>
							<div class="form-wrapper">
								<div class="line"></div>
							</div>
							<div class="form-wrapper">
								<div class="form-title">Họ và tên </div>
								<div class="form-content">
									<input type="text" disabled="" value="Nguyễn Nhật Long">
								</div>
							</div>
							<div class="form-wrapper">
								<div class="form-title">Ngân hàng </div>
								<div class="form-content">
									<input type="text" disabled="" value="Vietcombank">
								</div>
							</div>
							<div class="form-wrapper">
								<div class="form-title">Số tài khoản </div>
								<div class="form-content">
									<input type="text" disabled="" value="0451000497812">
								</div>
							</div>
							<p>* Vui lòng chuyển khoản với nội dung là số điện thoại đặt lịch</p>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
	<div class="I-tour-page">
		<div class="wrapper">
			<div class="tour-page-main">
				<div class="main-featured">
					<div class="feature-title">
						Tour nội địa đặc sắc nhất
					</div>
					<div class="feature-main owl-carousel" id="feature-carousel">
                        <a href="#" class="carousel-item-element" style="background-image: url('{{ asset("customer/assets/images/offer-01.jpg") }}')">  </a>
                        <a href="#" class="carousel-item-element" style="background-image: url('{{ asset("customer/assets/images/offer-02.jpg") }}')">  </a> 
                        <a href="#" class="carousel-item-element" style="background-image: url('{{ asset("customer/assets/images/offer-03.jpg") }}')">  </a> 
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection()

@section('js') 
<script type="text/javascript" src="{{ asset("customer/assets/js/page/hotel-book.js") }}"></script> 
@endsection()