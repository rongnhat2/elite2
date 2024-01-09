@extends('customer.layout')
@section('title', "Blog")


@section('css')

@endsection()


@section('body') 
	<input type="hidden" value="blog" class="nav-highlight">
	<div class="I-blog-page I-blog">
		<div class="wrapper">
			<div class="blog-page-header">
				Blogs – du lịch
			</div>
			<div class="blog-block">
				<div class="block-title">
					Chương trình khuyến mại
				</div>
				<div class="blog-item-list" data-category="1">

				</div>
			</div>
			<div class="blog-block">
				<div class="block-title">
					Kinh nghiệm du lịch
				</div>
				<div class="blog-item-list" data-category="2">

				</div>
			</div>
			<div class="blog-block">
				<div class="block-title">
					Lịch trình hấp dẫn
				</div>
				<div class="blog-item-list" data-category="3">

				</div>
			</div>
			<div class="blog-block">
				<div class="block-title">
					Thiên đường nghỉ dưỡng
				</div>
				<div class="blog-item-list" data-category="4"> 

				</div>
			</div>
		</div>			
	</div>
@endsection()

@section('js') 
<script type="text/javascript" src="{{ asset("customer/assets/js/page/blog.js") }}"></script> 
@endsection()