<?php
include '../koneksi.php';
if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tb_member VALUES (
                '',
                '$nama',
                '$username',
                '$password'
            )";
    if ( empty($nama) || empty($username) || empty($password) ) {
        echo "
            <script>
                alert('Pastikan anda mengisi semua data');
                window.location = 'login.html';
            </script>
        ";
    }
    elseif (mysqli_query($koneksi, $sql)){
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                window.location = 'login.html';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'login.html';
            </script>
        ";
    }
}