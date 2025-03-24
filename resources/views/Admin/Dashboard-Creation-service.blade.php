@extends('layout.admin')

@section('title', 'Ajouter un Service')

@section('Services', 'bg-indigo-100 text-indigo-600') {{-- Ajoute la classe active au menu --}}

@section('content')
 <!-- Main Content -->
 <main class="main-content flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <a href="#" class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </a>
                    <h2 class="text-xl font-semibold text-gray-800">Création de Service</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher..." class="bg-gray-100 rounded-full py-2 px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                        <i class="fas fa-search absolute right-3 top-2.5 text-gray-500"></i>
                    </div>
                    <a href="#" class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                    </a>
                    <a href="#" class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none">
                        <i class="fas fa-cog text-xl"></i>
                    </a>
                </div>
            </header>

            <!-- Creation form content -->
            <div class="p-6 fade-in">
                <!-- Breadcrumbs -->
                <div class="flex items-center text-sm text-gray-500 mb-6">
                    <a href="#" class="hover:text-indigo-600">Tableau de bord</a>
                    <i class="fas fa-chevron-right mx-2 text-xs"></i>
                    <a href="#" class="hover:text-indigo-600">Services</a>
                    <i class="fas fa-chevron-right mx-2 text-xs"></i>
                    <span class="text-gray-700">Création</span>
                </div>

                <!-- Form Card -->
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100 mb-8">
                    
                    <div class="p-6 border-b border-gray-100">
                    <div id="secondform">
                    @if($errors->all())
                            <ul class="px-4 py-2 bg-red-100">
                                    @foreach($errors->all() as $error)
                                        <li class="my-2 text-red-500">{{ $error }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        <h3 class="text-lg font-semibold text-gray-800">Informations de Service</h3>
                        <p class="text-sm text-gray-500 mt-1">Veuillez remplir tous les champs obligatoires.</p>
                    </div>
                    
                    <form class="p-6 space-y-8" method="POST" action="/admin/create/service" enctype="multipart/form-data">
                        @csrf
                        <!-- Nom de la catégorie -->
                        <div>
                            <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-2">Nom de Service *</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                placeholder="Entrez le nom de Service">
                            <p class="mt-2 text-xs text-gray-500">Ce nom sera affiché sur votre site web.</p>
                        </div>
                        
                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description de Service</label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                placeholder="Entrez une description détaillée de Service"></textarea>
                            <p class="mt-2 text-xs text-gray-500">Décrivez cette catégorie pour aider vos clients à comprendre ce qu'elle contient.</p>
                        </div>
                        <div>
    <label for="Prix" class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
    <div class="relative">
        <input type="number" id="Prix" name="prix" step="0.01"
            class="w-full px-4 py-3 pl-10 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
            placeholder="Entrez le prix">
        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">€</span>
    </div>
    <p class="mt-2 text-xs text-gray-500">Indiquez le prix en euros (€).</p>
</div>
<div>
    <label for="categorie" class="block text-sm font-medium text-gray-700 mb-2">Categorie</label>
    <select id="categorie" name="categorie"
        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
        @foreach($categories as $value)
        <option value="{{$value->Nom}}">{{$value->Nom}}</option>
        @endforeach
    </select>
    <p class="mt-2 text-xs text-gray-500">Sélectionnez categorie du produit.</p>
</div>
                        <!-- Photo upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Photo de Service</label>
                            <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl bg-gray-50 hover:bg-gray-100 transition-colors">
                                <div class="space-y-2 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    </svg>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <input id="file-upload" name="image" type="file">
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 5MB</p>
                                </div>
                            </div>
                        </div>
                        <div>
    <label for="statut" class="block text-sm font-medium text-gray-700 mb-2">Statut du produit</label>
    <select id="statut" name="statut"
        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
        <option value="Actif">Actif</option>
        <option value="Inactif">Inactif</option>
        <option value="Brouillon">Brouillon</option>
    </select>
    <p class="mt-2 text-xs text-gray-500">Sélectionnez le statut du produit.</p>
</div>
                        
                        <!-- SEO Section -->
                        <div class="border-t border-gray-100 pt-6">
                            <h4 class="text-md font-semibold text-gray-800 mb-4">Paramètres SEO (optionnel)</h4>
                            
                            <div class="space-y-6">
                                <div>
                                    <label for="metaTitle" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                                    <input type="text" id="metaTitle" name="metaTitle" 
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                        placeholder="Meta title pour SEO">
                                </div>
                                
                                <div>
                                    <label for="metaDescription" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                                    <textarea id="metaDescription" name="metaDescription" rows="2"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                        placeholder="Meta description pour SEO"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action buttons -->
                        <div class="flex items-center justify-end space-x-4 border-t border-gray-100 pt-6">
                            <a href="#" class="px-6 py-3 border border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                Annuler
                            </a>
                            <button type="submit" class="px-6 py-3 border border-transparent rounded-xl shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                                Créer le Service
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
@endsection