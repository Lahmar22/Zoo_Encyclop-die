<?php

$choise =$_POST["choice"];
$nom = $_POST["nomAnimal"];


    if ($choise == $nom) {
        echo "<script>
        alert('Action done!');
        window.location.href = 'jeux.php';
      </script>";
    } else {
       
         echo "<script>
        alert('Mauvaise réponse!');
        window.location.href = 'jeux.php';
      </script>";
    }

?>