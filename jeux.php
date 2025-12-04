<?php
    require "connection.php";

    $sql = "SELECT nom, image FROM animal ORDER BY RAND() LIMIT 4 ";
   
    $result = $conn->query($sql);
    $animals = $result->fetch_all(MYSQLI_ASSOC);

    $targetAnimal = $animals[array_rand($animals)]["nom"];

    $result = $conn->query($sql);
   
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Management Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">

    <button 
        id="mobile-menu-btn"
        class="lg:hidden fixed top-4 left-4 z-50 bg-green-600 text-white p-3 rounded-lg shadow-lg hover:bg-green-700 transition"
        aria-label="Toggle navigation menu"
        aria-expanded="false"
        aria-controls="sidebar">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
    <!-- Sidebar -->
    <aside id="sidebar" 
        class="fixed left-0 top-0 h-full w-64 bg-white shadow-lg flex flex-col z-40 transform -translate-x-full lg:translate-x-0 transition-transform duration-300"
        role="navigation"
        aria-label="Main navigation" >
        <div class="p-6 border-b">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-emerald-700 rounded-lg flex items-center justify-center shadow-md">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C10.9 2 10 2.9 10 4C10 4.7 10.4 5.4 11 5.7V7C9.3 7 8 8.3 8 10V11H6V10C6 9.4 5.6 9 5 9C4.4 9 4 9.4 4 10V14C4 14.6 4.4 15 5 15C5.6 15 6 14.6 6 14V13H8V14C8 15.7 9.3 17 11 17V18.3C10.4 18.6 10 19.3 10 20C10 21.1 10.9 22 12 22C13.1 22 14 21.1 14 20C14 19.3 13.6 18.6 13 18.3V17C14.7 17 16 15.7 16 14V13H18V14C18 14.6 18.4 15 19 15C19.6 15 20 14.6 20 14V10C20 9.4 19.6 9 19 9C18.4 9 18 9.4 18 10V11H16V10C16 8.3 14.7 7 13 7V5.7C13.6 5.4 14 4.7 14 4C14 2.9 13.1 2 12 2M12 4C12.6 4 13 4.4 13 5C13 5.6 12.6 6 12 6C11.4 6 11 5.6 11 5C11 4.4 11.4 4 12 4M11 9H13C13.6 9 14 9.4 14 10V14C14 14.6 13.6 15 13 15H11C10.4 15 10 14.6 10 14V10C10 9.4 10.4 9 11 9M12 20C11.4 20 11 19.6 11 19C11 18.4 11.4 18 12 18C12.6 18 13 18.4 13 19C13 19.6 12.6 20 12 20Z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Zoo Encyclopédie</h1>
                    <p class="text-xs text-gray-500">Animal Knowledge Base</p>
                </div>
            </div>
        </div>

         <div class="p-6">
            <a href="index.php"
                class="block w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition text-center">
                Home
            </a>
        </div>
        
        <div class="p-6">
            <a href="jeux.php"
                class="block w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition text-center">
                🎮 Jeux
            </a>
        </div>
    </aside>

    <main class="pt-24 lg:ml-64 p-4 lg:p-8" role="main">

    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Jeu : Trouvez l’animal</h2>

    <div class="text-center mb-6">
        <p class="text-xl font-semibold text-gray-700">
            Choisissez l’animal : <span class="text-green-600"><?= $targetAnimal ?></span>
        </p>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <?php foreach ($animals as $animal) { ?>  
        <form action="testJeux.php" method="POST">
            <div class="flex items-center justify-center">
                <input type="text" name="choice" value="<?= $animal["nom"] ?>" class="hidden">
                <input type="text" name="nomAnimal" value="<?= $targetAnimal ?>" class="hidden">

                <button type="submit">
                <img src="<?=$animal["image"] ?>" 
                class="w-40 h-40 object-cover rounded-xl shadow hover:scale-105 transition">
                </button>
            </div>
        </form>
        <?php } ?>
    </div>

</main>




</body>
</html>


