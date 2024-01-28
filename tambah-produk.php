<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M4 Store</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="inputControl" name="kategori" required>
                        <option value="">--Pilih--</option>
                        <?php
                            $kategori = mysqli_query($conn, "select*from tb_category order by id_category desc");
                            while($r = mysqli_fetch_array($kategori)){ 
                        ?>
                        <option value="<?php echo $r['id_category'] ?>"><?php echo $r['nama_category'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="nama" class="inputControl" placeholder="Nama produk" required>
                    <input type="text" name="harga" class="inputControl" placeholder="Harga produk" required>
                    <input type="file" name="gambar" class="inputControl" required>
                    <textarea name="deskripsi" class="inputControl" placeholder="Deskripsi"></textarea><br>
                    <select class="inputControl" name="status">
                        <option value="">--Pilih--</option>
                        <option value="1">Aktif</option>
                        <option value=0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" id="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        
                        // print_r($_FILES['gambar']);
                        // Menampung inputan dari form
                        $kategori = $_POST['kategori'];
                        $nama = $_POST['nama'];
                        $harga = $_POST['harga'];
                        $deskripsi = $_POST['deskripsi'];
                        $status = $_POST['status'];

                        // Menampung file yang akan diupload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'produk'.time().'.'.$type2;

                        // Menampung data format file yang diizinkan
                        $type_diizinkan = array('jpg', 'jpeg', 'png', 'webp', 'avif', 'gif');

                        // Validasi format file
                        if(!in_array($type2, $type_diizinkan)){
                            // jika format file tidak ada di type diizinkan
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        }else {
                            // jika format file ada di type diizinkan
                            // Proses upload file sekaligus insert ke database
                            move_uploaded_file($tmp_name, './produk/' .$newname);

                            $insert = mysqli_query($conn, "insert into tb_product values (
                                null,
                                '".$kategori."',
                                '".$nama."',
                                '".$harga."',
                                '".$deskripsi."',
                                '".$newname."',
                                '".$status."',
                                null
                            ) ");

                            if($insert){
                                echo '<script>alert("Simpan data berhasil")</script>';
                                echo '<script>window.location="data-produk.php"</script>';
                            }else {
                                echo 'Simpan data gagal'.mysqli_error($conn);
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
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>