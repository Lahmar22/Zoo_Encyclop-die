<?php

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
    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 h-full w-64 bg-white shadow-lg flex flex-col">
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
    <main class="ml-64 p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Zoo Encyclopédie</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            <!-- Animal Card Example 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=400" alt="Leo the Lion" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Leo the Lion</h3>
                    <p class="text-gray-600 mb-4">A majestic lion known for his golden mane and powerful roar. Leo is the king of the savanna.</p>
                    <div class="flex gap-3">
                        <a href="?action=edit&id=1" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition text-center">
                            Modify
                        </a>
                        <a href="?action=delete&id=1" onclick="return confirm('Are you sure you want to remove this animal?')" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition text-center">
                            Remove
                        </a>
                    </div>
                </div>
            </div>

            <!-- Animal Card Example 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <img src="https://images.unsplash.com/photo-1564349683136-77e08dba1ef7?w=400" alt="Bella the Elephant" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Bella the Elephant</h3>
                    <p class="text-gray-600 mb-4">A gentle giant with a caring heart. Bella loves playing in the water and taking care of her herd.</p>
                    <div class="flex gap-3">
                        <a href="?action=edit&id=2" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition text-center">
                            Modify
                        </a>
                        <a href="?action=delete&id=2" onclick="return confirm('Are you sure you want to remove this animal?')" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition text-center">
                            Remove
                        </a>
                    </div>
                </div>
            </div>

            <!-- Animal Card Example 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <img src="https://images.unsplash.com/photo-1437622368342-7a3d73a34c8f?w=400" alt="Max the Penguin" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Max the Penguin</h3>
                    <p class="text-gray-600 mb-4">An adorable penguin who loves to slide on ice and catch fish. Max is always cheerful.</p>
                    <div class="flex gap-3">
                        <a href="?action=edit&id=3" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition text-center">
                            Modify
                        </a>
                        <a href="?action=delete&id=3" onclick="return confirm('Are you sure you want to remove this animal?')" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition text-center">
                            Remove
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </main>

   
    <!-- modal add  -->
    <div id="addAnimal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white border border-default rounded-base shadow-sm p-4 md:p-6">
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                    Create new product
                </h3>
                <button type="button" class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="addAnimal">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form action="ajouter.php" method="POST">
                <div class="grid gap-4 grid-cols-2 py-4 md:py-6">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Name</label>
                        <input type="text" name="name" id="name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Type product name" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2.5 text-sm font-medium text-heading">Price</label>
                        <input type="number" name="price" id="price" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="$2999" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2.5 text-sm font-medium text-heading">Category</label>
                        <select id="category" class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body">
                            <option selected="">Select category</option>
                            <option value="TV">TV/Monitors</option>
                            <option value="PC">PC</option>
                            <option value="GA">Gaming/Console</option>
                            <option value="PH">Phones</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2.5 text-sm font-medium text-heading">Product Description</label>
                        <textarea id="description" rows="4" class="block bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body" placeholder="Write product description here"></textarea>                    
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
<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

</body>
</html>