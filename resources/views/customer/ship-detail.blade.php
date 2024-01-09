@extends('customer.layout')
@section('title', "Trang chủ")


@section('css')

@endsection()


@section('body') 
	<input type="hidden" value="ship" class="nav-highlight">
	<input type="hidden" value="{{ $id }}" class="tour-id">
	<div class="I-tour-detail">
		<div class="wrapper">
			<h2 class="tour-detail-header">
				 
			</h2>
			<div class="tour-detail-prices">
				<div class="tour-name">
					<i class="fas fa-map-marker-alt m-r-10"></i> 
				</div>
				<div class="tour-prices">
					<div class="prices-discount">
						Giá theo phòng
					</div>
				</div>
			</div>
			<div class="tour-image-preview owl-carousel" id="image-carousel">

			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
					<div class="infor-wrapper">
						<div class="info-header">
							DỊCH VỤ BAO GỒM
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
								<div class="info-content services-content">

								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 info-map-wrapper">

							</div>
						</div>
					</div>
					<div class="infor-wrapper">
						<div class="info-header">
							Tiện Ích Combo
						</div>
						<div class="info-content combo-content">

						</div>
					</div>
					<div class="infor-wrapper">
						<div class="info-header">
							Tổng quan
						</div>
						<div class="info-content description-content">

						</div>
					</div>
					<div class="infor-wrapper">
						<div class="info-header">
							Lịch Trình
						</div>
						<div class="schedule-content">

						</div>
					</div>
					<div class="infor-wrapper">
						<div class="info-header">
							Bảng giá
						</div>
						<div class="room-content-wrapper hotel-room-list">

						</div>
					</div>
					<div class="infor-wrapper">
						<div class="info-header">
							Lưu ý và quy định
						</div>
						<div class="start-wrapper detail-data">

						</div>
					</div>
					<div class="infor-wrapper">
						<div class="info-header">
							Vị trí và phương tiện đi lại
						</div>
						<div class="start-wrapper trans-data">
										
						</div>
					</div>
					<div class="infor-wrapper">
						<div class="info-header">
							Ẩm thực
						</div>
						<div class="start-wrapper food-data">
										
						</div>
					</div>
					<div class="infor-wrapper">
						<div class="info-header">
							Giải trí
						</div>
						<div class="start-wrapper place-data">
										
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 form-sticky">
					<div class="form-contact">
						<div class="form-header">
							YÊU CẦU TƯ VẤN
						</div>
						<div class="form-content">
							<div class="form-element">
								<input type="text" class="" placeholder="Họ và tên">
							</div>
							<div class="form-element">
								<input type="text" class="" placeholder="Email">
							</div>
							<div class="form-element">
								<input type="text" class="" placeholder="Số điện thoại">
							</div>
							<div class="form-element">
								<textarea name="" id="" cols="30" rows="10" placeholder="Nội dung"></textarea>
							</div>
						</div>
						<div class="form-footer">
							<button class="form-action">Gửi yêu cầu</button>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	<div class="I-testimonials">
		<div class="wrapper">
			<div class="testimonials-wrapper">
				<h2 class="testimonials-title">
					Chia sẻ - cảm nhận từ khách hàng 
				</h2>
				<p class="testimonials-description">
					Mỗi cuộc hành trình Elite đều mang lại trải nghiệm tuyệt vời nhất cho quý khách.
				</p>
				<div class="list-item owl-carousel" id="testimonials-carousel">

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
<script type="text/javascript" src="{{ asset("customer/assets/js/page/yacht-detail.js") }}"></script> 
@endsection()