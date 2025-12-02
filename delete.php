<?php
    require "connection.php";


    $id= $_POST["id_animal"];
    

    $sql = "DELETE FROM  animal WHERE id_animal = $id";

    if($conn->query($sql)=== true){
        header("location: index.php");

    } else {
        echo "Erreur : " . $conn->error;
    }

?>