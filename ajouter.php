<?php
    require "connection.php";


    $nom= $_POST["name"];
    $type_alimentaire= $_POST["type_alimentaire"];
    $image= $_POST["image"];
    $habitat= $_POST["habitat"];

    $sql = "INSERT INTO animal(nom, type_alimentaire, image, id_habitat) VALUES ('$nom', '$type_alimentaire', '$image', '$habitat')";

    if($conn->query($sql)=== true){
        header("location: index.php");

    } else {
        echo "Erreur : " . $conn->error;
    }

?>