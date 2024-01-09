@extends('customer.layout')
@section('title', "Trang chủ")


@section('css')

@endsection()


@section('body') 
	<input type="hidden" value="tour" class="nav-highlight">
	<div class="I-tour-page">
		<div class="wrapper">
			<div class="tour-page-header">
				<div class="header-title">
					Lựa chọn hàng trăm điểm đến hấp dẫn
				</div>
				<div class="tour-page-search">
					<select name="" id="">
						<option value="1">Trong nước</option>
						<option value="2">Quốc tế</option>
					</select>
					<input type="text" placeholder="Bạn muốn đi đâu">
					<button>Tìm kiếm</button>
				</div>
			</div>
			<div class="category-wrapper">
				<div class="filter-wrapper">
					<div class="filter-block" group-name="tab">
						<div class="filter-title">
							Phân loại theo
						</div>
						<div class="filter-item-list">
							<div class="filter-item" value="tour">
								<div class="item-input"></div>
								<div class="item-title">Tour</div>
							</div>
							<div class="filter-item" value="combo">
								<div class="item-input"></div>
								<div class="item-title">Combo</div>
							</div>
							<div class="filter-item" value="hotel">
								<div class="item-input"></div>
								<div class="item-title">Khách sạn</div>
							</div>
							<div class="filter-item" value="yacht">
								<div class="item-input"></div>
								<div class="item-title">Du thuyền</div>
							</div>
						</div>
					</div>
					<div class="filter-block" group-name="budget">
						<div class="filter-title">
							Ngân sách du lịch
						</div>
						<div class="filter-item-list">
							<div class="filter-item" value="3000000">
								<div class="item-input"></div>
								<div class="item-title">Dưới 3.000.000đ</div>
							</div>
							<div class="filter-item" value="5000000">
								<div class="item-input"></div>
								<div class="item-title">Dưới 5.000.000đ</div>
							</div>
							<div class="filter-item" value="15000000">
								<div class="item-input"></div>
								<div class="item-title">Dưới 15.000.000đ</div>
							</div>
							<div class="filter-item" value="30000000">
								<div class="item-input"></div>
								<div class="item-title">Dưới 30.000.000đ</div>
							</div>
						</div>
					</div>
					<div class="filter-block" group-name="location_type">
						<div class="filter-title">
							Địa điểm du lịch
						</div>
						<div class="filter-item-list">
							<div class="filter-item" value="1">
								<div class="item-input"></div>
								<div class="item-title">Trong nước</div>
							</div>
							<div class="filter-item" value="2">
								<div class="item-input"></div>
								<div class="item-title">Quốc tế</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filter-nav-control">
					<i class="fas fa-filter"></i>
				</div>
				<div class="tour-category-wrapper">
					<div class="sort-wrapper">
						<select name="" id="" class="sort-value">
							<option value="0">Sắp xếp theo</option>
							<option value="1">Giá tăng dần</option>
							<option value="2">Giá giảm dần</option>
							<option value="3">Đang giảm giá</option>
						</select>
					</div>
					<div class="tour-list">
						<div class="tour-wrapper">
							<div class="I-tour tour-item">
								<div class="item-badge">
									Giảm 23%
								</div>
								<a href="" class="item-image" style="background-image: url('{{ asset("customer/assets/images/offer-01.jpg")  }}')"></a>
								<div class="item-desctiption">
									<a href="" class="item-name">Tour Du Lịch Hà Giang 3 Ngày 2 Đêm</a>
									<div class="item-time">
										<span><i class="far fa-clock m-r-10"></i>3 ngày 2 đêm </span>
										<span><i class="fas fa-map-marker-alt m-r-10"></i>Sapa</span>
									</div>
									<div class="item-price">
										<div class="price-data">
											3,490,000 đ
										</div>
										<div class="price-real">
											2,150,000 đ
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tour-wrapper">
							<div class="I-tour tour-item">
								<div class="item-badge">
									Giảm 23%
								</div>
								<a href="" class="item-image" style="background-image: url('{{ asset("customer/assets/images/offer-01.jpg")  }}')"></a>
								<div class="item-desctiption">
									<a href="" class="item-name">Tour Du Lịch Hà Giang 3 Ngày 2 Đêm</a>
									<div class="item-time">
										<span><i class="far fa-clock m-r-10"></i>3 ngày 2 đêm </span>
										<span><i class="fas fa-map-marker-alt m-r-10"></i>Sapa</span>
									</div>
									<div class="item-price">
										<div class="price-data">
											3,490,000 đ
										</div>
										<div class="price-real">
											2,150,000 đ
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tour-wrapper">
							<div class="I-tour tour-item">
								<div class="item-badge">
									Giảm 23%
								</div>
								<a href="" class="item-image" style="background-image: url('{{ asset("customer/assets/images/offer-01.jpg")  }}')"></a>
								<div class="item-desctiption">
									<a href="" class="item-name">Tour Du Lịch Hà Giang 3 Ngày 2 Đêm</a>
									<div class="item-time">
										<span><i class="far fa-clock m-r-10"></i>3 ngày 2 đêm </span>
										<span><i class="fas fa-map-marker-alt m-r-10"></i>Sapa</span>
									</div>
									<div class="item-price">
										<div class="price-data">
											3,490,000 đ
										</div>
										<div class="price-real">
											2,150,000 đ
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tour-wrapper">
							<div class="I-tour tour-item">
								<div class="item-badge">
									Giảm 23%
								</div>
								<a href="" class="item-image" style="background-image: url('{{ asset("customer/assets/images/offer-01.jpg")  }}')"></a>
								<div class="item-desctiption">
									<a href="" class="item-name">Tour Du Lịch Hà Giang 3 Ngày 2 Đêm</a>
									<div class="item-time">
										<span><i class="far fa-clock m-r-10"></i>3 ngày 2 đêm </span>
										<span><i class="fas fa-map-marker-alt m-r-10"></i>Sapa</span>
									</div>
									<div class="item-price">
										<div class="price-data">
											3,490,000 đ
										</div>
										<div class="price-real">
											2,150,000 đ
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tour-wrapper">
							<div class="I-tour tour-item">
								<div class="item-badge">
									Giảm 23%
								</div>
								<a href="" class="item-image" style="background-image: url('{{ asset("customer/assets/images/offer-01.jpg")  }}')"></a>
								<div class="item-desctiption">
									<a href="" class="item-name">Tour Du Lịch Hà Giang 3 Ngày 2 Đêm</a>
									<div class="item-time">
										<span><i class="far fa-clock m-r-10"></i>3 ngày 2 đêm </span>
										<span><i class="fas fa-map-marker-alt m-r-10"></i>Sapa</span>
									</div>
									<div class="item-price">
										<div class="price-data">
											3,490,000 đ
										</div>
										<div class="price-real">
											2,150,000 đ
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tour-wrapper">
							<div class="I-tour tour-item">
								<div class="item-badge">
									Giảm 23%
								</div>
								<a href="" class="item-image" style="background-image: url('{{ asset("customer/assets/images/offer-01.jpg")  }}')"></a>
								<div class="item-desctiption">
									<a href="" class="item-name">Tour Du Lịch Hà Giang 3 Ngày 2 Đêm</a>
									<div class="item-time">
										<span><i class="far fa-clock m-r-10"></i>3 ngày 2 đêm </span>
										<span><i class="fas fa-map-marker-alt m-r-10"></i>Sapa</span>
									</div>
									<div class="item-price">
										<div class="price-data">
											3,490,000 đ
										</div>
										<div class="price-real">
											2,150,000 đ
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tour-wrapper">
							<div class="I-tour tour-item">
								<div class="item-badge">
									Giảm 23%
								</div>
								<a href="" class="item-image" style="background-image: url('{{ asset("customer/assets/images/offer-01.jpg")  }}')"></a>
								<div class="item-desctiption">
									<a href="" class="item-name">Tour Du Lịch Hà Giang 3 Ngày 2 Đêm</a>
									<div class="item-time">
										<span><i class="far fa-clock m-r-10"></i>3 ngày 2 đêm </span>
										<span><i class="fas fa-map-marker-alt m-r-10"></i>Sapa</span>
									</div>
									<div class="item-price">
										<div class="price-data">
											3,490,000 đ
										</div>
										<div class="price-real">
											2,150,000 đ
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tour-wrapper">
							<div class="I-tour tour-item">
								<div class="item-badge">
									Giảm 23%
								</div>
								<a href="" class="item-image" style="background-image: url('{{ asset("customer/assets/images/offer-01.jpg")  }}')"></a>
								<div class="item-desctiption">
									<a href="" class="item-name">Tour Du Lịch Hà Giang 3 Ngày 2 Đêm</a>
									<div class="item-time">
										<span><i class="far fa-clock m-r-10"></i>3 ngày 2 đêm </span>
										<span><i class="fas fa-map-marker-alt m-r-10"></i>Sapa</span>
									</div>
									<div class="item-price">
										<div class="price-data">
											3,490,000 đ
										</div>
										<div class="price-real">
											2,150,000 đ
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="woocommerce-pagination"> </div>
				</div>
			</div>
		</div>
	</div>
@endsection()

@section('js') 
<script type="text/javascript" src="{{ asset("customer/assets/js/page/category.js") }}"></script> 
@endsection()