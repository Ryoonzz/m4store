<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($conn, "select*from tb_admin where id_admin='".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M4 Store</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">M4_Store</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="inputControl" value="<?php echo $d->nama_admin ?>" required>
                    <input type="text" name="user" placeholder="Username" class="inputControl" value="<?php echo $d->username ?>" required>
                    <input type="text" name="noHP" placeholder="Nomor HP" class="inputControl" value="<?php echo $d->telp_admin ?>" required>
                    <input type="email" name="email" placeholder="Email" class="inputControl" value="<?php echo $d->email_admin ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="inputControl" value="<?php echo $d->alamat_admin ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" id="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama = ucwords($_POST['nama']);
                        $user = $_POST['user'];
                        $noHP = $_POST['noHP'];
                        $email = $_POST['email'];
                        $alamat = ucwords($_POST['alamat']);

                        $update = mysqli_query($conn, "update tb_admin set 
                        nama_admin='".$nama."',
                        username='".$user."',
                        telp_admin='".$noHP."',
                        email_admin='".$email."',
                        alamat_admin='".$alamat."'
                        where id_admin='".$d->id_admin."' ");
                        if($update){
                            echo '<script>alert("Perubahan berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else {
                            echo 'Perubahan gagal '.mysqli_error($conn);
                        }
                    }
                ?>
            </div>

            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="inputControl" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password" class="inputControl" required>
                    <input type="submit" name="ubahPassword" value="Ubah Profil" id="btn">
                </form>
                <?php
                    if(isset($_POST['ubahPassword'])){
                        $pass1 = $_POST['pass1'];
                        $pass2 = $_POST['pass2'];

                        if($pass2 != $pass1){
                            echo '<script>alert("Konfirmasi password baru tidak sesuai")</script>';
                        }else {
                            $u_pass = mysqli_query($conn, "update tb_admin set 
                            password='".md5($pass1)."'
                            where id_admin='".$d->id_admin."' ");
                            if($u_pass){
                                echo '<script>alert("Perubahan berhasil")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }else {
                                echo 'Perubahan gagal '.mysqli_error($conn);
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - M4 Store</small>
        </div>
    </footer>
</body>
</html>