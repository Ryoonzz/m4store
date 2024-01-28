<?php
    include 'db.php';

    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "DELETE from tb_category where id_category='".$_GET['idk']."' ");
        echo '<script>window.location="data-kategori.php"</script>';
    }

    if(isset($_GET['idp'])){

        $produk = mysqli_query($conn, "SELECT gambar_product from tb_product where id_product='".$_GET['idp']."' ");
        $p = mysqli_fetch_object($produk);

        unlink('./produk/'.$p->gambar_product);

        $delete = mysqli_query($conn, "DELETE from tb_product where id_product='".$_GET['idp']."' ");
        echo '<script>window.location="data-produk.php"</script>';
    }
?>