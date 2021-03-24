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
	      <td><?php echo $row['club_name'] ?></td>
	      <td><?php echo $row['numOfMember'] ?></td>
	      <td>
	      	<?php if (isset($_SESSION['fullname'])){
	      		echo "<a type='button' class='btn btn-outline-primary' href='?controller=match&task=joinClub&id=".$row['club_id'].">Tham gia</a>";}
	      	?>
	      	<a type="button" class="btn btn-outline-success" href="?controller=match&task=clubMember&id=<?php echo $row['club_id']?>">Chi tiết</a>
	      </td>
	    </tr>
	    <?php endforeach; ?>
	  </tbody>
	</table>
</div>