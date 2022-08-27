<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="{{asset('frontend/assets/dist/img/img/logoLOL.png')}}">

		<title>tin tức 24h lck</title>

		<!-- Bootstrap core CSS -->
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
		
		<link rel="stylesheet" href="{{asset('frontend/assets/dist/css/bootstrap.css')}}">
		
		 <link rel="stylesheet" href="{{asset('frontend/assets/dist/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="{{asset('frontend/assets/dist/css/dark-mode.css')}}">
		
		<!-- Custom styles for this template -->
		<link href="starter-template.css" rel="stylesheet">
	</head>

	<body>
		<nav class="navbar navbar-expand-md bg-light shadow-sm fixed-top
		  ">
			<a class="navbar-brand" href="#"><img src="{{asset('frontend/assets/dist/img/logoLOL.png')}}" alt="" width="65px"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="fas fa-bars bg-black"></i></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto dark">
					<li class="nav-item active">
						<a class="nav-link" href="{{ url('') }}"><i class="fa fa-home"></i>Trang chủ <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"> <i class="fa fa-list-ol mr-1"></i> BXH</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="#"><i class="fa fa-calendar mr-1"></i>lịch đấu</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tin tức giải đấu</a>
						<div class="dropdown-menu" aria-labelledby="dropdown01">
							<?php 
				 				//->get() là lấy tất cả kết quả trả về
				 				//có thể dùng full sql
				 				//$categories = DB::select("select *from categories order by id desc")
				 				$categories = DB::table("categories")->orderBy("id","desc")->get();
				 				  ?>
				 				  @foreach($categories as $rows)
				 				<a class="dropdown-item" href="{{url('category/news/'.$rows->id)}}">{{$rows->name}}</a>
				 			
				 				@endforeach
							
						
						</div>
					</li>
					

				</ul>
				

						{{-- <!-- TÌM KIẾM -->
					<div class="ip-sreach">
  					<input type="text" placeholder="Search...">
  					<div class="search"></div>
					</div>
				<!-- END SEARCH --> --}}
			</div>
		</nav>
<div class="custom-control custom-switch " style="position: fixed;bottom:20%;left:10px;transform: rotate(90deg);">
						<input type="checkbox" class="custom-control-input" id="darkSwitch" />
						<label class="custom-control-label" for="darkSwitch">Dark</label>
					</div>
	<div class="container bg-light  " style="margin-top: 95px;">

			<div class="starter-template">
				<h1>Tin tức </h1>
				<div class="row">
	
	
				 <div class="col-sm-12">
				 	<div class="row">
				 	<!-- home new -->
				 		@yield("do-du-lieu")
					<!-- end home new -->
					{{-- <!-- category -->
					
					@include("frontend.category")
					<!-- end cate --> --}}
					</div>
				</div>

			<!-- gift pr -->
			<div class="col-12">
			<div class="row">
				<div class="col-sm"><div style="padding-top:50.000%;position:relative;"><iframe src="https://gifer.com/embed/79dh" width="100%" height="100%" style='position:absolute;top:0;left:0;' frameBorder="0" allowFullScreen></iframe></div></div>
				<div class="col-sm"><div style="padding-top:50.000%;position:relative;"><iframe src="https://gifer.com/embed/79dh" width="100%" height="100%" style='position:absolute;top:0;left:0;' frameBorder="0" allowFullScreen></iframe></div></div>
				<div class="col-sm"><div style="padding-top:50.000%;position:relative;"><iframe src="https://gifer.com/embed/79dh" width="100%" height="100%" style='position:absolute;top:0;left:0;' frameBorder="0" allowFullScreen></iframe></div></div><div class="col-sm"><div style="padding-top:50.000%;position:relative;"><iframe src="https://gifer.com/embed/79dh" width="100%" height="100%" style='position:absolute;top:0;left:0;' frameBorder="0" allowFullScreen></iframe></div></div>
				</div>
			</div>
			<!-- gift pr -->

		</div><!-- /.container -->


<!-- footer -->
<div class="jumbotron bg-light ">
	<div class="row">
		<div class="col-sm-3">
			<p>Cơ quan chủ quản: Công ty cổ phần tin tức LCK TP. Hà Nội.</p>
			<p>Điện thoại: 024.32</p>
		</div>
		<div class="col-sm-3">
			<p>

	GP số: 236/GP-BTTTT do Bộ Thông tin và Truyền thông cấp ngày 10/05/2016.
	Người chịu trách nhiệm nội dung: Bà Trần Thùy Chi

	<p>Thỏa thuận chia sẻ nội dung. Chính sách bảo mật</p>

	<p>Báo giá quảng cáo: tải tại đây</p>

	<p>Liên hệ quảng cáo, truyền thông, hợp tác kinh doanh: 0912 075 444
</p>
	Email: kinhdoanh@lck24h.com.vn </p>
		</div>
	
	<div class="col-sm-3">
						<div class="col-sm">					 		
				 			<ul> <h3>Danh mục</h3>
				 				<?php 
				 				//->get() là lấy tất cả kết quả trả về
				 				//có thể dùng full sql
				 				//$categories = DB::select("select *from categories order by id desc")
				 				$categories = DB::table("categories")->orderBy("id","desc")->get();
				 				  ?>
				 				  @foreach($categories as $rows)
				 				<li><a href="{{url('category/news/'.$rows->id)}}">{{$rows->name}}</a></li>
				 			
				 				@endforeach
				 			</ul>


				 			{{-- <div style="padding-top:100.000%;position:relative;"><iframe src="https://gifer.com/embed/4Kj3" width="100%" height="100%" style='position:absolute;top:0;left:0;' frameBorder="0" allowFullScreen></iframe></div> --}}
				
				 	</div>

  </div>
		<div class="col-sm-3 text-center"><img src="{{asset('frontend/assets/dist/img/logoLOL.png')}}" alt=""  height="130px"></div>
	</div>

</div>

<!-- end footer -->		

		<!-- Bootstrap core JavaScript ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

		
		<script>
			/*!
 * Dark Mode Switch v1.0.1 (https://github.com/coliff/dark-mode-switch)
 * Copyright 2021 C.Oliff
 * Licensed under MIT (https://github.com/coliff/dark-mode-switch/blob/main/LICENSE)
 */
var darkSwitch=document.getElementById("darkSwitch");window.addEventListener("load",(function(){if(darkSwitch){initTheme();darkSwitch.addEventListener("change",(function(){resetTheme()}))}}));function initTheme(){var darkThemeSelected=localStorage.getItem("darkSwitch")!==null&&localStorage.getItem("darkSwitch")==="dark";darkSwitch.checked=darkThemeSelected;darkThemeSelected?document.body.setAttribute("data-theme","dark"):document.body.removeAttribute("data-theme")}function resetTheme(){if(darkSwitch.checked){document.body.setAttribute("data-theme","dark");localStorage.setItem("darkSwitch","dark")}else{document.body.removeAttribute("data-theme");localStorage.removeItem("darkSwitch")}}
		</script>
	</body>
</html>