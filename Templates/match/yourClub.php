<?php include "Templates/partials/header.php" ?>

<div class="container mt-4">
	<h3 class="text-center">Các đội bạn đã tham gia</h3>
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
	      <td><?php echo $row['club_name'] ?></td>
	      <td><?php echo $row['numOfMember'] ?></td>
	      <td>
	      	<a href="?controller=match&task=exitClub&id=<?php echo $row['club_id'] ?>" type="button" class="btn btn-outline-primary">Thoát</a>
	      	<a type="button" class="btn btn-outline-success" href="?controller=match&task=clubMember&id=<?php echo $row['club_id']?>">Chi tiết</a>
	      </td>
	    </tr>
	    <?php endforeach; ?>
	  </tbody>
	</table>
</div>

<?php include "Templates/partials/footer.php" ?>