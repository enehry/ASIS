<div class="container">
  <div class="row">
    <div class="col-md-6">
       <form action="<?php echo ROOT_URL;?>enrollment/seniorhigh" method="post" id="searchstudent">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.. (LRN/Student Name)"  name="searchitem">
        <div class="input-group-append">
        
        <button name="search" value="search" class="btn btn-outline-dark"> Search</button>
        </div>
        </div>
        </form>
 
      </div>
      <div class="col-md-6">
        <a href="<?php echo ROOT_URL;?>students/addstudent" >
        <button type="button" class="btn btn-success">Add</button>
      </a>
      </div>
  </div>
  <div class="row">
    <div class="col-md-6">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">LRN</th>
                <th scope="col">Lname</th>
                <th scope="col">Fname</th>
                <th scope="col">Mname</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($viewmodel as $data): ?>
              <tr>
                <th><input type="checkbox" name=""></th>
                <td scope="row"><small class="text-muted"><?php echo $data['lrn']; ?></small></td>
                <td><?php echo $data['lastname'];?></td>
                <td><?php echo $data['firstname'];?></td>
                <td><?php echo $data['middlename'];?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
    </div>
    <div class="col-md-6">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">#</th>
                <th scope="col">Lname</th>
                <th scope="col">Fname</th>
                <th scope="col">Mname</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <th scope="row">1</th>
                <td></td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>
    </div>
  </div>
</div>