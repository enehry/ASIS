<?php $count_boys = 0; ?>
<?php $count_girls = 0; ?>
<div class="container">
  <div class="parallax">
    <h4 class="text-center header-advisory">ADVISORY CLASS</h4>
  <div class="row pt-2">
    <div class="col-md-6 mb-5">
       <div class="section-header text-center">
        <h2 class="m-auto"><?php
        if(!empty($viewmodel)){
        echo $viewmodel['0']['grade'];
       } ?></h2>
       <small class="">GRADE</small>
       <h1 class="m-auto"><?php 
       if(!empty($viewmodel)){
        echo $viewmodel['0']['section']; }?></h1>
       <small class="">SECTION</small>
       </div>
    </div>
    <div class="col-md-6 mb-5 mt-1 shade">
      <div class="section-total-bar blackboard">
      <h5 class="count font-weight-light">Boys : <?php  echo $GLOBALS['count_boys']['boys'];  ?></h5>
      <h5 class="count font-weight-light">Girls : <?php echo $GLOBALS['count_girls']['girls'];  ?></h5>
      <div class="line-total"></div>
      <h5 class="count font-weight-light"> Total : <?php echo $GLOBALS['count_girls']['girls']+$GLOBALS['count_boys']['boys']; ?></h5>
      </div>
    </div>
  </div>
</div>

  <?php Messages::displayCustomMsg(); ?>
  <div class="row">
    <div class="col-md-6">
       <form action="<?php echo ROOT_URL;?>classlist/myclasslist" method="post" id="myclasslist">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.. (LRN/Student's Name)"  name="searchitem">
        <div class="input-group-append">
        <button name="btnsearch" value="search" class="btn btn-outline-dark"><i class="fa fa-search"></i></button>

        </div>

        </div>

        </form>
 
      </div>
      <div class="-col-md-4">
      	<button name="remove" value="remove" form="myclasslist" class="btn btn-danger btn-delete"> <i class="fa fa-trash"></i>  </button>

      <a class="link-btn" href="<?php echo ROOT_URL; ?>schedules/indexselectsched">
        <button name="selectsched" value="selectsched" class="btn btn-success ml-1"> Select Schedule  </button>
      </a>

        <button class="ml-3 btn-change-sm btn btn-warning btn-delete" data-toggle="modal" data-target="#exampleModalCenter"> Delete All Sched </button>
   
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete ?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><b>The following will also be deleted</b></p>
              <ul>
                <li>Student's Schedule</li>
                <li>Student's Grade</li>
              </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button name="deletesched" value="deletesched" form="myclasslist" class="btn btn-warning ml-1"> Delete
               </button>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="col-md-2">

      </div>


     
  </div>
  <div class="row">
    <div class="col-md-6">
            <table class="table table-striped table-sm">
	         <h5 class="ml-5">Boys</h5>
              <thead class="th">
                <tr>
                  <th scope="col"><input type="checkbox" id="selectall" onClick="selectAll(this)" /></th>
                  <th scope="col">#</th>
                  <th scope="col">LRN</th>
                  <th scope="col">Name</th>
                  <th scope="col">Grades</th>
                  <th scope="col">Sched</th>
         
                </tr>
              </thead>
              <tbody>
          <?php foreach($viewmodel as $item): ?>
              <?php if($item['sex'] == 'Male'): ?>
                <tr>

                  <td><input form="myclasslist" type="checkbox" name="selected[]" value ="<?php echo $item['enrollmentid']; ?>"></td>
                 
                  <th scope="row"><?php $count_boys++; echo $count_boys;?> </th>

                  <td><a href="<?php echo ROOT_URL; ?>students/profile/<?php echo $item['tblstudentid'];?>"><?php echo $item['lrn']?></a></td>
                  
                  <td><?php echo $item['lastname'].', '.$item['firstname'].' '.$item['middlename']?></td>
                  <td class="text-center"><a href="<?php echo ROOT_URL; ?>grading/card/<?php echo $item['lrn']; ?>"><i class="fa fa-file"></i></a></td>
                  <td class="text-center"><a href="<?php echo ROOT_URL; ?>schedules/editschedshs/<?php echo $item['lrn']; ?>"><i class="fa fa-edit"></i></a></td>

                </tr>
            <?php endif; ?>
          <?php endforeach;  ?>
              </tbody>
            </table>
          </div>
          <?php $GLOBALS['total_boys'] = $count_boys; ?>
          <div class="col-md-6">
            <table class="table table-striped table-sm">
            <h5 class="ml-5">Girls</h5>
              <thead class="th">
                <tr>
                  <th scope="col"><input type="checkbox" id="selectall" onClick="selectAll(this)" /></th>
                  <th scope="col">#</th>
                  <th scope="col">LRN</th>
                  <th scope="col">Name</th>
                  <th scope="col">Grades</th>
                  <th scope="col">Sched</th>
         
                </tr>
              </thead>
              <tbody>
          
          <?php foreach($viewmodel as $item): ?>
             <?php if($item['sex'] == 'Female'): ?>
                <tr>
                  <td><input form="myclasslist" type="checkbox" name="selected[]" value ="<?php echo $item['enrollmentid']; ?>"></td>
                 
                  <th scope="row"><?php $count_girls++; echo $count_girls; ?> </th>

                  <td><a href="<?php echo ROOT_URL; ?>students/profile/<?php echo $item['tblstudentid'];?>"><?php echo $item['lrn']?></a></td>
                  <td><?php echo $item['lastname'].', '.$item['firstname'].' '.$item['middlename']?></td>
                  <td class="text-center"><a href="<?php echo ROOT_URL; ?>grading/card/<?php echo $item['lrn']; ?>"><i class="fa fa-file"></i></a></td>
                  <td class="text-center"><a href="<?php echo ROOT_URL; ?>schedules/editschedshs/<?php echo $item['lrn']; ?>"><i class="fa fa-edit"></i></a></td>
                </tr>
              <?php  endif; ?>
          <?php endforeach;  ?>
              </tbody>
            </table>
          </div>
    </div>
    <div class="-col-md-6">
        <button name="save" value="save" form="myclasslist" class="btn btn-primary btn-delete float-right mb-5">Save SF1</button>
    </div>
  </div>


  <script language="JavaScript">

  function selectAll(source) {
    checkboxes = document.getElementsByName('selected[]');
    for(var i in checkboxes)
      checkboxes[i].checked = source.checked;
  }
</script>