<?php
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT telp_admin, email_admin, alamat_admin from tb_admin where id_admin=31100607 ");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT*from tb_product where id_product='".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
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
            <h1><a href="index.php">M4_Store</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
                <li title="Untuk Admin"><a href="login.php">Login</a></li>
            </ul>
        </div>
    </header>

    <!-- Search -->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- Detail Produk -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->gambar_product ?>" width="100%">
                </div>
                <div class="col-2">
                    <h3><?php echo $p->nama_product ?></h3>
                    <h4>Rp. <?php echo number_format($p->harga_product) ?></h4>
                    <p>Deskripsi : <br>
                        <?php echo $p->deskripsi_product ?>
                    </p>
                    <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->telp_admin ?>&text=Hai, Saya tertarik dengan produk Anda." target="_blank">
                    Hubungi via <span class="wa">WhatsApp</span></a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->alamat_admin ?></p>
            
            <h4>Email</h4>
            <p><?php echo $a->email_admin ?></p>

            <h4>No. HP</h4>
            <p><?php echo $a->telp_admin ?></p>
            <small>Copyright &copy; 2024 - M4 Store.</small>
        </div>
    </div>
</body>
</html>