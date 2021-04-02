<?php include "Templates/partials/header.php" ?>

<div class="section-1 container p-4">
		<h3 class="text-center">Các đội bóng chờ ghép</h3>
		<div class="section-1-1 mt-4">

			<?php foreach($data as $row) :?>
				<div class="item w-75 m-auto mb-3 p-1 row border">
					<div class="item__info col-3 d-flex flex-column">
						<?php if( $row['club_highlight'] == 1 ): ?>
							<h5 class="r-link link text-underlined"><?php echo $row['club_id_1'] ?></h5>
						<?php endif; ?>
						<?php if( $row['club_highlight'] == 0 ): ?>
							<h5><?php echo $row['club_id_1'] ?></h5>
						<?php endif; ?>
						<p><?php echo $row['time_name'] ?></p>
					</div>
					<div class="item__create col-3 d-flex flex-column">
						<h5><?php echo $row['fullname'] ?></h5>
						<p><?php echo $row['phone'] ?></p>
					</div>
					<div class="item__create col-3 d-flex flex-column">
						<p><?php echo $row['comment'] ?></p>
					</div>
					<div class="item__create col-3 d-flex flex-column">
						<h5></h5>
					  	<?php if( isset($_SESSION['fullname']) ): ?>
				      		<div class="btn-group dropend" role="group">
						    <button id="btnGroupDrop1" type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						      Chọn đội để ghép
						    </button>
						    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						    	<?php foreach($row['club_ghep'] as $row1) :?>
						    		<?php if($row1['id'] != 0): ?>
						      			<li><a class="dropdown-item" href="?task=ghep&match_id=<?php echo $row['match_id'] ?>&club_ghep_id=<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></a></li>
						      		<?php endif; ?>
						      	<?php endforeach; ?>
						    </ul>
						  </div>
				      	<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>

	<?php include "Templates/partials/footer.php" ?>