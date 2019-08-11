
</script>

<div class="container">
  <div class="row">
  <div class="col-md-12 mb-2">
    <h5><span class="badge badge-primary">GRADE: <?php
        if(!empty($viewmodel)){
        echo $viewmodel[0]['grade'];
       } ?></span><span class="badge badge-primary ml-2">SECTION: <?php 
       if(!empty($viewmodel)){
        echo $viewmodel[0]['section']; }?></span>
        <span class="badge badge-warning">SUBJECT: <?php 
        if(!empty($viewmodel)){
        echo $viewmodel[0]['description']; }?></span></h5>
  </div>
  </div>
  <?php Messages::displayCustomMsg(); ?>
  <div class="row">
    <div class="col-md-6">
       <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="viewmystudent">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.. (LRN/Student's Name)"  name="searchitem">
        <div class="input-group-append">
        


        <button name="btnsearch" value="search" class="btn btn-outline-dark" form="viewmystudent"><i class="fa fa-search"></i></button>

        </div>

        </div>

        </form>
 
      </div>
 
     
  </div>
  <div class="row">
    <div class="col-md-6">
    		

          <table id="data_table" class="table table-striped table-sm">
	         <h5 class="ml-5">Boys</h5>
              <thead class="th">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">LRN</th>
                  <th scope="col">Name</th>
                  <th scope="col">Mid</th>
                  <th scope="col">Finals</th>
                  <th scope="col">Edit</th>
  
                </tr>
              </thead>
              <tbody>
             

          <?php $num = 1; foreach($viewmodel as $item): ?>
              <?php if($item['sex'] == 'Male'): ?>
                <tr id="<?php echo $item['tblgradeid'];?>">
                <th><?php echo $num; $num++;?></th>
                <td>
                <a href="<?php echo ROOT_URL; ?>students/profile/<?php echo $item['tblstudentid'];?>"><?php echo $item['lrn']?></a>
                </td>  
                <td>
                <?php echo $item['lastname'].', '.$item['firstname'].' '.$item['middlename']?>
                </td>
                <td>
                  <?php echo $item['mid']; ?>
                </td>
                <td>
                  <?php echo $item['final']; ?>
                </td>
                <td>
                  <a href="<?php echo ROOT_URL?>grading/grades/<?php echo $_GET['id'].'/'.$_GET['key'].'*'.$item['tblgradeid']; ?>">
                  <button class="btn btn-primary btn-sm">
                    <i class="fa fa-pen fa-sm"></i>
                  </button>
                  </a>
                </td>
                </tr>
            <?php endif; ?>
          <?php endforeach;  ?>
              </tbody>
    
            </table>
          </div>
          <div class="col-md-6">
            <table id="data_table" class="table table-striped table-sm">
           <h5 class="ml-5">Girls</h5>
              <thead class="th">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">LRN</th>
                  <th scope="col">Name</th>
                  <th scope="col">Mid</th>
                  <th scope="col">Finals</th>
                  <th scope="col">Edit</th>
  
                </tr>
              </thead>
              <tbody>
             

          <?php $num_g = 1; foreach($viewmodel as $item): ?>
              <?php if($item['sex'] == 'Female'): ?>
                <tr id="<?php echo $item['tblgradeid'];?>">
                <th><?php echo $num_g; $num_g++;?></th>
                <td>
                <a href="<?php echo ROOT_URL; ?>students/profile/<?php echo $item['tblstudentid'];?>"><?php echo $item['lrn']?></a>
                </td>  
                <td>
                <a href="<?php echo ROOT_URL; ?>grading/grades/<?php echo $item['lrn']; ?>"><?php echo $item['lastname'].', '.$item['firstname'].' '.$item['middlename']?></a>
                </td>
                <td>
                  <?php echo $item['mid']; ?>
                </td>
                <td>
                  <?php echo $item['final']; ?>
                </td>
                <td>
                  <a href="<?php echo ROOT_URL?>grading/grades/<?php echo $_GET['id'].'/'.$_GET['key'].'*'.$item['tblgradeid']; ?>">
                  <button class="btn btn-primary btn-sm">
                    <i class="fa fa-pen fa-sm"></i>
                  </button>
                  </a>
                </td>
                </tr>
            <?php endif; ?>
          <?php endforeach;  ?>
              </tbody>
    
            </table>
          </div>
    </div>
    <script>


    </script>