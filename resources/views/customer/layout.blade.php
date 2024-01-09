<!DOCTYPE html>
<html class="is-scrolling">
<head>
	<title>Ellite - @yield('title')</title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
 
 	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="{{ asset("customer/assets/css/style.css") }}" /> 
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	<header>
		<div class="header-top">
			<div class="wrapper">
				<div class="top-wrapper">
					<div class="locate-wrapper">
						<i class="fas fa-map-marker-alt"></i>
						Hà Nội
					</div>
					<div class="contact-wrapper">
						<div class="phone-wrapper">
							<i class="fas fa-phone-alt"></i> 0123 456 789
						</div>
						<a href="">Hỏi đáp</a>
					</div>
				</div>
			</div>
		</div>
		<div class="header-nav {{ $page != "index" ? "page-nav" : "" }}">
			<div class="wrapper">
				<div class="nav-wrapper">
					<a href="/" class="header-logo">
						<img src="{{ asset("customer/assets/images/logo.png") }}" alt="">
					</a>
					<div class="navigation-main">
						<a href="/" data-nav="index"><img src="{{ asset("customer/assets/images/home.png") }}" alt="">Trang chủ</a>
						<a href="" data-nav="about"><i class="fas fa-building"></i>Giới thiệu</a>
						<a href="/tour" data-nav="tour"><img src="{{ asset("customer/assets/images/tour.png") }}" alt="">Tour</a>
						<a href="/hotel" data-nav="hotel"><img src="{{ asset("customer/assets/images/hotel.png") }}" alt="">Khách sạn</a>
						<a href="/blog" data-nav="blog"><img src="{{ asset("customer/assets/images/Blog.png") }}" alt="">Blog</a>
					</div>
					<div class="nav-control">
						<i class="fas fa-bars"></i>
					</div>
				</div>
			</div>
		</div>
	</header>
	<main> 
		@yield('body')
	</main>
	<footer>
		<div class="wrapper">
			<div class="footer-wrapper">
				<div class="footer-block w40">
					<a href="" class="logo-footer"><img src="{{ asset("customer/assets/images/logo.png") }}" alt=""></a>
					<p>Elite Tour - Đại lý du lịch uy tín, Đặt tour, phòng khách sạn và Combo du lịch giá tốt nhất.</p>
					<p>- Trụ sở chính: Head Office: Phòng 3618 - 3619, Tòa C5 D'Capitale, Số 119 Trần Duy Hưng, Hà Nội</p>
					<p>- Văn phòng tại HCM: Số 172 Bùi Viện, Quận 1, TP.HCM</p>
				</div>
				<div class="footer-block w20">
					<div class="block-title">
						Điểm đến
					</div>
					<a href="" class="link-href">Phú Quốc</a>
					<a href="" class="link-href">Đà Nẵng</a>
					<a href="" class="link-href">Đà Lạt</a>
					<a href="" class="link-href">Hà Nội</a>
				</div>
				<div class="footer-block w20">
					<div class="block-title">
						Cẩm nang
					</div>
					<a href="" class="link-href">Phú Quốc</a>
					<a href="" class="link-href">Đà Nẵng</a>
					<a href="" class="link-href">Đà Lạt</a>
					<a href="" class="link-href">Hà Nội</a>
				</div>
			</div>
			<div class="footer-bottom">
				Copyright © Elite Tour 2021 - Website đang trong quá trình chạy thử nghiệm
			</div>
		</div>
	</footer>
</body>
<script src="https://kit.fontawesome.com/d8162761f2.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
<script type="text/javascript" src="{{ asset("customer/assets/js/owl.carousel.js") }}"></script>  
<script type="text/javascript" src="{{ asset("customer/assets/js/api.js") }}"></script>  
<script type="text/javascript" src="{{ asset("customer/assets/js/pagination.js") }}"></script>  
<script type="text/javascript" src="{{ asset("customer/assets/js/window.js") }}"></script>  

@yield('js')

</html>			