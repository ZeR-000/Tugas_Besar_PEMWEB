<?php 
    include '../koneksi.php';
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM tb_member WHERE username = '$username' 
        AND password = '$password'";
        $result = mysqli_query($koneksi, $sql);
        
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                    session_start();
                    $_SESSION['nama'] = $row['nama'];
                    header('location:../index2.php');
        }
    }
    else {
        echo "
            <script>
                alert('Username atau Password anda Salah, Coba Lagi'); 
                window.location = 'Login/login.html';
            </script>
            ";
            }
    }
?>