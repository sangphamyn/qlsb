<?php include "Templates/partials/header.php" ?>

<div class="container mt-4">
	<div class="row">
		<?php foreach($data as $row) :?>
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
</div>