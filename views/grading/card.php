<?php if(!empty($viewmodel)): ?>
<div class="container">
	<div class="row">
	
		<div class="col-md-4">
			<?php
						$today = date('Y-m-d');
						$today  = new DateTime($today);
						$date   = new DateTime($viewmodel[0]['birthdate']);
						$age = $date->diff($today)->format("%Y");
			?>
		<div class="card text-center">
			<div class="card-header">
				<span class="badge-pill badge-primary"><small class="small">LRN:</small> <?php echo $viewmodel[0]['lrn']; ?>
				</span>
			</div>
			<div class="card-body info-student">
				<img class="image-card mt-0 mb-2" src="<?php echo ROOT_URL; ?>/assets/images/students/
				<?php
					if(!empty($viewmodel[0]['profileimagename'])){
							echo $viewmodel[0]['profileimagename'];
						} else {
							echo 'user.png';
						}
				?>
				">
				<h5 class="card-title"><?php echo $viewmodel[0]['lastname'].' '.','.$viewmodel[0]['firstname'].' '.$viewmodel[0]['middlename']; ?></h5>
				<p class="mb-0"><small>Grade & Section :</small> <?php echo $viewmodel[0]['grade'].' '.$viewmodel[0]['section']; ?></p>
				<p class="mb-0"><small>Age : </small><?php echo $age; ?></p>
				<p class=""><small>Sex : </small><?php echo $viewmodel[0]['sex']; ?></p>

				<a href="<?php echo ROOT_URL ?>students/profile/<?php echo $viewmodel[0]['tblstudentid']; ?>" class="btn btn-outline-light">View Profile</a>
			</div>
			<div class="card-footer bg-primary text-muted">
				
			</div>
		</div>
	
	</div>




	<!---- /END STUDENT DATA -->
	<?php 
			$GLOBALS['termFirst'] = false;

			foreach ($viewmodel as $data) {
			if($data['term'] == "First"){
				$GLOBALS['termFirst'] = true;
			}


	}
	 ?>
	
	<?php if($GLOBALS['termFirst']):?>
	<div class="student-card col-md-8 card pt-5 pb-2">
		<h4 class="text-center mb-4">REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</h4>
		<table class="table table-sm table-bordered">
			<thead>
				<tr>
					<th><?php echo $viewmodel[0]['term']; ?> Semester</th>
					<th colspan="2" class="text-center">Quarter</th>
					<th rowspan="2" class="text-center">Semester<br>Final<br>Grade</th>
				</tr>
				<tr>
					<th>Subject</th>
					<th class="text-center">1</th>
					<th class="text-center">2</th>
				</tr>
			</thead>
			<tbody>
				<?php $average1 = 0; $divisorFirst = 0; ?>

				<!----- CORE SUBJECT -->
				<?php $core1 = false;
				foreach ($viewmodel as $subject){
					if($subject['type'] == 'Core' && $subject['term'] ==  'First'){
						$core1 = true;
					}
				}
				
			
				if($core1){ ?>
				<tr><td colspan="4">Core Subject</td></tr>
				<?php } ?>
				<?php foreach ($viewmodel as $data):
					if($data['term'] == "First"):
				 ?>
				<?php if($data['type'] == 'Core'){ ?>
				<tr>
					<td><?php echo $data['description']; ?></td>
					<td class="text-center"><?php echo $data['mid']; ?></td>
					<td class="text-center"><?php echo $data['final']; ?></td>
					<td class="text-center"><?php $average = round(($data['mid']+ $data['final'])/2); echo $average; $average1 = $average1+$average; $divisorFirst++;?></td>
				</tr>
				<?php }?>
				<?php endif; endforeach; ?>
				<!----- APPLIED SUBJECT -->
				<?php $applied1 = false;
				foreach ($viewmodel as $subject){
					if($subject['type'] == 'Applied' && $subject['term'] ==  'First'){
						$applied1 = true;
					}
				}
				
				if($applied1){ ?>
				<tr><td colspan="4">Applied Subject</td></tr>
				<?php } ?>
				<?php foreach ($viewmodel as $data):
						if($data['term'] == "First"):
				 ?>
				<?php if($data['type'] == 'Applied'){ ?>
				<tr>
					<td><?php echo $data['description']; ?></td>
					<td class="text-center"><?php echo $data['mid']; ?></td>
					<td class="text-center"><?php echo $data['final']; ?></td>
					<td class="text-center"><?php $average = round(($data['mid']+ $data['final'])/2); echo $average; $average1 = $average1+$average; $divisorFirst++; ?></td>
				</tr>
				<?php }?>
				<?php endif; endforeach; ?>
				<!----- SPECIALIZED SUBJECT -->
				<?php $specialized1 = false;
				foreach ($viewmodel as $subject){
					if($subject['type']=='Specialized' && $subject['term'] == 'First'){
						$specialized1 = true;

					}
				}
				
			
				if($specialized1){ ?>
				<tr><td colspan="4">Specialized Subject</td></tr>
				<?php } ?>
				<?php foreach ($viewmodel as $data):
					if($data['term'] == "First"):
				 ?> 
				<?php if($data['type'] == 'Specialized'){ ?>
				<tr>
					<td><?php echo $data['description']; ?></td>
					<td class="text-center"><?php echo $data['mid']; ?></td>
					<td class="text-center"><?php echo $data['final']; ?></td>
					<td class="text-center"><?php $average = round(($data['mid']+ $data['final'])/2); echo $average; $average1 = $average1+$average; $divisorFirst++;  ?></td>
				</tr>
				<?php }?>
				<?php endif; endforeach; ?>
				<tr>
					<td colspan="3" class="border-ave">Average:</td>
					<td class="text-center"><?php echo $average1/$divisorFirst; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-4"></div>
<?php endif; ?>
<!------------------------------ SECOND SEMESTER CARD ------------->
	<?php 
			$GLOBALS['termSecond'] = false;

			foreach ($viewmodel as $data) {
			if($data['term'] == "Second"){
				$GLOBALS['termSecond'] = true;
			}
	}
	 ?>
	 <?php if($GLOBALS['termSecond']):?>
	<div class="student-card col-md-8 card pt-5 pb-2">
		<h4 class="text-center mb-4">REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</h4>
		<table class="table table-sm table-bordered">
			<thead>
				<tr>
					<th><?php echo $viewmodel[0]['term']; ?> Semester</th>
					<th colspan="2" class="text-center">Quarter</th>
					<th rowspan="2" class="text-center">Semester<br>Final<br>Grade</th>
				</tr>
				<tr>
					<th>Subject</th>
					<th class="text-center">1</th>
					<th class="text-center">2</th>
				</tr>
			</thead>
			<tbody>
				<?php $average2 = 0; $divisorSecond = 0; ?>

				<!----- CORE SUBJECT -->
				<?php 	$core2 = false;
				foreach ($viewmodel as $subject){
					if($subject['type'] == 'Core' && $subject['term'] ==  'Second'){
						$core2 = true;
					}
				}
				
			
				if($core2){ ?>
				<tr><td colspan="4">Core Subject</td></tr>
				<?php } ?>
				<?php foreach ($viewmodel as $data):
					if($data['term'] == "Second"):
				 ?>
				<?php if($data['type'] == 'Core'){ ?>
				<tr>
					<td><?php echo $data['description']; ?></td>
					<td class="text-center"><?php echo $data['mid']; ?></td>
					<td class="text-center"><?php echo $data['final']; ?></td>
					<td class="text-center"><?php $average = round(($data['mid']+ $data['final'])/2); echo $average; $average2 = $average2+$average; $divisorSecond++;?></td>
				</tr>
				<?php }?>
				<?php endif; endforeach; ?>
				<!----- APPLIED SUBJECT -->
				<?php $applied = false;
				foreach ($viewmodel as $subject){
					if($subject['type'] == 'Applied' && $subject['term'] ==  'Second'){
						$applied = true;
					}
				}
				
				if($applied){ ?>
				<tr><td colspan="4">Applied Subject</td></tr>
				<?php } ?>
				<?php foreach ($viewmodel as $data):
						if($data['term'] == "Second"):
				 ?>
				<?php if($data['type'] == 'Applied'){ ?>
				<tr>
					<td><?php echo $data['description']; ?></td>
					<td class="text-center"><?php echo $data['mid']; ?></td>
					<td class="text-center"><?php echo $data['final']; ?></td>
					<td class="text-center"><?php $average = round(($data['mid']+ $data['final'])/2); echo $average; $average2 = $average2+$average; $divisorSecond++ ?></td>
				</tr>
				<?php }?>
				<?php endif; endforeach; ?>
				<!----- SPECIALIZED SUBJECT -->
				<?php
				$specialized = false;
				foreach ($viewmodel as $subject){
					if($subject['type'] == 'Specialized' && $subject['term'] ==  'Second'){
						$specialized = true;
					}
				}
				
				if($specialized){ ?>
				<tr><td colspan="4">Specialized Subject</td></tr>
				<?php } ?>
				<?php foreach ($viewmodel as $data):
					if($data['term'] == "Second"):
				 ?>
				<?php if($data['type'] == 'Specialized'){ ?>
				<tr>
					<td><?php echo $data['description']; ?></td>
					<td class="text-center"><?php echo $data['mid']; ?></td>
					<td class="text-center"><?php echo $data['final']; ?></td>
					<td class="text-center"><?php $average = round(($data['mid']+ $data['final'])/2); echo $average; $average2 = $average2+$average; $divisorSecond++;?></td>
				</tr>
				<?php }?>
				<?php endif; endforeach; ?>
				<tr>
					<td colspan="3" class="border-ave">Average:</td>
					<td class="text-center"><?php 
					try{
					echo round($average2/$divisorSecond);
				
					} catch(Exception $e){ echo 0;}
					 ?></td>
					
				</tr>
			</tbody>
		</table>
	</div>
<?php endif; ?>
</div>
<div class="mb-4">
<form action="<?php $_SERVER['PHP_SELF']; ?>" id="grade" method="post">
	<div class="float-right">
	<button name="save" value="save" form="grade" class="btn btn-success">Save SF10</button>
	</div>
</form>
</div>
</div>
<br>
<br>
<br>
<?php endif; ?>