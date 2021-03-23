<?php include "Templates/partials/header.php" ?>

<div class="section-1 container my-4">
		<h3 class="text-center">Các đội đã ghép thành công</h3>
	<div class="d-flex justify-content-between">
		<div class="section-1-1 mt-4 w-50 me-2">
			<h5 class="text-center">Chủ sân chưa xác nhận</h5>
			<?php foreach($data as $row) :?>
				<div class="item w-100 m-auto mb-3 p-1 row border border-dark">
					<div class="item__info col-4 d-flex flex-column justify-content-center align-items-center">
						<h6><?php echo $row['club_id_1'] ?></h6>
						<h6></h6>
					</div>
					<div class="item__create col-4 d-flex flex-column justify-content-center align-items-center">
						<h6><?php echo $row['time_id'] ?></h6>

						
					<?php if ($_SESSION['isAdmin'] == 1){
						echo "<div class='btn-group' role='group'>
						    <button id='btnGroupDrop1' type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
						      Chọn sân
						    </button>
						    <ul class='dropdown-menu' aria-labelledby='btnGroupDrop1'>";
						      	foreach($row['pitch'] as $row1){
									if($row1['pitch_status'] == 0){
										echo "<li><a class='dropdown-item' href='?controller=match&task=chonSan&match_id=".$row['match_id']."&pitch_id=".$row1['pitch_name']."'>Sân ".$row1['pitch_name']."</a></li>";
									}
								}
						    echo "</ul>
						 </div>";}
					 ?>
					</div>
					<div class="item__info col-4 d-flex flex-column justify-content-center align-items-center">
						<h6><?php echo $row['club_id_2'] ?></h6>
						<h6></h6>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="section-1-1 mt-4 w-50 ms-2">
			<h5 class="text-center">Chủ sân đã xác nhận</h5>
			<?php foreach($xacnhan as $row) :?>
				<div class="item w-100 m-auto mb-3 p-1 row border border-dark">
					<div class="item__info col-4 d-flex flex-column justify-content-center align-items-center">
						<h6><?php echo $row['club_id_1'] ?></h6>
						<h6></h6>
					</div>
					<div class="item__create col-4 d-flex flex-column justify-content-center align-items-center">
						<h6><?php echo $row['time_id'] ?></h6>
						<p>Sân: <?php echo $row['pitch_id'] ?></p>
					</div>
					<div class="item__info col-4 d-flex flex-column justify-content-center align-items-center">
						<h6><?php echo $row['club_id_2'] ?></h6>
						<h6></h6>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>