<?php include "Templates/partials/header.php" ?>

<div class="section-1 container p-4">
		<div class="row">
		  		<?php foreach($lichsan as $row) :?>
			  		<div class="col-3">
			  		<label for="exampleInputEmail1" class="form-label">Sân <?php echo $row['pitch_id'] ?></label>
				  	<select class="form-select" name="timeOption_<?php echo $row['pitch_id'] ?>" size="4" multiple aria-label="multiple select example">
					  <?php if($row['time_1'] == 0){
					  	echo "<option value='1'>14:00 - 15:30</option>";
					  } else{
					  	echo "<option value='1' class='text-danger' disabled>14:00 - 15:30</option>";
					  } ?>
					  <?php if($row['time_2'] == 0){
					  	echo "<option value='2'>15:30 - 17:00</option>";
					  } else{
					  	echo "<option value='2' class='text-danger' disabled>15:30 - 17:00</option>";
					  } ?>
					  <?php if($row['time_3'] == 0){
					  	echo "<option value='3'>17:00 - 18:30</option>";
					  } else{
					  	echo "<option value='3' class='text-danger' disabled>17:00 - 18:30</option>";
					  } ?>
					  <?php if($row['time_4'] == 0){
					  	echo "<option value='4'>18:30 - 20:00</option>";
					  } else{
					  	echo "<option value='4' class='text-danger' disabled>18:30 - 20:00</option>";
					  } ?>
					</select>
			  		</div>
		  		<?php endforeach; ?>
		  	</div>
		<h3 class="text-center">Tạo trận</h3>
		<form method="POST" action="Models/xuly.php">
		  	<div class="mb-3">
		  		<label for="exampleInputEmail1" class="form-label">Chọn đội của bạn</label>
			    <select class="form-select w-50" name="club_name" size="1" aria-label="size 3 select example">
			    	<?php foreach($club as $row) :?>
				  		<option value="<?php echo $row['club_id'] ?>"><?php echo $row['club_name'] ?></option>
				  	<?php endforeach; ?>
				</select>
		  	</div>
		  	<label for="exampleInputEmail1" class="form-label">Chọn các khung giờ có thể đá</label>
		  	<select class="form-select w-25" name="time" size="4" required>
					<?php foreach($data as $row) :?>
			  <?php if($row['pitch_1'] == 0 || $row['pitch_2'] == 0 || $row['pitch_3'] == 0 || $row['pitch_4'] == 0){
					  	echo "<option value=".$row['time_id'].">".$row['time_name']."</option>";
					  } else{
					  	echo "<option value=".$row['time_id']." class='text-danger' disabled>".$row['time_name']."</option>";
					  } ?>
					  <?php endforeach; ?>
			</select>
			
		  <button type="submit" name="btn-create" class="btn btn-primary m-auto d-block px-5">Tạo</button>
		</form>
	</div>