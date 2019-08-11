<div class="container">
	<div class="col-md-6">
       <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="setadviser">
	        <div class="input-group mb-3">
	        <input type="text" class="form-control" placeholder="Search.. (LRN/Teacher's Name)"  name="searchitem">
	        <div class="input-group-append">
	        
	        <button name="search" value="search" class="btn btn-outline-dark"> Search</button>

	        </div>

	        </div>

        </form>
 
     </div>

     <?php Messages::displayCustomMsg(); ?>
	<div class="row">
		
		<?php foreach($viewmodel as $result) :?>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center">
			<div class="card sched-card">
				<div class="card-header">
				<h4 class="text-center">G<?php echo $result['grade'].' '.$result['section']; ?></h4>
			
				</div>
					<div class="card-body">
					<div class="sched-adv">
					<img class="sched-pic" src="<?php echo ROOT_URL; ?>assets/images/teachers/<?php 
					if(!empty($result['profileimagename'])){
					echo $result['profileimagename'];} else {
						echo "user.png";
					} ?>">
					<p class="mb-auto"><?php echo $result['lastname'].', '.$result['firstname'].' '.$result['middlename']; ?></p>
					<small class="text-muted">Adviser</small>
					</div>
					
					<p class="card-text">Term : <?php echo $result['term']; ?><br>SY : <?php echo $result['sy']; ?> </p>

					</div>
					
					<div class="card-footer">
						<a href="<?php echo ROOT_URL; ?>schedules/selectsched/<?php echo $result['trn']; ?>">

						<button class="btn btn-primary" name="view" value="view">View</button>
						</a>

						
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</div>