<?php require "components/header.php"; ?>

    <div class="container">
      <div class="row">
        <div class="col-md m-auto my-5">
          <!--card Display-->
          <div class="card">
            <div class="card-header">
              <a href="adduser.php" class="btn btn-primary">Add User</a>
            </div>
            <div class="card-body">
              <table class="table table-bordered border-info table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <!-- <th scope="col">password</th> -->
                    <th scope="col">gender</th>
                    <th scope="col">mobile</th>
                    <th scope="col" class="text-center">Update And Edit</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    require 'bootstrap.php';
                    $users = mysqli_query($conn,"SELECT * FROM users");
                    
                    foreach($users as $user){ ?>
                        <tr>
                        <th scope="row"><?=$user['id'];?></th>
                        <td><?=$user['name'];?></td>
                        <td><?=$user['email'];?></td>
                        <!--Password Blank-->
                        <td><?=$user['gender'];?></td>
                        <td><?=$user['mobile'];?></td>
                        <td class="text-center">
                          <a href="edituser.php?email=<?=$user['email'];?>" class="btn btn-secondary btn-sm"
                            >Edit</a
                          >
                          <a href="delete.php?email=<?=$user['email'];?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>

                   <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!--end card Display-->
        </div>
      </div>
    </div>

<?php require "components/footer.php"; ?>
