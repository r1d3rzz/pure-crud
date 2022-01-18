<?php require "components/header.php"; ?>

    <div class="container">
      <div class="row">
        <div class="col-md m-auto my-5">
          <div class="card w-75 m-auto">
            <div class="card-header d-flex justify-content-between">
              <div class="display-6">Edit User</div>
              <div class="display-6">
                <a href="/" class="btn btn-outline-primary">Home</a>
              </div>
            </div>

            <?php
            require "bootstrap.php";
            
            $emailAddress = $_GET['email'];
            $select = "SELECT * FROM users WHERE email = '$emailAddress'";
            $user = mysqli_query($conn,$select);
            $userData = mysqli_fetch_assoc($user);
            // dd($userData['email']);

            $nameError = '';
            $emailError = '';
            $passwordError = '';
            $mobileError = '';

              if(isset($_POST['edit'])){
                $name = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $gender = $_POST['gender'];
                $mobile = $_POST['mobile'];

                if(empty($name)){
                  $nameError = "Please Enter Your Name";
                }

                if(empty($email)){
                  $emailError = "Please Enter Your Email";
                }

                if(empty($password)){
                  $passwordError = "Please Enter Your Password";
                }

                if(empty($mobile)){
                  $mobileError = "Please Enter Your Mobile";
                }

                $sql = mysqli_query($conn,"SELECT * FROM users WHERE email = '$emailAddress'");
                $res = mysqli_fetch_array($sql);
                if($res){
                  if(!empty($name) && !empty($email) && !empty($password) && !empty($mobile)){
                    $query = "UPDATE users SET name='$name',email='$email',password='$password',gender='$gender',mobile='$mobile' WHERE email = '$emailAddress'";
                    $val = mysqli_query($conn,$query);
                    echo "<script>alert('Your Account is Successfully Edit.')</script>";
                    echo "<script>location='index.php'</script>";
                  }
                }else{
                  echo "<script>alert('Your Email Address is doesn't Exits')</script>";
                }  
              }
            ?>

            <div class="card-body">
              <form action="" method="POST">
                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control <?php if($nameError != ''): ?> is-invalid <?php endif; ?>"
                    name="username"
                    id="floatingInput"
                    placeholder="Username"   
                    value="<?=$userData['name'];?>"                
                  />
                  <label for="floatingInput">Username</label>
                  <span class="text-danger"><?=$nameError;?></span>
                </div>
                <div class="form-floating mb-3">
                  <input
                    type="email"
                    name="email"
                    class="form-control <?php if($emailError != ''): ?> is-invalid <?php endif; ?>"
                    id="floatingInput"
                    placeholder="name@example.com"  
                    value="<?=$userData['email'];?>"  
                    readonly           
                  />
                  <label for="floatingInput">Email address</label>
                  <span class="text-danger"><?=$emailError;?></span>
                </div>
                <div class="form-floating mb-3">
                  <input
                    type="password"
                    name="password"
                    class="form-control <?php if($passwordError != ''): ?> is-invalid <?php endif; ?>"
                    id="floatingPassword"
                    placeholder="Password"     
                    value="<?=$userData['password'];?>"          
                  />
                  <label for="floatingInput">Password</label>
                  <span class="text-danger"><?=$passwordError;?></span>
                </div>
                <div class="form-floating mb-3">
                  <select
                    class="form-select"
                    name="gender"
                    id="floatingSelect"
                    aria-label="Floating label select example"
                  >
                    <option selected value="<?=$userData['gender']?>"><?=ucfirst($userData['gender'])?></option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                  <label for="floatingSelect">Gender</label>
                </div>
                <div class="form-floating">
                  <input
                    type="text"
                    name="mobile"
                    class="form-control <?php if($mobileError != ''): ?> is-invalid <?php endif; ?>"
                    id="floatingPassword"
                    placeholder="Mobile"   
                    value="<?=$userData['mobile'];?>"              
                  />
                  <label for="floatingPassword">Mobile</label>
                  <span class="text-danger"><?=$mobileError;?></span>
                </div>
                <div class="m-3 d-flex justify-content-between">
                  <div>
                    <input type="reset" value="Cancle" class="btn btn-danger" />
                  </div>
                  <div>
                    <input
                      type="submit"
                      name="edit"
                      value="Edit"
                      class="btn btn-primary"
                    />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php require "components/footer.php";?>
