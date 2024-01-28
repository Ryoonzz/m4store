<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db_m4store';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung dengan database')
?>