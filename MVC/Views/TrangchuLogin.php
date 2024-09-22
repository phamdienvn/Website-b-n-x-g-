<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/QLKT_MVC/Public/CSS/TrangchuLogin.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/QLKT_MVC/Public/CSS/DSSinhvien.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/QLKT_MVC/Public/CSS/CapnhapSV.css">
	<title></title>
</head>
<body>
	<div class="app">
		<div class="header">
			<div class="header__logo">
				<span class="header__logo-chu">UTT</span>
			</div>
			<div class="header__right">
				<ul class="header__right-list">
					<li id="thanhmenu" class="header__right-item header__right-hover"><span href="" class="header__right-link "><i class="header__right-icon menu-icon fa-solid fa-bars"></i></span></li>
					
				</ul>
				<ul class="header__right-list header__right-uers">
					<li class="header__right-item header__right-uers"><a href=""class="header__right-link"><i class="header__right-icon fa-solid fa-user"></i></a></li>
				</ul>
				
			</div>
		</div>
		<div class="content">
			<div class="content__menu" id="ulmenu">
				<ul class="content__menu-list">
					<li class="content__menu-item"><a href="" class="content__menu-link"><i class="content__menu-icon fa-solid fa-house"></i>Trang chủ</a></li>
					<li class="content__menu-item content__menu-item-bao">
						<label for="checkbox">
						<span  class="content__menu-link"><i class="content__menu-icon fa-sharp fa-solid fa-list-check"></i>Quản lý danh mục  <i class="content__menu-icon-right content__menu-icon-xoay fa-solid fa-chevron-right"></i></span>
					</label>
						

					</li>
					<input type="checkbox" name="" hidden="" id="checkbox" class="checkbox__input">
					
					<ul  class="content__quanlydm">
							<li class="content__quanlydm-item"><a href="" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý nhân viên</a></li>
							<li class="content__quanlydm-item"><a href="http://localhost/QLKT_MVC/DSSinhvien" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý sinh viên</a></li>
							<li class="content__quanlydm-item"><a href="" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý phòng</a></li>
							<li class="content__quanlydm-item"><a href="" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý hợp đồng</a></li>
							<li class="content__quanlydm-item"><a href="" class="content__quanlydm-link"><i class="content__quanlydm-link-icon icon fa fa-chevron-circle-right"></i>Quản lý hóa đơn</a></li>
						</ul>
					<li class="content__menu-item"><a href="" class="content__menu-link"><i class="content__menu-icon fa-solid fa-pen"></i>Đăng kí phòng</a></li>
					<li class="content__menu-item"><a href="" class="content__menu-link"><i class="content__menu-icon fa-solid fa-people-roof"></i>Quản trị hệ thống<i class="content__menu-icon-right fa-solid fa-chevron-right"></i></a></li>
					<li class="content__menu-item"><a href="" class="content__menu-link"><i class="content__menu-icon fa-solid fa-chart-simple"></i>Báo cáo thống kê</a></li>
					<li class="content__menu-item"><a href="" class="content__menu-link"><i class="content__menu-icon fa-solid fa-arrow-right-from-bracket"></i>Đăng xuất</a></li>
				</ul>
			</div>
			
				<div class="content__hienthi" id="hienthi">
				
				<?php 
					 if(isset($data['page']))
					include_once './MVC/Views/Page/'.$data['page'].'.php';
					?>
			</div>
			
		</div>
		
	</div>
	<script type="text/javascript">
		
		var header= document.getElementById('thanhmenu');
		// Lấy qua class
		// var mobileMenu=document.getElementsByClassName("mobile-menu-btn");
		var Menu=document.getElementById('ulmenu');
		var Hienthi=document.getElementById('hienthi');
		var  MenuWidth=Menu.clientWidth  ;
		
		header.onclick=function() {
			console.log(Menu.clientWidth);
			console.log(MenuWidth);
			
			if(Menu.clientWidth === MenuWidth){
				Menu.style.display='none';
				document.getElementById('hienthi').style.width='100%';
			}else{
				Menu.style.display='block';
				document.getElementById('hienthi').style.width='calc(100% - 250px)';
			}
			
		}

	</script>
</body>
</html>

