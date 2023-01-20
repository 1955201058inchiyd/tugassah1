<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>olshoponline</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container">
        <a class="navbar-brand" class="logo"><img src="img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php"><b>HOME</b></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="produk.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">PRODUK</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="produk.php">PRODUK</a></li>
                <li><a class="dropdown-item" href="pembelian.php">PEMBELIAN</a></li>
                <li><a class="dropdown-item" href="pelanggan.php">PELANGGAN</a></li>
              </ul>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="login.php">LOGIN</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="logout.php">LOGOUT</a>
            </li>
             
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    


    <!-- login -->
    <div class="container">
      <div class="row">
         <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <br><br>
              <h3 align="center" class="panel-title">Login Pelanggan</h3>
            </div>
            <div class="panel-body">
              <form method="post">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="from-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <br>
                <button class="btn btn-primary" name="login">Login</button>
                Registeration Now >>> <a href="registration.php" >click here </a>
              </form>
            </div>
          </div>
        </div>
          
      </div>
    </div>

    <?php 
    if (isset($_POST['login']))
    {
      include 'koneksi.php';
      $email = trim(mysqli_escape_string($conn,$_POST["email"]));
      $password = sha1(trim(mysqli_escape_string($conn,$_POST["password"])));
      $ambil = $conn->query("SELECT * FROM login WHERE email= '$email' AND password= '$password'");
      $akunyangcocok = $ambil->num_rows;

      if ($akunyangcocok==1)
      {
        $akun = $ambil->fetch_assoc();
        $_SESSION["pelanggan"] = $akun;
        echo "<script>alert('Anda sukse login');</script>";
        echo "<script>location='index.php';</script>";
      }
      else
      {
        echo "<script>alert('Anda gagal login priksa akun anda');</script>";
        echo "<script>location='login.php';</script>";
      }
    }
    ?>
     
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Footer -->
    <br><br><br><br><br>
    <footer class="py-4">
      <div class="container">
       <p class="m-0 text-center text-dark">Copyright 2021&copy; <b style="font-size:auto; font-style: italic; color: red;">rphonecell</b></p>
      </div>
      <!-- /.container -->
    </footer>

  </body>
</html>