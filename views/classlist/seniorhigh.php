<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="#" method="post" id="searchclasslist">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.."  name="searchitem">
                    <div class="input-group-append">
                        
                        <button name="search" value="search" class="btn btn-outline-dark"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    <div class="row mb-4">
        <?php foreach ($viewmodel as $data):?>
        <div class="col-md-3">
            <!-- Card -->
            <div class="card testimonial-card">

              <!-- Background color -->
              <div class="card-bg-classlist"></div>

              <!-- Avatar -->
              <div class="avatar mx-auto white">
                <img class=" img-classlist" src="<?php echo ROOT_URL; ?>/assets/images/teachers/<?php

                  if(!empty($data['profileimagename'])){
                    echo $data['profileimagename'];
                  } else {
                    echo 'user.png';
                  }


                 ?>">
              </div>

              <!-- Content -->
              <div class="card-body pt-0 text-center">

                <h6 class="card-title mt-2"><?php echo $data['lastname'].', '.$data['firstname'].' '.$data['middlename']; ?></h6>
                <hr>

                <p class="mb-0">Grade <?php echo $data['grade']; ?></p>
                <p class="mt-0"><?php echo $data['section'] ?></p>
                <?php $split = explode('-',$data['section']); 
                $combine = $split[0].'*'.$split[1]; ?>
                <a href="<?php echo ROOT_URL; ?>classlist/adminclasslist/<?php echo $data['grade'].'/'.$combine; ?>">
                <button class="btn btn-outline-primary">View</button></a>
              </div>
        </div>
      </div>
      <?php endforeach;?>
  </div>
</div>
</div>


<?php

  $pagination = new Pagination();
  $pagination->setPage($GLOBALS['page'],$GLOBALS['per_page'],$GLOBALS['total_rows']);
  $pagination->paginate(ROOT_URL.'classlist/seniorhigh/');

?>
