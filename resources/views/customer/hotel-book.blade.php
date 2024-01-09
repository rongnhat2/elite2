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
					<div class="booking-preview">
						<div class="hotel-preview" style="background-image: url('{{ asset("customer/assets/images/offer-03.jpg")  }}');"></div>
						<div class="hotel-infomation">
							<div class="hotel-data-description">
								<div class="hotel-name">Topas Ecolodge Sapa</div>
								<div class="hotel-position"><i class="fas fa-map-marker-alt m-r-10"></i>Topas Ecolodge Sapa</div>
							</div>
							<div class="hotel-data-room">

							</div>
						</div>
					</div>
					<div class="booking-form">
						<div class="form-book-wrapper">
							<h3>Thông tin đặt lịch</h3>
							<div class="form-wrapper">
								<div class="form-title">Họ và tên </div>
								<div class="form-content">
									<input type="text" class="data-name">
								</div>
							</div>
							<div class="form-wrapper">
								<div class="form-title">Số điện thoại </div>
								<div class="form-content">
									<input type="text" class="data-phone type-number">
								</div>
							</div>
							<div class="form-wrapper">
								<div class="form-title">Email </div>
								<div class="form-content">
									<input type="text" class="data-email">
								</div>
							</div>
							<div class="form-wrapper">
								<div class="line"></div>
							</div>
							<div class="form-wrapper">
								<div class="form-title">Ngày nhận phòng </div>
								<div class="form-content">
									<input type="text" disabled="" class="datestart">
								</div>
							</div>
							<div class="form-wrapper">
								<div class="form-title">Ngày trả phòng </div>
								<div class="form-content">
									<input type="text" disabled="" class="dateend">
								</div>
							</div>
							<div class="form-wrapper">
								<div class="form-title">Số lượng phòng </div>
								<div class="form-content">
									<input type="text" disabled="" class="room">
								</div>
							</div>
							<div class="form-wrapper">
								<div class="form-title">Số ngày </div>
								<div class="form-content">
									<input type="text" disabled="" class="time">
								</div>
							</div>
							<div class="form-wrapper">
								<div class="form-title">Đơn giá ngày</div>
								<div class="form-content">
									<input type="text" disabled="" class="count_prices">
								</div>
							</div>
							<div class="form-wrapper">
								<div class="form-title">Thành tiền </div>
								<div class="form-content">
									<input type="text" disabled="" class="prices">
								</div>
							</div>
							<div class="noti"></div>
							<div class="form-wrapper">
								<button class="send-form-data">Gửi thông tin</button>
							</div>
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