<?php include "Templates/partials/header.php" ?>

<div class="container mt-4">
	<form method="POST" action="Models/UserModel.php">
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Tên đội</label>
	    <input type="text" class="form-control" name="clubName" required>
	    <div id="emailHelp" class="form-text">Bạn sẽ ở đội này</div>
	  </div>
	  <button type="submit" name="btn-createClub" class="btn btn-primary">Tạo</button>
	</form>
</div>

<?php include "Templates/partials/footer.php" ?>