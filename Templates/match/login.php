<?php include "Templates/partials/header.php" ?>

<div class="container mt-4">
	<div class="row">
		<div class="col-1"></div>
		<form class="col-4" method="POST" action="Models/xuly.php">
			<h3 class="text-center">Đăng ký</h3>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Tên đầy đủ</label>
		    <input type="text" name="fullName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
		    <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
		    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
		  </div>
		  <button type="submit" name="btnSignup" class="btn btn-primary">Đăng ký</button>
		</form>
		<div class="col-2"></div>
		<form class="col-4" method="POST" action="Models/xuly.php">
			<h3 class="text-center">Đăng nhập</h3>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
			    <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
			  </div>
			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
			  </div>
			  <button type="submit" name="btnSignin" class="btn btn-primary">Đăng nhập</button>
		</form>
		<div class="col-1"></div>
	</div>
</div>