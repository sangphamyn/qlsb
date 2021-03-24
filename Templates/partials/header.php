<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý sân bóng</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	      <img src="./Templates/partials/image/logo.jpg" alt="" width="60" height="40" style="border-radius: 1rem">
	    </a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link px-3 active" aria-current="page" href="?controller=match&task=index">Trang chủ</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link px-3" href="?controller=match&task=choghep">Chờ ghép</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link px-3" href="?controller=match&task=dadat">Đã đặt</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link px-3" href="?controller=match&task=allClub">Các đội</a>
	        </li>
	        <?php if (isset($_SESSION['fullname'])){
	      		$fullname = $_SESSION['fullname'];
	      			echo "<li class='nav-item'>
	          <a class='nav-link px-3' href='?controller=match&task=createClub'>Tạo đội</a>
	        </li>
	        <li class='nav-item'>
	          <a class='nav-link px-3' href='?controller=match&task=create'>Tạo trận</a>
	        </li>
	        ";}
	        else echo "<li class='nav-item'>
	          <a class='nav-link px-3 disabled' href='?controller=match&task=createClub'>Tạo đội</a>
	        </li>
	        <li class='nav-item'>
	          <a class='nav-link px-3 disabled' href='?controller=match&task=create'>Tạo trận</a>
	        </li>";
	      		?>
	      </ul>
	      <form class="d-flex">
	      	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
	      	<?php if (isset($_SESSION['fullname'])){
	      			if($_SESSION['isAdmin'] == 1){
	      				$fullname = $_SESSION['fullname'];
		      			echo "<li class='nav-item dropdown'>
				          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
				            $fullname
				            <span class='badge bg-warning text-dark'>Admin</span>
				          </a>
				          <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
				          	<li><a class='dropdown-item' href='?controller=match&task=yourclub'>Đội của bạn</a></li>
				          	<li><a class='dropdown-item' href='Models/xuly.php'>Đặt lại</a></li>
				            <li><a class='dropdown-item' href='Models/logout.php'>Đăng xuất</a></li>
				          </ul>
				        </li>";
			    	} else{
			    		$fullname = $_SESSION['fullname'];
		      			echo "<li class='nav-item dropdown'>
				          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
				            $fullname
				          </a>
				          <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
				          	<li><a class='dropdown-item' href='?controller=match&task=yourclub'>Đội của bạn</a></li>
				            <li><a class='dropdown-item' href='Models/logout.php'>Đăng xuất</a></li>
				          </ul>
				        </li>";
			    	}
	      		} else {
	      			echo "<a href='?controller=match&task=login' class='btn btn-outline-success'>Đăng nhập</a>";
	      		} 
	      		?>
	        
	        </ul>
	      </form>
	    </div>
	  </div>
	</nav>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</html>