@extends('layout.admin')

@section('Categories', 'flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600')

@section('title', 'Modifier Catégorie')
@section('content')

<!-- Main Content -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
    <!-- Top header -->
    <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
        <div class="flex items-center">
            <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <h2 class="text-xl font-semibold text-gray-800">Modifier la catégorie</h2>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Rechercher..." class="bg-gray-100 rounded-full py-2 px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                <i class="fas fa-search absolute right-3 top-2.5 text-gray-500"></i>
            </div>
            <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none relative">
                <i class="fas fa-bell text-xl"></i>
                <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
            </button>
            <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none">
                <i class="fas fa-cog text-xl"></i>
            </button>
        </div>
    </header>

    <!-- Breadcrumbs -->
    <div class="px-6 py-2 bg-white border-b">
        <div class="flex items-center text-sm text-gray-600">
            <a href="" class="hover:text-indigo-600">Dashboard</a>
            <span class="mx-2">/</span>
            <a href="" class="hover:text-indigo-600">Catégories</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">Modifier</span>
        </div>
    </div>

    <!-- Edit Category Form -->
    <div class="p-6">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 p-6 mb-8">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <!-- Left column - Category Details -->
                    <div class="md:col-span-2 space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Informations de la catégorie</h3>
                            
                            <div class="space-y-4">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom de la catégorie <span class="text-red-600">*</span></label>
                                    <input type="text" id="name" name="name" value="{{$categories->Nom}}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <p class="mt-1 text-sm text-gray-500">Le nom de la catégorie tel qu'il apparaîtra sur le site.</p>
</div>       
                                <!-- Description -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea value = "{{$categories->Description}}" id="description" name="description" rows="4" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">Produits électroniques, gadgets et accessoires technologiques.</textarea>
                                    <p class="mt-1 text-sm text-gray-500">Une brève description de la catégorie (facultatif).</p>
                                </div>
                                
                            </div>
                        </div>
                        
                        <!-- SEO Section -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Paramètres SEO</h3>
                            
                            <div class="space-y-4">
                                <!-- Meta Title -->
                                <div>
                                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-1">Titre Meta</label>
                                    <input type="text" id="meta_title" name="meta_title" value="" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <p class="mt-1 text-sm text-gray-500">Le titre qui apparaîtra dans les résultats de recherche.</p>
                                </div>
                                
                                <!-- Meta Description -->
                                <div>
                                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1">Description Meta</label>
                                    <textarea value = "" id="meta_description" name="meta_description" rows="2" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">Découvrez notre gamme de produits électroniques de haute qualité à des prix compétitifs.</textarea>
                                    <p class="mt-1 text-sm text-gray-500">La description qui apparaîtra dans les résultats de recherche.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right column - Image & Status -->
                    <div class="space-y-6">
                        <!-- Image Upload -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Image</h3>
                            
        
                                    <input  id="image" name="image" type="file" >
                                                  
                        </div>
                        
                        <!-- Status & Visibility -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Statut & Visibilité</h3>
                            
                            <div class="space-y-4">
                                <!-- Status -->
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                                    <select id="status" name="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="active" selected>Actif</option>
                                        <option value="inactive">Inactif</option>
                                    </select>
                                </div>
                                
                                <!-- Featured -->
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="featured" name="featured" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="featured" class="font-medium text-gray-700">Catégorie en vedette</label>
                                        <p class="text-gray-500">Afficher cette catégorie dans les sections en vedette du site.</p>
                                    </div>
                                </div>
                                
                                <!-- Show in menu -->
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="show_in_menu" name="show_in_menu" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="show_in_menu" class="font-medium text-gray-700">Afficher dans le menu</label>
                                        <p class="text-gray-500">Afficher cette catégorie dans la navigation principale.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      
                <!-- Action Buttons -->
                <div class="border-t pt-6 flex justify-end space-x-3">
                    <a href="" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Annuler
                    </a>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
            
            <!-- Delete Form -->
            <form id="delete-form" action="" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</main>

<script>
    // Toggle sidebar
    document.querySelector('.fa-bars').addEventListener('click', function() {
        const sidebar = document.querySelector('aside');
        sidebar.classList.toggle('hidden');
    });
    
</script>
@endsection