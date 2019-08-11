<div class="container">
  <div class="row">
    <div class="col-md-6">
       <form action="<?php echo ROOT_URL;?>enrollment/seniorhigh" method="post" name="formshs" id="formshs">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.. (LRN/Student Name)"  name="searchitem">
        <div class="input-group-append">
        
        <button name="btnsearch" value="search" class="btn btn-outline-dark"><i class="fa fa-search fa-lg"></i></button>


        </div>
        </div>
        </form>
      
      </div>
      <div class="col-md-6 input-group">
        
          <div class="form-group">
          <button name="btnenroll" value="enroll" class="btn btn-success m-auto form-control" form="formshs">Enroll to My Class</button>
          </div>
      </div>

     
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
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
            <?php $count = 0 ?>
            <?php foreach($viewmodel as $item): ?>
                  <tr>
                    <td><input form="formshs" type="checkbox" name="selected[]" value ="<?php echo $item['lrn']; ?>"></td>
                   
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
</div>