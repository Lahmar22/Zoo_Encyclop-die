<?php
    require "connection.php"; 

    $total =0;
    $sql = "SELECT * FROM  animal, habitats  WHERE animal.id_habitat =  habitats.id_habitat ORDER BY id_animal";

    $result = $conn->query($sql);

    $filterAlimentaire = $_POST["filterAlimentaire"];
    $filter_habitat = $_POST["filter_habitat"];

    $sql2 = "SELECT * FROM  animal, habitats WHERE animal.type_alimentaire = '$filterAlimentaire' AND animal.id_habitat = '$filter_habitat' AND animal.id_habitat =  habitats.id_habitat ";

    $result2 = $conn->query($sql2);

    $sql3 = "SELECT COUNT(*) AS total FROM animal WHERE type_alimentaire = 'omnivore'";

    $sql4 = "SELECT COUNT(*) AS total FROM animal WHERE type_alimentaire = 'carnivore'";
 
    $sql5 = "SELECT COUNT(*) AS total FROM animal WHERE type_alimentaire = 'herbivore'";

    $omnivore_count = $conn->query($sql3)->fetch_assoc()['total'];
    $carnivore_count = $conn->query($sql4)->fetch_assoc()['total'];
    $herbivore_count = $conn->query($sql5)->fetch_assoc()['total'];

    $total = $omnivore_count + $carnivore_count + $herbivore_count;

   if($total != 0){
    $omnivore_percentage = ($omnivore_count / $total) * 100 ;
    $carnivore_percentage = ($carnivore_count / $total) * 100 ;
    $herbivore_percentage = ($herbivore_count / $total) * 100 ;
   }

    
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
            
            <button data-modal-target="addAnimal" data-modal-toggle="addAnimal" class="block w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition text-center" type="button">
                Add animal
            </button>
            
        </div>
    </aside>


    <!-- Main Content -->
    <main class="pt-24 lg:ml-64 p-4 lg:p-8" role="main">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Zoo Encyclopédie</h2>
        

        <div id="filter" >
            
            <!-- Filter by Name -->
            <form action="index.php" method="POST" class="flex flex-col lg:flex-row gap-3 mb-6 bg-white p-4 rounded-lg shadow-md" > 
                <div class="flex-1">
                <label for="filter-name" class="block text-sm font-medium text-gray-700 mb-2">
                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Filter by Alimentaire
                </label>
                <select 
                    name="filterAlimentaire"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition appearance-none bg-white cursor-pointer">
                    <option value="">All Alimentaire</option>
                    <option value="carnivore">🥩 Carnivore</option>
                    <option value="herbivore">🥦 Herbivore</option>
                    <option value="omnivore">🥘 Omnivore</option>
                    </select>
                </div>

                <!-- Filter by Habitat -->
                <div class="flex-1">
                <label for="filter-habitat" class="block text-sm font-medium text-gray-700 mb-2">
                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Filter by Habitat
                </label>
                <select 
                    id="filter-habitat"
                    name="filter_habitat"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition appearance-none bg-white cursor-pointer"
                    aria-label="Filter animals by habitat">
                    <option value="">All Habitats</option>
                    <option value="1">🪶 Savane</option>
                    <option value="2">🌳 Jungle</option>
                    <option value="3">🏜️ Désert</option>
                    <option value="4">🌊 Océan</option>
                </select>
                </div>

                <!-- Reset Filter Button -->
                <div class="flex items-end">
                <button 
                    type="submit"
                    id="reset-filters"
                    class="w-full lg:w-auto px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition focus:outline-none focus:ring-2 focus:ring-gray-400 flex items-center justify-center gap-2"
                    aria-label="Reset all filters">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    <span class="hidden sm:inline">Reset</span>
                </button>
                </div>
            </form>

        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            <!-- Animal Card Example 1 -->
            <?php 
                if( $result2 && $result2->num_rows > 0){
                    while($row1 = $result2->fetch_assoc()){  ?>

                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                        <img src="<?= $row1["image"] ?>" alt="<?= $row1["nom"] ?>" class="w-full h-48 object-cover">
                        <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2"><?= $row1["nom"] ?></h3>
                        <p class="text-gray-600 mb-4">Type : <?= $row1["type_alimentaire"] ?></p>
                        <p class="text-gray-600 mb-4">Habitat : <?= $row1["nomHab"] ?></p>
                        

                        <div class="flex gap-3 justify-center items-center">
                            <form action="delete.php" method="POST">
                                <input type="hidden" name="id_animal" value="<?= $row1["id_animal"] ?>">
                                <button class="block w-full bg-red-600 text-white font-semibold py-3 px-4 rounded-lg text-center" type="submit">DELETE</button>
                            </form>
                            <button class="block w-full bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg text-center" type="button" onclick="openUpdateModal(this)"
                                data-id-animal="<?= $row1['id_animal'] ?>"
                                data-nom="<?= $row1['nom'] ?>"
                                data-image="<?= $row1['image'] ?>"
                                data-type-alimentaire="<?= $row1['type_alimentaire'] ?>"
                                data-id-habitat="<?= $row1['id_habitat'] ?>"
                            >
                            UPDATE
                            </button>
                        </div>
                        
                    </div>
                    
                </div>
                <?php } ?>
            <?php } else{ ?>
                <?php while($row = $result->fetch_assoc()){ ?>

                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    <img src="<?= $row["image"] ?>" alt="<?= $row["nom"] ?>" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2"><?= $row["nom"] ?></h3>
                        <p class="text-gray-600 mb-4">Type : <?= $row["type_alimentaire"] ?></p>
                        <p class="text-gray-600 mb-4">Habitat : <?= $row["nomHab"] ?></p>
                        

                        <div class="flex gap-3 justify-center items-center">
                            <form action="delete.php" method="POST">
                                <input type="hidden" name="id_animal" value="<?= $row["id_animal"] ?>">
                                <button class="block w-full bg-red-600 text-white font-semibold py-3 px-4 rounded-lg text-center" type="submit">DELETE</button>
                            </form>
                            <button class="block w-full bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg text-center" type="button" onclick="openUpdateModal(this)"
                                data-id-animal="<?= $row['id_animal'] ?>"
                                data-nom="<?= $row['nom'] ?>"
                                data-image="<?= $row['image'] ?>"
                                data-type-alimentaire="<?= $row['type_alimentaire'] ?>"
                                data-id-habitat="<?= $row['id_habitat'] ?>"
                            >
                            UPDATE
                            </button>
                        </div>
                        
                    </div>
                    
                </div>
                <?php } ?>
            <?php } ?>

            
        </div>
        <!-- Statistics Section -->
        <section class="mb-8 mt-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">
                <svg class="w-6 h-6 inline-block mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Statistics by Dietary Type
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Carnivore Card -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition border-t-4 border-red-500">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Carnivore</p>
                            <h4 class="text-3xl font-bold text-gray-800 mt-1">
                                <?php echo $carnivore_count ?? 0; ?>
                            </h4>
                        </div>
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                            <span class="text-4xl">🥩</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-between text-sm mb-2">
                            <span class="text-gray-600">Percentage</span>
                            <span class="font-semibold text-red-600">
                                <?php echo number_format($carnivore_percentage, 2, ',', ' ') ?? 0; ?>%
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-red-500 h-2 rounded-full transition-all duration-500" 
                                style="width: <?php echo $carnivore_percentage ?? 0; ?>%">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Herbivore Card -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition border-t-4 border-green-500">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Herbivore</p>
                            <h4 class="text-3xl font-bold text-gray-800 mt-1">
                                <?php echo $herbivore_count ?? 0; ?>
                            </h4>
                        </div>
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-4xl">🥦</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-between text-sm mb-2">
                            <span class="text-gray-600">Percentage</span>
                            <span class="font-semibold text-green-600">
                                <?php echo number_format($herbivore_percentage, 2, ',', ' ') ?? 0; ?>%
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full transition-all duration-500" 
                                style="width: <?php echo $herbivore_percentage ?? 0; ?>%">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Omnivore Card -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition border-t-4 border-orange-500">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Omnivore</p>
                            <h4 class="text-3xl font-bold text-gray-800 mt-1">
                                <?php echo $omnivore_count ?? 0; ?>
                            </h4>
                        </div>
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center">
                            <span class="text-4xl">🥘</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-between text-sm mb-2">
                            <span class="text-gray-600">Percentage</span>
                            <span class="font-semibold text-orange-600">
                                <?php echo number_format($omnivore_percentage, 2, ',', ' ') ?? 0; ?>%
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-orange-500 h-2 rounded-full transition-all duration-500" 
                                style="width: <?php echo $omnivore_percentage ?? 0; ?>%">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Total Animals Summary -->
            <div class="mt-6 bg-gradient-to-r from-green-600 to-emerald-700 rounded-lg shadow-lg p-6 text-white">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C10.9 2 10 2.9 10 4C10 4.7 10.4 5.4 11 5.7V7C9.3 7 8 8.3 8 10V11H6V10C6 9.4 5.6 9 5 9C4.4 9 4 9.4 4 10V14C4 14.6 4.4 15 5 15C5.6 15 6 14.6 6 14V13H8V14C8 15.7 9.3 17 11 17V18.3C10.4 18.6 10 19.3 10 20C10 21.1 10.9 22 12 22C13.1 22 14 21.1 14 20C14 19.3 13.6 18.6 13 18.3V17C14.7 17 16 15.7 16 14V13H18V14C18 14.6 18.4 15 19 15C19.6 15 20 14.6 20 14V10C20 9.4 19.6 9 19 9C18.4 9 18 9.4 18 10V11H16V10C16 8.3 14.7 7 13 7V5.7C13.6 5.4 14 4.7 14 4C14 2.9 13.1 2 12 2Z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm opacity-90 font-medium">Total Animals</p>
                            <p class="text-3xl font-bold">
                                <?= $total  ?? 0; ?>
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-6 text-sm">
                        <div class="text-center">
                            <p class="opacity-90">🥩 Carnivores</p>
                            <p class="text-xl font-bold"><?php echo $carnivore_count ?? 0; ?></p>
                        </div>
                        <div class="text-center">
                            <p class="opacity-90">🥦 Herbivores</p>
                            <p class="text-xl font-bold"><?php echo $herbivore_count ?? 0; ?></p>
                        </div>
                        <div class="text-center">
                            <p class="opacity-90">🥘 Omnivores</p>
                            <p class="text-xl font-bold"><?php echo $omnivore_count ?? 0; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

   
    <!-- modal add  -->
<div id="addAnimal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white border border-default rounded-base shadow-sm p-4 md:p-6">
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <button type="button" class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="addAnimal">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form action="ajouter.php" method="POST">
                <div class="space-y-4">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Name</label>
                        <input type="text" name="name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required="">
                    </div>
                    <div>
                    <label for="type_alimentaire" class="block text-sm font-medium text-gray-700 mb-2">Type Alimentaire</label>
                    <select 
                        name="type_alimentaire"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Select type alimentaire</option>
                        <option value="carnivore">🥩 Carnivore</option>
                        <option value="herbivore">🥦 Herbivore</option>
                        <option value="omnivore">🥘 Omnivore</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Image</label>
                        <input 
                        type="text" 
                        name="image" 
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required="">
                    </div>
                    <div>
                        <label for="habitat" class="block text-sm font-medium text-gray-700 mb-2">Habitat</label>
                        <select 
                        name="habitat"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Select a habitat</option>
                        <option value="1">🪾 Savane</option>
                        <option value="2">🌳 Jungle</option>
                        <option value="3">🏜️ Désert</option>
                        <option value="4">🌊 Océan</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">
                    <button type="submit" class="inline-flex items-center  text-white bg-green-600  box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg>
                        Add new Animal
                    </button>
                    <button data-modal-hide="addAnimal" type="button" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<!-- modal update -->

    <div class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50" id="updateAnimalModal">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md max-h-[90vh] overflow-y-auto p-6 relative">

    
    <button onclick="closeUpdateModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-xl">
      ✖
    </button>

    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Update Animal</h3>
            <form action="update.php" method="POST">
                <div class="space-y-4">
                    <input type="hidden" name="animal_id" id="animal_id">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Name</label>
                        <input type="text" name="name" id="animal_nom" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required="">
                    </div>
                    <div>
                    <label for="type_alimentaire" class="block text-sm font-medium text-gray-700 mb-2">Type Alimentaire</label>
                    <select 
                        name="type_alimentaire" 
                        id="animal_type"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Select type alimentaire</option>
                        <option value="carnivore">🥩 Carnivore</option>
                        <option value="herbivore">🥦 Herbivore</option>
                        <option value="omnivore">🥘 Omnivore</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Image</label>
                        <input type="text" name="image" id="animal_image" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required="">
                    </div>
                    <div>
                        <label for="habitat" class="block text-sm font-medium text-gray-700 mb-2">Habitat</label>
                        <select 
                        name="habitat" 
                        id="animal_habitat"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Select a habitat</option>
                        <option value="1">🪾 Savane</option>
                        <option value="2">🌳 Jungle</option>
                        <option value="3">🏜️ Désert</option>
                        <option value="4">🌊 Océan</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-blue-700 transition">
                        Save changes
                    </button>
                    <button data-modal-hide="addAnimal" type="button" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cancel</button>
                </div>
            </form>
  </div>
</div>



<script>
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        
        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            const isExpanded = sidebar.classList.contains('-translate-x-full') ? 'false' : 'true';
            mobileMenuBtn.setAttribute('aria-expanded', isExpanded);
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 1024) {
                if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                    mobileMenuBtn.setAttribute('aria-expanded', 'false');
                }
            }
        });
    function openUpdateModal(button){
        document.getElementById("animal_id").value = button.dataset.idAnimal;
        document.getElementById("animal_nom").value = button.dataset.nom;
        document.getElementById("animal_image").value = button.dataset.image;
        document.getElementById("animal_type").value = button.dataset.typeAlimentaire;
        document.getElementById("animal_habitat").value = button.dataset.idHabitat;

        document.getElementById("updateAnimalModal").classList.remove("hidden");
    }

    function closeUpdateModal(){
        document.getElementById("updateAnimalModal").classList.add("hidden");
    }
    
</script>

<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>


</body>
</html>