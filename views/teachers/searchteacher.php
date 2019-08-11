<!-- WAG KA MALILITO SEARCH TO HINDI INDEX HAHHA -->

<div class="container">
  <div class="tooltips mb-3"><h5 class="badge badge-primary"><span>Teachers</span></h5>
  <span class="tooltiptexts"><strong>Note:</strong>
    In this tab you can ADD, DELETE, VIEW AND UPDATE teacher's information.
  </span>
  </div>
  <div class="row">
    <div class="col-md-6">
       <form action="<?php echo ROOT_URL;?>teachers/searchteacher" method="post" id="searchteacher">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.. (LRN/Teacher's Name)"  name="searchitem">
        <div class="input-group-append">
        
        <button name="search" value="search" class="btn btn-outline-dark"> Search</button>
        </div>
        </div>
        </form>
 
      </div>
      <form action="<?php echo ROOT_URL;?>teachers" method="post" id="delete"></form>
     
      <div class="col-md-6">
        <a href="<?php echo ROOT_URL;?>teachers/addteacher" >
        <button type="button" class="btn btn-success">Add</button>
      </a>
         <button name="delete" value="delete" form="delete" class="btn btn-danger btn-delete"> Delete</button>
         
    
    
      </div>
  </div>
  <div class="row">
    <div class="col-md-12">
          <div class="student-table table-responsive">
            <table class="table table-striped table-sm">
              <thead class="th">
                <tr>
                  <th scope="col"></th>
                  <th scope="col">#</th>
                  <th scope="col">TRN</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Middle Name</th>
                </tr>
              </thead>
              <tbody>

          <?php 
          $count = 0 ?>
          <?php foreach($viewmodel as $item):


           ?>

                <tr>
                  <td><input form="delete" type="checkbox" name="id[]" value ="<?php echo $item['tblteacherid']; ?>"></td>
                 
                  <th scope="row"><?php $count++; echo $count; ?> </th>

                  <td><a href="<?php echo ROOT_URL; ?>teachers/teacherprofile/<?php echo $item['tblteacherid'];?>"><?php echo $item['trn']?></a></td>
                  <td><?php echo $item['lastname']?></td>
                  <td><?php echo $item['firstname']?></td>
                  <td><?php echo $item['middlename']?></td>
                 
               
                </tr>
          <?php endforeach;  ?>

              </tbody>
            </table>
          </div>
    </div>
  </div>
  <?php
    Messages::displayCustomMsg();
  if(!empty($viewmodel)){

  $pagination = new Pagination();
  $pagination->setPage($GLOBALS['page'],$GLOBALS['per_page'],$GLOBALS['total_rows']);
  $pagination->paginate(ROOT_URL.'teachers/searchteacher/'.$GLOBALS['searchkey'].'/');
     } else { echo '<div class="alert alert-warning" role="alert">
  No data retrieve
</div>';}

   ?>
</div>