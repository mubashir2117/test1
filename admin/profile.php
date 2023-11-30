<?php
    session_start();
    
    $id = $_SESSION["user_id"];
    include("config.php");
    include("header.php");
    $userQuery = "SELECT * FROM users where id = $id";
    $userData = mysqli_query($conn, $userQuery);
    $user = mysqli_fetch_array($userData);
    $query = "SELECT * FROM roles";
    $result = mysqli_query($conn, $query);
?>
<main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="section-header mt-5">
          <h2>Edit your details!</h2>
        </div>

        <div class="row gx-lg-0 gy-4">
          <div class="col-lg-6 mx-auto">
            <form method="post" role="form" class="php-email-form1">
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="text"value="<?php echo $user["user_name"]?>" name="name" class="form-control" id="name" placeholder="Your Username" required>
                </div>
                <br>
                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <input type="email"value="<?php echo $user["user_email"]?>" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                </div>
                <br>
                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <input type="password"value="<?php echo $user["user_password"]?>" class="form-control" name="password" id="email" placeholder="Enter Password" required>
                </div>
                <br>
                <div class="col-md-12 form-group mt-3 mt-md-0">
                    <textarea class="form-control" name="address" rows="7" placeholder="Enter your address" required><?php echo $user["user_address"]?></textarea>
                </div>
              </div>
              
              <div class="text-center"><button type="submit" name="submit">Submit</button></div>
            </form>
          </div><!-- End Contact Form -->
        </div>

      </div>
    </section><!-- End Contact Section -->
</main>

<?php
    if(isset($_POST["submit"])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        
        if($name != null){
            $query = "UPDATE `users` SET `user_name`='$name',`user_email`='$email',`user_password`='$password',`user_address`='$address' WHERE id = $id";
        }
      
      $result = mysqli_query($conn, $query);
      echo "<script>location.href = '/2301b1/stationery/index.php';</script>";
    }
    include("footer.php");
?>



