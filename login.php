<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | M4 Store</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="bgLogin">
    <div class="boxLogin">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="inputControl">
            <input type="password" name="pass" placeholder="Password" class="inputControl">
            <a href="index.php" id="btn1">Kembali</a>
            <input type="submit" name="submit" value="Login" id="btn">
        </form>
        <?php
        if(isset($_POST['submit'])){
            session_start();
            include 'db.php';

            $user = mysqli_real_escape_string($conn, $_POST['user']);
            $pass = mysqli_real_escape_string($conn, $_POST['pass']);

            $cek = mysqli_query($conn, "select*from tb_admin where username='".$user."' and password='".md5($pass)."'");
            if(mysqli_num_rows($cek) > 0){
                $a = mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['admin_global'] = $a;
                $_SESSION['id'] = $a->id_admin;
                echo '<script>window.location="dashboard.php"</script>';
            }else{
                echo '<script>alert("Username atau Password anda salah")</script>';
            };
        }
        ?>
    </div>
</body>
</html>