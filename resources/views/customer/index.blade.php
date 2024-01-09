@extends('customer.layout')
@section('title', "Trang chủ")


@section('css')

@endsection()


@section('body') 
	<input type="hidden" value="index" class="nav-highlight">
	<div class="I-carousel">
		<div class="carousel-wrapper">
			<div class="owl-carousel" id="banner-carousel"> 

			</div>
		</div>
	</div>
	<div class="I-booking">
		<div class="wrapper">
			<div class="booking-wrapper">
				<div class="booking-element w-40">
					<div class="element-wrapper suggest-list">
						<input type="text" placeholder="Tên khách sạn" class="product-search-field">
					</div>
				</div>
				<div class="booking-element w-20">
					<div class="element-wrapper">
						<input type="text" name="dates">
					</div>
				</div>
				<div class="booking-element w-25">
					<div class="element-wrapper">
						<div class="client-wrapper">
							<i class="fas fa-users"></i>
							<div class="client-select">
								<p>1 phòng</p>
								<p>1 người lớn, 1 trẻ em, 1 em bé</p>
							</div>
							<div class="client-block">
								<div class="client-item">
									<div class="item-title">Số phòng</div>
									<input type="text" class="item-input type-number data-room" value="1">
								</div>
								<div class="client-item">
									<div class="item-title">Người lớn</div>
									<input type="text" class="item-input type-number data-man" value="0">
								</div>
								<div class="client-item">
									<div class="item-title">Trẻ em</div>
									<input type="text" class="item-input type-number data-chill" value="0">
								</div>
								<div class="client-item">
									<div class="item-title">Em bé</div>
									<input type="text" class="item-input type-number data-baby" value="0">
								</div>
								<div class="client-item">
									<div class="item-title"></div>
									<button class="room-confirm"><i class="fas fa-clipboard-check m-r-10"></i>Xác nhận</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="booking-element w-15">
					<div class="element-wrapper">
						<button class="form-confirm"><i class="fas fa-search m-r-10"></i>Tìm kiếm</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="I-offer">
		<div class="wrapper">
			<div class="offer-wrapper">
				<h2 class="offer-title">
					Hôm nay có gì?
				</h2>
				<p class="offer-description">
					Chỉ có tại Elitle tour, Ưu đãi lớn, Book ngay
				</p>
				<div class="list-item owl-carousel" id="offer-carousel">
					
				</div>
			</div>
		</div>
	</div>
	<div class="I-place">
		<div class="wrapper">
			<div class="place-wrapper">
				<h2 class="place-title">
					Địa điểm nổi bật
				</h2>
				<p class="place-description">
					Hãy đặt chân khám phá cùng Elite Tour những điểm đến hấp dẫn
				</p>
				<div class="list-item owl-carousel" id="place-carousel">
					
				</div>
			</div>
		</div>
	</div>
	<div class="I-blog">
		<div class="wrapper">
			<div class="blog-wrapper">
				<h2 class="blog-title">
					Blog - Cẩm nang du lịch
				</h2>
				<p class="blog-description">
					Chia sẻ kinh nghiệm du lịch , các chương trình khuyến mại hấp dẫn từ Elite Tour min
				</p>
				<div class="list-item owl-carousel" id="blog-carousel">
					
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
@endsection()

@section('js') 
<script type="text/javascript" src="{{ asset("customer/assets/js/page/index.js") }}"></script> 
@endsection()