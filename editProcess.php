<?php
    include "myconnection.php";

    $id = $_GET["myid"];
    $name = $_GET["myname"];
    $address = $_GET["myaddress"];
    $foto = $_FILES['myfoto']['name'];
    $tempdata = $_FILES['myfoto']['tmp_name'];

    $lokasigambar = "img/";

    move_uploaded_file($tempdata, $lokasigambar . $foto);

    $query = "UPDATE student SET name='$name',address='$address' WHERE id=$id";

    if(mysqli_query($connect, $query)){
        header('Location:homeCRUD.php');
    }
    else{
        echo "Gagal mengubah data <br>". mysqli_error($connect);
    }

    mysqli_close($connect);
?>