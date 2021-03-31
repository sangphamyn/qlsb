<?php include "Templates/partials/header.php" ?>

<div class="container mt-4">
	<h3 class="text-center">Tất cả các đội</h3>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Tên đội</th>
	      <th scope="col">Số thành viên</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach($data as $row) :?>
	    <tr>
	      <th scope="row"><?php echo $row['club_id'] ?></th>
	      	<?php if($row['club_highlight'] == 1): ?>
	      		<td class="text-primary"><?php echo $row['club_name'] ?></td>
	      	<?php else: ?>
	      		<td><?php echo $row['club_name'] ?></td>
	      	<?php endif; ?>
	      <td><?php echo $row['numOfMember'] ?></td>
	      <td>
	      	<?php if( isset($_SESSION['fullname']) ): ?>
	      		<?php if($row['club_highlight'] == 1): ?>
	      			<a href="?controller=match&task=exitClub&id=<?php echo $row['club_id'] ?>" type="button" class="btn btn-outline-danger" style="width: 120px">Thoát</a>
	      		<?php else: ?>
	      			<a type="button" class="btn btn-outline-primary" href="?controller=match&task=joinClub&id=<?php echo $row['club_id'] ?>" style="width: 120px">Tham gia</a>
	      		<?php endif; ?>	      	
	      	<?php endif; ?>
	      	<a type="button" class="btn btn-outline-success" href="?controller=match&task=clubMember&id=<?php echo $row['club_id']?>" style="width: 120px">Chi tiết</a>
	      </td>
	    </tr>
	    <?php endforeach; ?>
	  </tbody>
	</table>
</div>

<?php include "Templates/partials/footer.php" ?>