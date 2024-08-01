<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Log in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="login-signup">
          <form action="home.php" method="post" class="log-in-form">
            <h2 class="title">Log in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <input type="submit" value="Login" class="btn solid" name="loginbtn"/>
            <p class="social-text">-----Log in with-----</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form action="home.php" method="post" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" />
            </div>
            <input type="submit" class="btn" value="Sign up" name="signupbtn" />
            <p class="social-text">-----Sign up with-----</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <p>"Welcome to <b><i>BLOSSOM & BITE</i></b>, where every dish is a masterpiece and every moment is a work of art. Indulge your senses and savor the elegance."</p><br>
            <h3>Don't have a account?Create one..</h3><br>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
        </div>
        <div class="panel right-panel">
          <div class="content">
            <p>"Welcome to <b><i>BLOSSOM & BITE</i></b>, where every dish is a masterpiece and every moment is a work of art. Indulge your senses and savor the elegance."</p><br>
            <h3>Already a user?Log In to your existing account..</h3><br>
            <button class="btn transparent" id="log-in-btn">
              Log in
            </button>
          </div>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  <?php
     $username=$_POST['username'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $conn=new mysqli('localhost','root','','login');
     if($conn->connect_error){
         die('Connection Failed:'.$conn->connect_error);
      }else{
         $stmt=$conn->prepare("insert into signup('username','email','password') values(?,?,?)");
         $stmt->bind_param("sss",$username,$email,$password);
         $stmt->execute();
         echo "Sign Up Successfully..";
         $stmt->close();
         $conn->close(); 
        }
      if(isset($_POST['loginbtn'])){
         $sql="SELECT * FROM login.login WHERE username='$username' ";
         $result=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($result)){
          $resultPassword=$row['password'];
       if($password==$resultPassword){
            header('Location:home.php');
        }else{
            echo "<script>
                alert('Login Unsuccessful');
                </script>";
            }
        }
      }
  ?>
  </body>
</html>