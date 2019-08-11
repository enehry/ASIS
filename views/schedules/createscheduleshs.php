<div class="container">
<div class="">
	<h5><span class="badge badge-primary">Schedule</span><span class="ml-2 badge badge-warning"><?php if(!empty($viewmodel)){echo 'GRADE '.$viewmodel[0]['grade'].' SECTION '.$viewmodel[0]['section'];} ?></span></h5>
</div>
<div class="row mb-2 mt-4">
	<div class="col-md-6">
					<!-- Button trigger modal -->
		<div class="float-left">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		  Add Schedule
		</button>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<label class="mb-0 font-weight-bold ml-2" for="subject">Subject</label>
		         <select id="subject" name="subjectcode" class="form-control-sm custom-select mb-3" form="addsched">
	      	      	<?php $subjects = new Dashboard();
	      	      	foreach ($subjects->getSubjects() as $subject) { ?>
			        <option value="<?php echo $subject['subjectcode']; ?>"><?php echo $subject['description']; ?></option>
			        <?php } ?>
			      </select>
			      <table class="table table-sm text-center pb-2">
			      	<thead class="w3-flat-yellow">
			      	<th>Mon</th>
			      	<th>Tue</th>
			      	<th>Wed</th>
			      	<th>Thu</th>
			      	<th>Fri</th>
			      	</thead>
			      	<tbody>
			      	<tr>
						<td class="text-center"><input type="checkbox" name="day[]" class="form-check-input" value="0" form="addsched"></td>
						<td class="text-center"><input type="checkbox" name="day[]" class="form-check-input" value="1" form="addsched" ></td>
						<td class="text-center"><input type="checkbox" name="day[]" class="form-check-input " value="2" form="addsched" ></td>
						<td class="text-center"><input type="checkbox" name="day[]" class="form-check-input" value="3" form= "addsched" "></td>
						<td class="text-center"><input type="checkbox" name="day[]" class="form-check-input " value="4" form="addsched"></td>
			      	</tr>
			      	</tbody>

			      </table>
			      <hr class="mt-4">
					<div class="form-row">
						<div class="col">
							<label class="mb-0 ml-2 font-weight-bold">Start Time</label>
							<input class="form-control" type="time" value="12:00:00" name="starttime" form="addsched" placeholder="First name">
						</div>
						<div class="col">
							<label class="mb-0 ml-2 font-weight-bold">End Time</label>
							<input class="form-control" type="time" value="12:00:00" name="endtime" form="addsched" placeholder="Last name">
						</div>
					</div>
				<label class="mb-0 ml-2 mt-2 font-weight-bold">Teacher</label>
				<select class="form-control custom-select" name="trn" form="addsched">
					<?php $teachers = new Dashboard();
							foreach ($teachers->getTeachers() as $teacher) {
							 	echo '<option value ="'.$teacher['trn'].'">'.$teacher['lastname'].', '.$teacher['firstname'].' '.$teacher['lastname'].'</option>';
							 } ?>
				</select>
		      </div>
				<div class="modal-footer">
						<form action="<?php $_SERVER['PHP_SELF'];  ?>" method="post" id="addsched" >
				  		<input type="submit" name="add" value="Save" class="btn btn-primary float-right mt-0" form="addsched">
				  		</form>
				</div>
		    </div>
		  </div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="float-right">
		<button class="btn btn-danger" name="delete" value="delete" form="addsched"><i class="fa fa-trash-alt"></i> Delete</button>
		</div>
	</div>
</div>

	<div class="table-responsive box-shadow">
	<table class="table table-sm">
	  <thead>
	    <tr>
	      <th scope="col">Select</th>
	      <th scope="col">Code</th>
	      <th scope="col">Subject</th>
	      <th scope="col">Mon</th>
	      <th scope="col">Tue</th>
	      <th scope="col">Wed</th>
	      <th scope="col">Thu</th>
	      <th scope="col">Fri</th>
	      <th scope="col">Start Time</th>
	      <th scope="col">End Time</th>
	      <th scope="col">Teacher</th>
	    </tr>
	  </thead>
	  <tbody>

	  	<?php foreach ($viewmodel as $sched_data):?>
	    <tr>
	    <td><input type="checkbox" name="selected[]" form="addsched" value="<?php echo  $sched_data['schedtempid']; ?>"></td>
	      <td><?php echo $sched_data['subjectcode']; ?></td>
	      <td><?php echo $sched_data['description']; ?></td>
	      <td class=""><?php if($sched_data['m'] == '1'){
	      	echo '<i class="fa fa-check" ></i>';
	      }	else { echo '<i class="fa fa-times"; ></i>'; } ?></td>
	      <td class=""><?php if($sched_data['t'] == '1'){
	      	echo '<i class="fa fa-check" ></i>';
	      }	else { echo '<i class="fa fa-times"; ></i>'; } ?></td>
	      <td class=""><?php if($sched_data['w'] == '1'){
	      	echo '<i class="fa fa-check" ></i>';
	      }	else { echo '<i class="fa fa-times"; ></i>'; } ?></td>
	      <td class=""><?php if($sched_data['th'] == '1'){
	      	echo '<i class="fa fa-check" ></i>';
	      }	else { echo '<i class="fa fa-times"; ></i>'; }
	       ?></td>
	      <td class=""><?php if($sched_data['f'] == '1'){
	      	echo '<i class="fa fa-check" ></i>';
	      }	else { echo '<i class="fa fa-times"; ></i>'; } ?></td>
	      <td><?php echo $sched_data['starttime']; ?></td>
	      <td><?php echo $sched_data['endtime']; ?></td>
	      <td><?php echo $sched_data['lastname']; ?></td>
	    </tr>
	<?php    endforeach;       ?>

	  </tbody>
	</table>
	  <?php if(empty($viewmodel)){echo '<div class="alert alert-warning">No data retrieve, No Schedule</div>';} ?> 

	</div>


	
	</div>



