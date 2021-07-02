<?php 

    $koneksi = mysqli_connect("sql108.epizy.com", "epiz_28891503", "Onofbo5e5JS7", "epiz_28891503_petshop");

    function query($query){
        global $koneksi;
        $result = mysql_query($koneksi, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }


?>