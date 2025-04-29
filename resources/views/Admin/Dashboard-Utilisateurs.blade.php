@extends('layout.admin')

@section('Utilisateurs', 'flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600')

@section('title', 'Utilisateurs')
@section('content')

<!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">Gestion des Utilisateurs</h2>
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

            <!-- Users content -->
            <!-- Dashboard content -->
            <div class="p-6">
                <!-- Stats cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Utilisateurs</p>
                                <h3 class="text-2xl font-bold">{{$statisticusers['totalusers']}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-indigo-600 to-indigo-500 flex items-center justify-center">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Prestataires Actifs</p>
                                <h3 class="text-2xl font-bold">{{$statisticusers['totalprestataire']}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center">
                                <i class="fas fa-briefcase text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Clients Actifs</p>
                                <h3 class="text-2xl font-bold">{{$statisticusers['totalclients']}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="fas fa-user-friends text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-lg transition-all">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Utilisateurs Banni</p>
                                <h3 class="text-2xl font-bold">{{$statisticusers['totalusersbanni']}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-red-500 flex items-center justify-center">
                            <i class="fas fa-user-slash text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif


                <!-- Action buttons -->
                <div class="flex flex-wrap items-center justify-between mb-6">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <a href="/admin/create/user">
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-indigo-700 transition-colors">
                            <i class="fas fa-plus"></i>
                            <span>Ajouter Utilisateur</span>
                        </button>
                        </a>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors">
                            <i class="fas fa-filter"></i>
                            <span>Filtres</span>
                        </button>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors">
                            <i class="fas fa-download"></i>
                            <span>Exporter</span>
                        </button>
                    </div>
                    <div class="flex space-x-4">
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Tous les utilisateurs</option>
                            <option>Utilisateurs actifs</option>
                            <option>Utilisateurs inactifs</option>
                            <option>Nouveaux utilisateurs</option>
                            <option>Utilisateurs bannis</option>
                        </select>
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option>Trier par: Date d'inscription</option>
                            <option>Trier par: Nom A-Z</option>
                            <option>Trier par: Nom Z-A</option>
                            <option>Trier par: Activité récente</option>
                        </select>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500">
                                            <span>Utilisateur</span>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôle</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date d'inscription</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Ligne 1 -->
                                 @foreach($users as $user)
                                <tr class="table-row hover:bg-indigo-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500 mr-3">
                                            <div class="h-10 w-10 flex-shrink-0 rounded-full overflow-hidden">
                                                <img class="h-10 w-10 object-cover" src="/storage/{{$user->Photo ?? 'default-avatar.jpg'}}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{$user->Prenom}} {{$user->Nom}}</div>
                                                <div class="text-sm text-gray-500">ID: {{$user->id}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$user->Email}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($user->Role->nom == "admin")
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Administrateur</span>
                                        @elseif($user->Role->nom == "prestataire")
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Prestataire</span>
                                        @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Client</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{$user->created_at}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($user->Status == "Active")
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                        @elseif($user->Status == "Inactif")
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactif</span>
                                        @elseif($user->Status == "Suspendu")
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Suspendu</span>
                                        @elseif($user->Status == "Banni")
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Banni</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>

                                        </button>
                                        <div>
                                        <button onclick = "EditUser({{$user->id}},'{{$user->Prenom}}','{{$user->Nom}}','{{$user->Email}}',{{$user->Role->id}},'{{$user->Client->telephone ?? 0}}','{{$user->Professional->Numero_Telephone ?? 0}}','{{$user->Photo}}','{{$user->Professional->Adresse ?? ''}}','{{$user->Professional->Ville ?? 'c'}}','{{$user->Professional->zip_code ?? 0}}','{{$user->Client->pays ?? ''}}')" class="text-indigo-600 hover:text-indigo-900 mx-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
</svg>
                                        </button>
</div>
                                        <form action="/admin/delete/user/{{$user->id}}" method = "POST">
                                            @csrf 
                                            @method('DELETE')
                                        <button class="text-red-600 hover:text-red-900 mx-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /> </svg>
                                        </button>
                                        </form>
                                        <form action="/admin/ban/user/{{$user->id}}" method = "POST">
                                        @csrf 
                                        @method('PUT')
                                        <button class="text-orange-600 hover:text-orange-900 mx-1" title="Bannir">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
</svg>
                                         </button>
                                         </form>
                                         <form action="/admin/uban/user/{{$user->id}}" method = "POST">
                                        @csrf
                                        @method('PUT')
                                         <button  class="text-green-600 hover:text-green-900 mx-1" title="Débannir ce produit">
                                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
</svg>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-8">
                    <div class="text-sm text-gray-600">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal de modification d'utilisateur -->
<div id="editUserModal" class=" hidden fixed inset-0 z-50  overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Overlay -->
        <div class="fixed inset-0 transition-opacity" >
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal content -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                    <h3 class="text-lg font-semibold text-gray-800">Modifier l'utilisateur</h3>
                    <button type="button" class="text-gray-400 hover:text-gray-500" onclick="closeEditModal()">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                @if($errors->any())
  <div class=" mx-auto my-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md">
    <ul class="list_errors list-disc pl-5">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
@if(session('email'))
  <div class=" mx-auto my-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md">
    <ul class="list_errors list-disc pl-5">
        <li>{{ session('email') }}</li>
    </ul>
  </div>
@endif


                
                <form id="editUserForm" class="mt-4 space-y-6" method="POST" action="/admin/utilisateurs" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <!-- Hidden fields for CSRF and method -->
                    <input type="hidden" name="id_edit" id="edit_user_id">
                    <input type="hidden" name="role_id" id="edit_role">

                    <!-- Nom et prénom -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="edit_lastName" class="block text-sm font-medium text-gray-700 mb-1">Nom *</label>
                            <input type="text" id="edit_lastName" name="lastName" required 
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                placeholder="Nom de famille">
                        </div>
                        <div>
                            <label for="edit_firstName" class="block text-sm font-medium text-gray-700 mb-1">Prénom *</label>
                            <input type="text" id="edit_firstName" name="firstName" required
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                placeholder="Prénom">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="edit_email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                        <input type="email" id="edit_email" name="email" required
                            class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                            placeholder="email@exemple.com">
                        <p class="mt-1 text-xs text-gray-500">L'adresse email sera utilisée comme identifiant de connexion.</p>
                    </div>

                    <!-- Téléphone -->
                    <div>
                        <label for="edit_phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                        <input type="tel" id="edit_phone" name="phone"
                            class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                            placeholder="+33 X XX XX XX XX">
                    </div>

                    
                    <!-- Photo de profil -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Photo de profil</label>
                        <div class="mb-2 flex items-center">
                            <div id="current_photo_container" class="w-16 h-16 rounded-full overflow-hidden bg-gray-200 mr-4">
                                <img id="current_photo" src="" alt="Photo de profil" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <input id="edit_image" name="image" type="file" class="text-sm">
                                <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF jusqu'à 5MB. Laissez vide pour conserver l'image actuelle.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Mot de passe (optionnel) -->
                    <div class="border-t border-gray-100 pt-4">
                        <h4 class="text-sm font-semibold text-gray-800 mb-3">Modifier le mot de passe (optionnel)</h4>
                        <div class="space-y-4">
                            <div>
                                <label for="edit_password" class="block text-sm font-medium text-gray-700 mb-1">Nouveau mot de passe</label>
                                <input type="password" id="edit_password" name="password"
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                    placeholder="Laissez vide pour conserver le mot de passe actuel">
                                <p class="mt-1 text-xs text-gray-500">8 caractères minimum avec au moins une majuscule et un chiffre.</p>
                            </div>
                            <div>
                                <label for="edit_passwordConfirm" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                                <input type="password" id="edit_passwordConfirm" name="passwordConfirm"
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                    placeholder="Confirmez le nouveau mot de passe">
                            </div>
                        </div>
                    </div>

                     <!-- Statut du compte -->
                    <div>
                        <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-1">Statut du compte</label>
                        <select id="edit_status" name="status" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                            <option value="Active">Actif</option>
                            <option value="Inactif">Inactif</option>
                            <option value="Suspendu">Suspendu</option>
                            <option value="Banni">Banni</option>
                        </select>
                        <p class="mt-1 text-xs text-gray-500">Un compte inactif ne pourra pas se connecter.</p>
                    </div>

                    <!-- Adresses -->
                    <div id = "Adresses" class="border-t border-gray-100 pt-4">
                        <h4 class="text-sm font-semibold text-gray-800 mb-3">Informations d'adresse</h4>
                        <div id="addressFieldsContainer" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Ces champs changent selon le rôle (client ou prestataire) -->
                            <div class="address-field prestataire-field">
                                <label for="edit_adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                                <input type="text" id="edit_adresse" name="Adresse" 
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                    placeholder="Adresse">
                            </div>
                            <div class="address-field prestataire-field">
                                <label for="edit_city" class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                                <input type="text" id="edit_city" name="city"
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                    placeholder="Ville">
                            </div>
                            <div class="address-field prestataire-field">
                                <label for="edit_postalCode" class="block text-sm font-medium text-gray-700 mb-1">Code postal</label>
                                <input type="text" id="edit_postalCode" name="postalCode" 
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                    placeholder="Code postal">
                            </div>
                            <div class="address-field client-field">
                                <label for="edit_pays" class="block text-sm font-medium text-gray-700 mb-1">Pays</label>
                                <input type="text" id="edit_pays" name="pays" 
                                    class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                    placeholder="Pays">
                            </div>
                        </div>
                    </div>

                    <!-- Notes internes -->
                    <div>
                        <label for="edit_notes" class="block text-sm font-medium text-gray-700 mb-1">Notes internes</label>
                        <textarea id="edit_notes" name="notes" rows="2"
                            class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                            placeholder="Notes visibles uniquement par l'administration"></textarea>
                        <p class="mt-1 text-xs text-gray-500">Ces notes ne sont pas visibles par l'utilisateur.</p>
                    </div>

                    <!-- Action buttons -->
                    <div class="flex items-center justify-end space-x-3 border-t border-gray-100 pt-4">
                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                            Annuler
                        </button>
                        <button type="submit" class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
let Array_data = [];
        let edit_lastName = document.querySelector('#edit_lastName');
        let edit_firstName = document.querySelector('#edit_firstName');
        let edit_email = document.querySelector('#edit_email');
        let edit_phone = document.querySelector('#edit_phone');
        let edit_image = document.querySelector('#current_photo');
        let edit_adresse = document.querySelector('#edit_adresse');
        let edit_city = document.querySelector('#edit_city');
        let edit_postalCode = document.querySelector('#edit_postalCode');
        let edit_pays = document.querySelector('#edit_pays');

        let edit_role = document.querySelector('#edit_role');

        let input_id = document.querySelector('#edit_user_id');

        let AdressesParent = document.querySelector('#Adresses');

        let modaledit = document.querySelector('#editUserModal');

        let divaddress = document.querySelector('#Adresses');

        let diverrors = document.querySelector('.list_errors');

        document.querySelector('.fa-bars').addEventListener('click', function() {
            const sidebar = document.querySelector('aside');
            sidebar.classList.toggle('hidden');
        });

        if(diverrors)
        {
            modaledit.classList.remove('hidden');

            let data = JSON.parse(localStorage.getItem('Professional'));

            if(data.Role_id == 1)
        {
            edit_adresse.value = data.Adresse;
            edit_city.value = data.Ville;
        edit_lastName.value = data.Nom;
        edit_firstName.value = data.Prenom;
        edit_email.value = data.Email;
        edit_phone.value = data.Telephone;
        edit_image.src = '/storage/' + data.Photo;
        edit_postalCode.value = data.Zip_code;
        edit_role.value = data.Role_id;
        input_id.value = data.id;

        }
        }




            function EditUser(id,Prenom,Nom,Email,Role_id,telephone_client,telephone_professional,Photo,Adresse_professional,ville_professional,zip_code_professional,pays_client)
            {
            console.log(edit_pays)
                edit_role.value = Role_id;
                input_id.value = id;
                if(Role_id == 2)
            {
                 
                AdressesParent.innerHTML = `<div class="address-field client-field">
                                    <label for="edit_pays" class="block text-sm font-medium text-gray-700 mb-1">Pays</label>
                                    <input type="text" id="edit_pays" name="pays" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" placeholder="Pays">
                                </div>`;
                                let edit_pays = document.querySelector('#edit_pays');

                    edit_pays.value = pays_client;
                edit_lastName.value = Nom;
                edit_firstName.value = Prenom;
                edit_email.value = Email;
                edit_phone.value = telephone_client;
                edit_image.src = '/storage/' + Photo;


                
                

            

            }
            else if(Role_id == 1)
            {
                console.log(edit_adresse)
                let ProfessionalObject = {
                    id : id,
                    Prenom : Prenom,
                    Nom : Nom,
                    Email : Email,
                    Telephone : telephone_professional,
                    Role_id : Role_id,
                    Photo : Photo,
                    Adresse : Adresse_professional,
                    Ville : ville_professional,
                    Zip_code : zip_code_professional
                }

             

            let ProfessionalStriginfy = JSON.stringify(ProfessionalObject);

            Array_data.push(ProfessionalStriginfy)

                localStorage.setItem('Professional',Array_data);


                divaddress.innerHTML = `<div id="Adresses" class="border-t border-gray-100 pt-4">
                            <h4 class="text-sm font-semibold text-gray-800 mb-3">Informations d'adresse</h4>
                            <div id="addressFieldsContainer" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Ces champs changent selon le rôle (client ou prestataire) -->
                                <div class="address-field prestataire-field">
                                    <label for="edit_adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                                    <input type="text" id="edit_adresse" name="Adresse" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" placeholder="Adresse">
                                </div>
                                <div class="address-field prestataire-field">
                                    <label for="edit_city" class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                                    <input type="text" id="edit_city" name="city" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" placeholder="Ville">
                                </div>
                                <div class="address-field prestataire-field">
                                    <label for="edit_postalCode" class="block text-sm font-medium text-gray-700 mb-1">Code postal</label>
                                    <input type="text" id="edit_postalCode" name="postalCode" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" placeholder="Code postal">
                                </div>
                            </div>
                        </div>`;


                      
    setTimeout(() => {
        document.getElementById("edit_adresse").value = Adresse_professional;
        document.getElementById("edit_city").value = ville_professional;
        document.getElementById("edit_postalCode").value = zip_code_professional;

        edit_lastName.value = Nom;
        edit_firstName.value = Prenom;
        edit_email.value = Email;
        edit_phone.value = telephone_professional;
        edit_image.src = '/storage/' + Photo;
    }, 0);
            


            }
            modaledit.classList.remove('hidden');
        }


        function closeEditModal()
        {
            modaledit.classList.add('hidden');
        }
        
    </script>
@endsection