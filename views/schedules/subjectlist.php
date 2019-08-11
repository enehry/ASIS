<div class="container">
<h5><span class="badge badge-primary">LIST OF ALL SUBJECTS</span></h5>
  <div class="row">
    <div class="col-md-6">
       <form action="<?php echo ROOT_URL; ?>schedules/subjectlist" method="post" id="subjectlist">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.. (Subject/Subject Code)"  name="searchitem">
        <div class="input-group-append">
        
        <button name="search" value="search" class="btn btn-outline-dark"> Search</button>
        </div>
        </div>
        </form>
 
      </div>
      
     
      <div class="col-md-6">
       <!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		  Add Subject
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add Subject to List</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
			<form action="<?php echo ROOT_URL; ?>schedules/subjectlist" method="post" id="subjectlist">
		      <div class="modal-body">
	
		      	  <div class="row form-group">
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Subject Code" name="subjectcode" form="subjectlist">
				    </div>
				    <div class="col">
				      <select class="form-control" name="type" form="subjectlist">
				      	<option selected="true" disabled="disabled">Subject Type</option>
				      	<option>Core</option>
				      	<option>Applied</option>
				      	<option>Specialized</option>
				      </select>
				    </div>
				  </div>
				  <div class="row form-group">
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Subject Description" name="description" form="subjectlist">
				    </div>
				  </div>
				  <div class="row form-group">
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Track" name="track" form="subjectlist">
				    </div>
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Strand" name="strand" form="subjectlist">
				    </div>
				  </div>
		      		
		

		      </div>
		      <div class="modal-footer">
		        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <input type="submit" class="btn btn-primary" form="subjectlist" name="add"value="Add">
		      </div>


		      </form>
		    </div>
		  </div>
		</div>
         
    
    	<input  type="submit" class="btn btn-danger" name="remove" value = "Remove" form="subjectlist">

		
      </div>
  </div>
    
  <div class="row">
    <div class="col-md-12">
          <div class="student-table table-responsive-sm">
            <table class="table table-striped table-sm">
              <thead class="th">
                <tr>
                  <th scope="col"></th>
                  <th scope="col">#</th>
                  <th scope="col">Subject Code</th>
                  <th scope="col">Subject Name</th>
                  <th scope="col">Type</th>
                </tr>
              </thead>
              <tbody>
          <?php $count = 0 ?>
          <?php foreach($viewmodel as $item): ?>
                <tr>
                  <td><input form="subjectlist" type="checkbox" name="id[]" value ="<?php echo $item['subjectid']; ?>"></td>
                 
                  <th scope="row"><?php $count++; echo $count; ?> </th>

                 
                  <td><?php echo $item['subjectcode']?></td>
                  <td><?php echo $item['description']?></td>
                  <td><?php echo $item['type']?></td>
                 
               
                </tr>
          <?php endforeach;  ?>
              </tbody>
            </table>
          </div>
    </div>
  </div>
</div>