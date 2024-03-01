<?php
error_reporting(0);
include 'config.php';

if(!isset($_SESSION['email'] ) == 0) {
  header('Location: view/admin/');
}

if(isset($_POST['login'])) {
  $email    = $_POST['email'];
  $password = $_POST['password'];

  try {
    //$sql = "SELECT * FROM users WHERE name = :name AND password = :password";
    $sql = "SELECT * FROM m_user WHERE email = :email AND status_aktif = 1 AND level_id >= 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    //$stmt->bindParam(':password', $password);
    $stmt->execute();
    
    $row = $stmt->fetch();
    $hash_password = $row['password'];
    if (password_verify($password, $hash_password)){
      $count = $stmt->rowCount();
      if($count == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['level_id'] = $row['level_id'];
        header("Location: view/admin/");
        return;
      }else{
        echo "<div class='notif'>Silahkan Lengkapi Data !</div>";
      }
    }
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SISTEM MANAJEMEN PEKERJAAN</title>

  <!-- Custom fonts for this template-->
  <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="public/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
 <div class="container">

    <!-- Outer Row -->
 
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">SISTEM MANAJEMEN PEKERJAAN</h5>
            <form action="" method="post"  class="user">
              
              <div class="form-label-group">
                <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail"></label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword"></label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-info btn-block text-uppercase" type="submit" name="login">LOGIN</button>
              <hr class="my-4">
              
            </form>
            <button type="button" class="btn btn-lg btn-primary btn-block text-uppercase" data-toggle="modal" data-target="#exampleModal">
              Register
            </button>
          </div>
        </div>
      </div>
    </div>



  </div>
  
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="register.php" method="post" class="user" enctype="multipart/form-data">
               
            <div class="form-label-group">
                <input type="text" name="nik" class="form-control" placeholder="NIK" required autofocus>
                <label for="inputNIK"></label>
              </div>
              
              <div class="form-label-group">
                <input type="file" name="ktp" class="form-control" placeholder="KTP" required >
                <label for="inputKTP"><a style="color:red;">* Upload KTP</a></label>
              </div>
           
            <div class="form-label-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required >
                <label for="inputEnama"></label>
            </div>
            
            <div class="form-label-group">
                <input type="text" name="hp" class="form-control" placeholder="Nomor hp / wa" required >
                <label for="inputHp"></label>
            </div>
        
          <div class="form-label-group">
            <input type="email" name="email" class="form-control" placeholder="Email address" required >
            <label for="inputEmail"></label>
          </div>
    
          <div class="form-label-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <label for="inputPassword"></label>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <!-- Bootstrap core JavaScript-->
  <script src="public/vendor/jquery/jquery.min.js"></script>
  <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="public/js/sb-admin-2.min.js"></script>

</body>

</html>
