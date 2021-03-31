<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý sân bóng</title>
	<link rel="stylesheet" href="style.scss">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link href="https://fonts.googleapis.com/css2?family=Andika&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

	<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark header">
	  <div class="container-fluid pe-5">
	    <a class="navbar-brand" href="#">
	      <img src="./Templates/partials/image/logo.jpg" alt="" width="60" height="40" style="border-radius: 1rem">
	    </a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link px-3 active" aria-current="page" href="?controller=match&task=index">
	          	
	          	<span class="<?php if($home == 1): ?>active<?php endif; ?>">Trang chủ</span>
	          	
	          </a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link px-3 active" href="?controller=match&task=choghep">
	          	<span class="<?php if($choghep == 1): ?>active<?php endif; ?>">Chờ ghép</span>
	          </a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link px-3 active" href="?controller=match&task=dadat">
	          	<span class="<?php if($dadat == 1): ?>active<?php endif; ?>">Đã đặt</span>
	          </a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link px-3 active" href="?controller=match&task=allClub">
	          	<span class="<?php if($allClub == 1): ?>active<?php endif; ?>">Các đội</span>
	          </a>
	        </li>
	        
	      		<?php if( isset($_SESSION['fullname']) ): ?>
	      			<li class='nav-item'>
			          <a class='nav-link px-3 active' href='?controller=match&task=createClub'>
			          	<span class="<?php if($taodoi == 1): ?>active<?php endif; ?>">Tạo đội</span>
			          </a>
			        </li>
			        <li class='nav-item'>
			          <a class='nav-link px-3 active' href='?controller=match&task=create'>
			          	<span class="<?php if($taotran == 1): ?>active<?php endif; ?>">Tạo trận</span>
			          </a>
			        </li>
			    <?php else: ?>
			    	<li class='nav-item'>
			          <a class='nav-link px-3 disabled' href='?controller=match&task=createClub'><span>Tạo đội</span></a>
			        </li>
			        <li class='nav-item'>
			          <a class='nav-link px-3 disabled' href='?controller=match&task=create'><span>Tạo trận</span></a>
			        </li>
	      		<?php endif; ?>

	      </ul>
	      <form class="d-flex">
	      	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
	      	<?php if( isset($_SESSION['fullname']) ): ?>
	      		<?php if($_SESSION['isAdmin'] == 1): ?>
	      				$fullname = $_SESSION['fullname'];
		      			<li class='nav-item dropdown'>
				          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
				            <?php echo $_SESSION['fullname'] ?>
				            <span class='badge bg-warning text-dark'>Admin</span>
				          </a>
				          <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
				          	<li><a class='dropdown-item' href='?controller=match&task=yourclub'>Đội của bạn</a></li>
				          	<li><a class='dropdown-item' href='Models/resetDb.php'>Đặt lại</a></li>
				            <li><a class='dropdown-item' href='Models/logout.php'>Đăng xuất</a></li>
				          </ul>
				        </li>
				        <?php else: ?>
		      			<li class='nav-item dropdown'>
				          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
				            <?php echo $_SESSION['fullname'] ?>
				          </a>
				          <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
				          	<li><a class='dropdown-item' href='?controller=match&task=yourclub'>Đội của bạn</a></li>
				            <li><a class='dropdown-item' href='Models/logout.php'>Đăng xuất</a></li>
				          </ul>
				        </li>
			    <?php endif; ?>
	      	<?php else: ?>
	      			<a class='btn btn-success login-btn btn-sm'>Đăng nhập</a>
	      	<?php endif; ?>
	        </ul>
	      </form>
	    </div>
	  </div>
	</nav>

	<div class="side login">
        <div class="mini-header">
            <h3>ĐĂNG NHẬP</h3>
            <i class="pegk pe-7s-close"></i>
        </div>
        <form method="POST" action="Models/UserModel.php" class="login-body">
            <div class="form-row">
                <label>Số điện thoại <span>*</span></label>
                <input type="text" name="phone" required>
            </div>
            <div class="form-row">
                <label>Mật khẩu <span>*</span></label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="btnSignin" class="btn btn-primary">Đăng nhập</button>
            <p>Người mới? <a href="#0" class="to-register">Tạo tài khoản</a></p>
        </form>
    </div>

	<div class="side register">
        <div class="mini-header">
            <h3>ĐĂNG KÍ</h3>
            <i class="pegk pe-7s-close"></i>
        </div>
        <form  method="POST" action="Models/UserModel.php"class="login-body">
        	<div class="form-row">
                <label>Tên đầy đủ <span>*</span></label>
                <input type="text" name="fullName" required>
            </div>
            <div class="form-row">
                <label>Số điện thoại <span>*</span></label>
                <input type="text" name="phone" required>
            </div>
            <div class="form-row">
                <label>Mật khẩu <span>*</span></label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="btnSignup" class="btn btn-primary">Đăng ký</button>
            <p>Đã có tài khoản? <a href="#0" class="to-login">Đăng nhập</a></p>
        </form>
    </div>
        
        <div class="mark-overlay"></div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="jQuery.js"></script>
<script src="script.js"></script>
</html>