<?php
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT telp_admin, email_admin, alamat_admin from tb_admin where id_admin=31100607 ");
    $a = mysqli_fetch_object($kontak);
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

    <!-- Produk baru -->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php
                    if($_GET['search'] != '' || $_GET['kat'] != ''){
                        $where = "AND nama_product like '%".$_GET['search']."%' AND id_category like '%".$_GET['kat']."%' ";
                    }
                    $produk = mysqli_query($conn, "SELECT*from tb_product where status_produk=1 $where order by id_product desc");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                <a href="detail-produk.php?id=<?php echo $p['id_product'] ?>">
                    <div class="col-4">
                        <img src="produk/<?php echo $p['gambar_product'] ?>">
                        <p class="nama"><?php echo $p['nama_product'] ?></p>
                        <p class="harga">Rp. <?php echo number_format($p['harga_product']) ?></p>
                    </div>
                </a>
                <?php }}else { ?>
                    <p>Produk tidak ada</p>
                <?php } ?>
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