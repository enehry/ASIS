
<?php Messages::displayCustomMsg() ?>

  <div class="row">
    <div class="col-md-6">
       <form action="<?php echo ROOT_URL;?>enrollment/enrollmentadmin" method="post" id="enrollmentadmin">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.. (LRN/Student's Name)"  name="searchitem">
        <div class="input-group-append">
        
        <button name="btnsearch" value="search" class="btn btn-outline-dark"><i class="fa fa-search"></i></button>

        </div>

        </div>

        </form>
 
      </div>
      <div class="-col-md-6">
      	<button name="delete" value="delete" form="enrollmentadmin" class="btn btn-danger btn-delete mb-3 ml-3"><i class="fa fa-trash-alt"></i> Remove</button>
      </div>
     
  </div>
  <div class="row">
    <div class="col-md-12">
    		<div class="row mb-3">
	        <div class="col">
	        <select class="form-control" name="grade" form="enrollmentadmin">
	          <option selected="true" disabled="disabled">Grade</option>
	          <option>11</option>
            <option>12</option>
	        </select>
	        </div>
	        <div class="col">
	        <select class="form-control" name="section" form="enrollmentadmin">
	          <option selected="true" disabled="disabled">Section</option>
              <option>ICT-A</option>
             <option>ICT-B</option>
	          <option>ICT-C</option>
	        </select>
	        </div>
	        <div class="col">
	        <button name="btnset" value="btnset" class="btn btn-success ml-4" form="enrollmentadmin">Enroll</button>
          <div class="col"></div>
	        </div>
	        </div>

              <table class="table table-striped table-sm">
  	    
                <thead class="th">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col">LRN</th>
                    <th scope="col">Name</th>
                    <th scope="col">Grade & Section</th>
                  </tr>
                </thead>
                <tbody>
            <?php $count = $GLOBALS['page'] * 10 - 10 ?>
            <?php foreach($viewmodel as $item): ?>
                  <tr>
                    <td><input form="enrollmentadmin" type="checkbox" name="selected[]" value ="<?php echo $item['lrn'].'#'.$item['enrollmentid']; ?>"></td>
                   
                    <th scope="row"><?php $count++; echo $count; ?> </th>

                    <td><a href="<?php echo ROOT_URL; ?>students/profile/<?php echo $item['tblstudentid'];?>"><?php echo $item['lrn']?></a></td>
                    <td><?php echo $item['lastname'].', '.$item['firstname'].' '.$item['middlename']?></td>
                    <td><?php  if(isset($item['grade']) && isset($item['section'])){
                    	echo 'G'.$item['grade'].'   '.$item['section'];}
                    	else {
                    		echo "N/A";
                    	} ?></td>
                   
                  </tr>
            <?php endforeach;  ?>
                </tbody>
              </table>
          </div>
    </div>
  </div>
  <?php
  if(!empty($viewmodel)){
  $pagination = new Pagination();
  $pagination->setPage($GLOBALS['page'],$GLOBALS['per_page'],$GLOBALS['total_rows']);
  $pagination->paginate(ROOT_URL.'enrollment/enrollmentadmin/');
  }else { echo '<div class="alert alert-warning" role="alert">
  No data retrieve
</div>';}
 ?>
</div>