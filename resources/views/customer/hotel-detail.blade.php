@extends('customer.layout')
@section('title', "Trang chủ")


@section('css')

@endsection()


@section('body') 
	<input type="hidden" value="hotel" class="nav-highlight">
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
					<div class="booking-wrapper m-b-30" id="room-list">
						<div class="booking-element w-40">
							<div class="element-wrapper">
								<input type="text" name="dates">
							</div>
						</div>
						<div class="booking-element w-40">
							<div class="element-wrapper">
								<div class="client-wrapper">
									<i class="fas fa-users"></i>
									<div class="client-select">
										<p>1 phòng</p>
										<p>1 người lớn, 0 trẻ em, 0 em bé</p>
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
						<div class="booking-element w-20">
							<div class="element-wrapper">
								<button class="form-confirm"><i class="fas fa-clipboard-check m-r-10"></i>Xác nhận</button>
							</div>
						</div>
					</div>
					<div class="infor-wrapper">
						<div class="info-header">
							Đặt phòng
						</div>
						<div class="room-list">

						</div>
						<div class="schedule-content hotel-room-list">

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
					<div class="form-booking">
						<div class="form-header">
							<img src="" class="image-banner" alt="">
							<div class="topbg"></div>
						</div>
						<div class="form-body">
							<div class="hotel-name">Melia Vinpearl Hà Tĩnh </div>
							<div class="hotel-room">Đặt phòng</div>
							<div class="hotel-element-people">
								(Người lớn: 1, Trẻ em: 1, Em bé: 0)
							</div>
							<div class="hotel-element-wrapper">
								<div class="element-name">Ngày nhận: </div>
								<div class="element-value date-start"></div>
							</div>
							<div class="hotel-element-wrapper">
								<div class="element-name">Ngày trả: </div>
								<div class="element-value date-end"></div>
							</div>
							<div class="hotel-element-wrapper">
								<div class="element-name">Thời gian: </div>
								<div class="element-value numberdays"></div>
							</div>
							<div class="hotel-element-wrapper">
								<div class="element-name">Số lượng: </div>
								<div class="element-value room-size"></div>
							</div>
							<div class="hotel-element-wrapper">
								<div class="element-name">Đơn giá ngày: </div>
								<div class="element-value day-prices"></div>
							</div>
							<div class="hotel-element-wrapper">
								<div class="element-name">Tổng tiền: </div>
								<div class="element-value bold total-prices"></div>
							</div>
						</div>
						<div class="noti"></div>
						<div class="form-footer">
							<div class="form-action">Đặt phòng</div>
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
<script type="text/javascript" src="{{ asset("customer/assets/js/page/hotel-detail.js") }}"></script> 
@endsection()