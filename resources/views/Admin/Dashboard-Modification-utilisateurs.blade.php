@extends('layout.admin')

@section('title', 'Modifier un Utilisateur')

@section('Utilisateurs', 'bg-indigo-100 text-indigo-600') 

@section('content')
<!-- Main Content -->
<main class="main-content flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
    <!-- Top header -->
    <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
        <div class="flex items-center">
            <a href="#" class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-800">Modification d'Utilisateur</h2>
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

    <!-- Modification form content -->
    <div class="p-6 fade-in">
        <!-- Breadcrumbs -->
        <div class="flex items-center text-sm text-gray-500 mb-6">
            <a href="#" class="hover:text-indigo-600">Tableau de bord</a>
            <i class="fas fa-chevron-right mx-2 text-xs"></i>
            <a href="#" class="hover:text-indigo-600">Utilisateurs</a>
            <i class="fas fa-chevron-right mx-2 text-xs"></i>
            <span class="text-gray-700">Modification</span>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100 mb-8">
            <div class="p-6 border-b border-gray-100">
                <div id="secondform">
                    <h3 class="text-lg font-semibold text-gray-800">Informations d'Utilisateur</h3>
                    <p class="text-sm text-gray-500 mt-1">Veuillez modifier les informations de l'utilisateur.</p>
                </div>

                <form class="p-6 space-y-8" method="POST" action="/admin/update/user/{{$user->id}}" enctype="multipart/form-data" autocomplete="off">
                    @csrf 
                    @method('PUT')

                    <!-- Nom et prénom -->
                     <input type="hidden" name="Role" value = "{{$user->Role->nom}}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700 mb-2">Nom *</label>
                            <input value="{{$user->Nom}}" type="text" id="lastName" name="lastName" required 
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                placeholder="Nom de famille">
                        </div>
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-2">Prénom *</label>
                            <input value="{{$user->Prenom}}" type="text" id="firstName" name="firstName" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                placeholder="Prénom">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input value="{{$user->Email}}" type="email" id="email" name="email" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                            placeholder="email@                            exemple.com">
                        <p class="mt-2 text-xs text-gray-500">L'adresse email sera utilisée comme identifiant de connexion.</p>
                    </div>

                    <!-- Téléphone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                        @if($user->Role->nom == 'prestataire')
                            <input value="{{$user->Professional->Numero_Telephone}}" type="tel" id="phone" name="phone"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                placeholder="+33 X XX XX XX XX">
                        @elseif($user->Role->nom == 'client')
                            <input value="{{$user->Client->telephone}}" type="tel" id="phone" name="phone"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                placeholder="+33 X XX XX XX XX">
                        @endif
                    </div>

                   
                    <!-- Photo upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Photo de profil</label>
                        <div class="mb-3">
                            <p class="text-sm text-gray-500 mb-2">Image actuelle:</p>
                            <div class="w-32 h-32 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                                <img src = "/storage/{{$user->Photo}}">
                            </div>
                        </div>
                        <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl bg-gray-50 hover:bg-gray-100 transition-colors">
                            <div class="space-y-2 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" 
                                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <input id="file-upload" name="image" type="file">
                                    </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 5MB</p>
                                <p class="text-xs text-gray-500">Laissez vide pour conserver l'image actuelle</p>
                            </div>
                        </div>
                    </div>

                    <!-- Mot de passe (optionnel pour la modification) -->
                    <div class="border-t border-gray-100 pt-6">
                        <h4 class="text-md font-semibold text-gray-800 mb-4">Modifier le mot de passe (optionnel)</h4>
                        <div class="space-y-6">
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Nouveau mot de passe</label>
                                <input type="password" id="password" name="password"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                    placeholder="Laissez vide pour conserver le mot de passe actuel">
                                <p class="mt-2 text-xs text-gray-500">8 caractères minimum avec au moins une majuscule et un chiffre.</p>
                            </div>
                            <div>
                                <label for="passwordConfirm" class="block text-sm font-medium text-gray-700 mb-2">Confirmer le mot de passe</label>
                                <input type="password" id="passwordConfirm" name="passwordConfirm"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                    placeholder="Confirmez le nouveau mot de passe">
                            </div>
                        </div>
                    </div>

                    <!-- Statut du compte -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Statut du compte</label>
                        <select id="status" name="status" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                            <option value="actif">Actif</option>
                            <option value="inactif">Inactif</option>
                            <option value="suspendu">Suspendu</option>
                            <option value = "banni">banni</option>
                        </select>
                        <p class="mt-2 text-xs text-gray-500">Un compte inactif ne pourra pas se connecter.</p>
                    </div>

                    <!-- Adresses -->
                    <div class="border-t border-gray-100 pt-6">
                        <div class="space-y-6">
    
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @if($user->Role->nom == 'prestataire')
                            <div class="md:col-span-1">
                                    <label for="Adresse" class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                                    <input value = "{{$user->Professional->Adresse}}" type="text" id="Adresse" name="Adresse" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" placeholder="Code postal">
                                </div>
                                <div class="md:col-span-1">
                                    <label for="city" class="block text-sm font-medium text-gray-700 mb-2">Ville</label>
                                    <input value = "{{$user->Professional->Ville}}" type="text" id="city" name="city"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                        placeholder="Ville">
                                </div>
                                <div class="md:col-span-1">
                                    <label for="postalCode" class="block text-sm font-medium text-gray-700 mb-2">Code postal</label>
                                    <input value = "{{$user->Professional->zip_code}}" type="text" id="postalCode" name="postalCode" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" placeholder="Code postal">
                                </div>
                                @elseif($user->Role->nom == 'client')
                                <div class="md:col-span-1">
                                    <label for="pays" class="block text-sm font-medium text-gray-700 mb-2">pays</label>
                                    <input value = "{{$user->client->pays}}" type="text" id="pays" name="pays" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" placeholder="Code postal">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Notes internes -->
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes internes</label>
                        <textarea id="notes" name="notes" rows="3"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                            placeholder="Notes visibles uniquement par l'administration"></textarea>
                        <p class="mt-2 text-xs text-gray-500">Ces notes ne sont pas visibles par l'utilisateur.</p>
                    </div>

                    <!-- Action buttons -->
                    <div class="flex items-center justify-end space-x-4 border-t border-gray-100 pt-6">
                        <a href="#" class="px-6 py-3 border border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                            Annuler
                        </a>
                        <button type="submit" class="px-6 py-3 border border-transparent rounded-xl shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                            Mettre à jour l'utilisateur
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
