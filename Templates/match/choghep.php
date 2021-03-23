<?php include "Templates/partials/header.php" ?>

<div class="section-1 container p-4">
		<h3 class="text-center">Các đội bóng chờ ghép</h3>
		<div class="section-1-1 mt-4">

			<?php foreach($data as $row) :?>
				<div class="item w-75 m-auto mb-3 p-1 row border border-dark">
					<div class="item__info col-4 d-flex flex-column">
						<h5><?php echo $row['club_id_1'] ?></h5>
						<p><?php echo $row['time_name'] ?></p>
					</div>
					<div class="item__create col-4 d-flex flex-column">
						<h5><?php echo $row['fullname'] ?></h5>
						<p><?php echo $row['phone'] ?></p>
					</div>
					<div class="item__create col-4 d-flex flex-column">
						<h5></h5>
						  <div class="btn-group" role="group">
						    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						      Chọn đội để ghép
						    </button>
						    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						    	<?php foreach($row['club_ghep'] as $row1) :?>
						      		<li><a class="dropdown-item" href="?controller=match&task=ghep&match_id=<?php echo $row['match_id'] ?>&club_ghep_id=<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></a></li>
						      	<?php endforeach; ?>
						    </ul>
						  </div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>