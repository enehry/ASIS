<?php if(!empty($viewmodel)){  ?>

<div class="container">
	<div class="row">
		<div class="col-md-3  card-sched">
		<!--Card Light-->
		<div class="card">
			<!--Card image-->
			<div class="text-center" ripple-radius>
				<img class="image-sched" " src="<?php echo ROOT_URL; ?>/assets/images/teachers/<?php
				if(!empty($viewmodel[0]['profileimagename'])){
					echo $viewmodel[0]['profileimagename']; }
					else {
						echo 'user.png';
					}
				 ?>" class="img-fluid" alt="teacher-image">
				
				<a>
					<div class="mask"></div>
				</a>
			</div>
			<!--/.Card image-->
			<!--Card content-->
			<div class="card-block ml-4 mr-4" >
				<!--Title-->
				<h6 class="card-title text-center mt-3">
				<?php echo $viewmodel[0]['lastname'].', '.
				$viewmodel[0]['firstname'].' '.$viewmodel[0]['middlename']; ?>
				</h6>
				<hr>
				<!--Text-->
				<p class="card-text"></p>
				<a href="<?php echo ROOT_URL; ?>teachers/teacherprofile/<?php echo $viewmodel[0]['tblteacherid']; ?>" class="black-text d-flex flex-row-reverse"><h6 class="p-2">View Profile <i class="fa fa-chevron-right"></i></h6></a>
			</div>
			<!--/.Card content-->
		</div>
		<!--/.Card Light-->
	</div>
	<div class="col-md-9 sched-bar pb-4 pt-4">
		<h4 class=""><span class="badge badge-primary">MY SCHEDULE</span></h4>
		
		<table class="table table-sm mt-4">
			<thead class="w3-flat-yellow">
				<tr class="text-center">
					<th scope="col">#</th>
					<th scope="col">Grade And Section</th>
					<th scope="col">Subject</th>
					<th scope="col">Mon</th>
					<th scope="col">Tue</th>
					<th scope="col">Wed</th>
					<th scope="col">Thu</th>
					<th scope="col">Fri</th>
					<th scope="col">Start - End</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($viewmodel as $data): ?>
				<tr class="text-center">
					<th scope="row">1</th>
					<td><?php echo 'G'.$data['grade'].' '.$data['section']; ?></td>
					<td><?php echo $data['description']; ?></td>
					<td><?php if($data['m']){echo '<i class="fa fa-check"></i>';}else{echo '<i class="fa fa-times"></i>';}?></td>
					<td><?php if($data['t']){echo '<i class="fa fa-check"></i>';}else{echo '<i class="fa fa-times"></i>';}?></td>
					<td><?php if($data['w']){echo '<i class="fa fa-check"></i>';}else{echo '<i class="fa fa-times"></i>';}?></td>
					<td><?php if($data['th']){echo '<i class="fa fa-check"></i>';}else{echo '<i class="fa fa-times"></i>';}?></td>
					<td><?php if($data['f']){echo '<i class="fa fa-check"></i>';}else{echo '<i class="fa fa-times"></i>';}?></td>
					<td><?php echo date("g:i a",strtotime($data['starttime'])).' - '.date("g:i a",strtotime($data['endtime']));?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	</div>
</div>

<?php } else { ?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>NO DATA RETRIEVE </strong>NO SCHEDULE SET FOR THIS TEACHER
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php } ?>