<?php include "Templates/partials/header.php" ?>

<div class="container mt-4">
	<h3 class="text-center"><?php echo $data[0]['club_name'] ?></h3>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Tên</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach($data as $row) :?>
	    <tr>
	      <td><?php echo $row['user_name'] ?></td>
	  </tr>
	    <?php endforeach; ?>
	  </tbody>
	</table>
</div>

<?php include "Templates/partials/footer.php" ?>