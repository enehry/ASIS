
<div class="container">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 profile-box" >
        <div class="header-student-profile text-center mb-0">
          <h5 class="mb-0">Student's Grade</h5>
          <p class="mb-0"><?php echo $viewmodel['term']; ?> Semester</p>
          <h5 class="mb-0"><?php echo $viewmodel['description']; ?></h5>
          <small class="text-muted"> Subject</small>
        </div>
          <div class="panel panel-info">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-6 col-lg-6 mt-3 mb-0" align="center"> 
                  <div class="img-cropper">
                    <img alt="User Pic" class="img-fluid" id="pgrading" src="<?php echo ROOT_URL?>assets/images/students/<?php 
                  if($viewmodel['profileimagename']){

                   echo $viewmodel['profileimagename'];}
                   else {
                   echo 'user.png';
                   } ?>">
                  </div>
                
             
                </div>
                <div class="screen col-md-6 col-lg-6 mt-auto ml-auto mb-4 ">
                  <h5 class="mb-0"><?php echo $viewmodel['lrn']; ?></h5>
                  <small class="text-muted">Learners Reference Number</small>
                  <h5 class="mb-0">
                  <?php echo $viewmodel['lastname'].','
                  .$viewmodel['firstname'].' '.$viewmodel['middlename']; ?></h5>
                  <small class="text-muted">Name</small>
                  <h5 class="mb-0">
                  <?php echo $viewmodel['grade'].' - '
                  .$viewmodel['section']; ?></h5>
                  <small class="text-muted">Grade and Section</small>
                </div>
             
            
                    
                
               
               </div>

              
               </div>
               <div class="row">
                <div class=" col-md-12 col-lg-12"> 
                <div class="buttons float-right mb-4 mr-4">
                </div>
                
                  <table class="table table-user-information">
                    <thead class="th text-center">
                        <tr>
                          <th scope="col">Midterm</th>
                          <th scope="col">Final</th>
                          <th scope="col">Remarks</th>
          
                        </tr>
                    </thead>
                    <tbody>
                      
                        <tr>
                          <td><input id="first" class="form-control text-center" type="text" name="mid" value="<?php echo $viewmodel['mid'];?>" form="savegrade"></td>
                          <td><input id="second" class="form-control text-center" type="text" name="final" value="<?php echo $viewmodel['final'];?>" form="savegrade" onblur="calculate()"></td>
                          <td><input id="total" class="form-control text-center" type="text" name="remarks" value="<?php echo $viewmodel['remarks'];?>" form="savegrade"></td>
                        </tr>
            

                     
                    </tbody>
                  </table>
                 </div>
                </div>
              </div>
              <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="savegrade">
              <button class="btn btn-success float-right" name="save" value="save" id="savegrade">Save</button>
            </form>

            </div>
                 <div class="panel-footer float-right">
                       
                 </div>
            
          </div>
          <div class="col-lg-2"></div>
        </div>
 <script type="text/javascript">

        var first = 0;
        var second = 0;
      function calculate(){
        var first = document.getElementById('first').value;
        var second = document.getElementById('second').value;

        var ave = (parseInt(first)+parseInt(second))/2;
        if(ave > 74){
          document.getElementById('total').value = "Passed";
        } else {
          document.getElementById('total').value = "Failed";
        }
      }

 </script>