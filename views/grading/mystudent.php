<div class="container">
	<h3 class="text-center page-header"><span class="badge badge-primary ">Schedule</span></h3>
     <?php Messages::displayCustomMsg(); ?>
<div class="row">
		
<?php foreach ($viewmodel as $data): ?>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center">
			<div class="card sched-card">
				<div class="card-header">

				<h6 class="mb-0 mt-2 badge badge-warning">
					<span class="fa fa-clock clock-bar"></span>
					<?php echo 
					date("g:i a", strtotime($data['starttime']))." to ".
					date("g:i a", strtotime($data['endtime']));?>
 	
 				</h6>
			
				</div>
					<div class="card-body card-min">

					<p class="mb-auto"><?php echo $data['grade']; ?></p>
					<small class="text-muted">Grade</small>
					<p class="mb-auto"><?php echo $data['section']; ?></p>
					<small class="text-muted">Section</small>
					
				
					<p class="card-text mb-0 mt-2"><?php echo $data['description']; ?></p>
					<small class="text-muted">Subject</small>
					</div>
					
					<div class="card-footer">
					<?php $split = explode('-',$data['section']);

					$combine = $split[0].'*'.$split[1].'*'.$data['subjectcode'];
					?>
						<a href="<?php echo ROOT_URL ?>grading/viewmystudent/<?php echo $data['grade'].'/'.$combine;?>">

						<button class="btn btn-primary" name="view" value="view">View</button>
						</a>

						
				</div>
			</div>
		</div>
<?php endforeach; ?>
	</div>
</div>