<div class="container">
  <div class="tooltips mb-3"><h5 class="badge badge-primary"><span>Advisory</span></h5>
  <span class="tooltiptexts"><strong>Note:</strong>
    Please click the check box first before you set and delete adviser for advisory class.
  </span>
</div>
<div class="row">
  <div class="col-md-6">
    <form action="<?php echo ROOT_URL;?>enrollment/setadvisorysearch" method="post" id="search">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.. (LRN/Teacher's Name)"  name="searchitem">
        <div class="input-group-append">
          
          <button name="btnsearch" value="search" class="btn btn-outline-dark"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </form>
    <form action="<?php echo ROOT_URL;?>enrollment/setadvisoryclass" method="post" id="setadviser">
    </form>
  </div>
</div>
 
<div class="row">
  <div class="col-md-6">
    <div class="row mb-2">
      <div class="col">
        <select class="form-control" name="grade" form="setadviser">
          <option selected="true" disabled="disabled">Grade</option>
          <option>11</option>
          <option>12</option>
        </select>
      </div>
      <div class="col">
        <select class="form-control col-xs-2" name="section" form="setadviser">
          <option selected="true" disabled="disabled">Section</option>
          <option>ICT-A</option>
          <option>ICT-B</option>
          <option>ICT-C</option>
        </select>
      </div>
      <div class="col">
        <button name="btnset" value="btnset" class="btn btn-success" form="setadviser"><i class="fa fa-user-plus"></i> Set</button>
      </div>
    </div>
    <table class="table table-striped table-sm">
      
      <thead class="th">
        <tr>
          <th scope="col"></th>
          <th scope="col">#</th>
          <th scope="col">TRN</th>
          <th scope="col">Teacher</th>
          <th scope="col">Advisory class</th>
        </tr>
      </thead>
      <tbody>
        <?php $count = 0 ?>
        <?php foreach($viewmodel as $item): ?>
        <tr>
          <td><input form="setadviser" type="checkbox" name="selected[]" value ="<?php echo $item['tbladvisoryclassid'].','.$item['trn']; ?>"></td>
          
          <th scope="row"><?php $count++; echo $count; ?> </th>
          <td><a href="<?php echo ROOT_URL; ?>teachers/teacherprofile/<?php echo $item['tblteacherid'];?>"><?php echo $item['trn']?></a></td>
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
  <div class="col-md-6">
    <div class="row float-right">

    <button class="mr-3 mb-2 btn-change-sm btn btn-danger btn-delete" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-trash-alt"></i> Delete Advisory</button>
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
            <li>Student's Grading</li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <form action="<?php echo ROOT_URL;?>enrollment/setadvisoryclass" method="post" id="setadviser">
            <input type="submit" form="setadviser" name="delete" value="DELETE" type="button" class="btn btn-danger">
          </form>
        </div>
      </div>
    </div>
  </div>
    </div>
    <table class="table table-striped table-sm">
      <thead class="th">
        <tr>
          <th scope="col"></th>
          <th scope="col">#</th>
          <th scope="col">TRN</th>
          <th scope="col">Adviser</th>
          <th scope="col">Advisory class</th>
        </tr>
      </thead>
      <tbody>
        <?php $count = 0 ?>
        <?php 
        $advisers = new Dashboard();
        $advisers->setPageAdvisory($GLOBALS['offset'],$GLOBALS['per_page'],'%%');
        $res = $advisers->getAdvisoryClass();
        foreach($res as $item): ?>
        <tr>
          <td><input form="setadviser" type="checkbox" name="selected[]" value ="<?php echo $item['tbladvisoryclassid'].','.$item['trn']; ?>"></td>
          
          <th scope="row"><?php $count++; echo $count; ?> </th>
          <td><a href="<?php echo ROOT_URL; ?>teachers/teacherprofile/<?php echo $item['tblteacherid'];?>"><?php echo $item['trn']?></a></td>
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
   <?php if(empty($res)){
          echo '<p class="alert alert-warning">
      Empty</p>';
        }
       ?>
  </div>
</div>

<?php
$pagination = new Pagination();
$pagination->setPage($GLOBALS['page'],$GLOBALS['per_page'],$GLOBALS['total_rows']);
$pagination->paginate(ROOT_URL.'enrollment/setadvisoryclass/');
?>
</div>