<?php
    require "connection.php";

    $id= $_POST["animal_id"];
    $nom= $_POST["name"];
    $type_alimentaire= $_POST["type_alimentaire"];
    $image= $_POST["image"];
    $habitat= $_POST["habitat"];

    $sql = "UPDATE animal SET nom = '$nom', type_alimentaire = '$type_alimentaire', image = '$image', id_habitat= '$habitat' WHERE  id_animal = $id"; 

    if($conn->query($sql)=== true){
        header("location: index.php");

    } else {
        echo "Erreur : " . $conn->error;
    }

?>