

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Mengisi tinggi viewport */
            margin: 0;
            background-image : url('./assets/image/background-2.jpg');
        }
        .container {
            /* Sesuaikan gaya div sesuai kebutuhan */
            width: 400px; /* Contoh lebar div */
            height: 200px; /* Contoh tinggi div */
        }
    </style>
</head>
<body>
<?php require 'koneksi/koneksi.php'; ?>
<div class="container col-sm-3">
            <div class="card" style=" background: #ddd">
                <div class="card-body">
                    <?php if($_SESSION['USER']){?>
                        Selamat Datang , <?php echo $_SESSION['USER']['nama_pengguna'];?>
                        <br/>
                        <br/>
                        <center>
                            <?php if($_SESSION['USER']['level'] == 'admin'){?>
                                <a href="admin/index.php" class="btn btn-primary mb-2 btn-block">Dashboard</a>
                            <?php }else{?>
                                <a href="blog.php" class="btn btn-primary mb-2 btn-block">Booking Sekarang !</a>
                            <?php }?>
                            <!-- Button trigger modal -->
                            <a href="admin/logout.php" class="btn btn-danger text-white btn-block">
                                Logout
                            </a>
                        </center>
                    <?php }else{?>
                    <form method="post" action="koneksi/proses.php?id=login">
                        <center><h5 class="card-title">Login</h5></center>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="user" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="pass" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <center><button class="btn btn-primary mt-3">Login</button>     
                        <!-- Button trigger modal -->
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>