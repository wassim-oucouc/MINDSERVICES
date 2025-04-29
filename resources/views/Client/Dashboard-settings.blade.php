    @extends('layout.client')

    @section('title', 'Modifier mon Profil')

    @section('mon-profil', 'flex items-center px-3 py-2 text-sm font-medium rounded-md bg-blue-50 text-blue-600')

    @section('content')
    <!-- CONTENU PRINCIPAL -->
    <div class="flex-1 overflow-auto pt-16 md:pt-0 md:ml-0">
        <!-- En-tête avec dégradé comme dans les autres pages -->
        <div class="bg-gradient-to-r from-blue-700 to-teal-500 py-8 relative overflow-hidden">
            <div class="absolute inset-0 bg-pattern opacity-10"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-extrabold text-white tracking-tight">Modifier mon Profil</h1>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="/client/profile" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-blue-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i> Retour au profil
                        </a>
                    </div>
                </div>
            </div>
            <!-- Vague décorative en bas -->
            <div class="absolute bottom-0 left-0 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-8 text-gray-50 fill-current">
                    <path d="M0,96L48,85.3C96,75,192,53,288,48C384,43,480,53,576,69.3C672,85,768,107,864,101.3C960,96,1056,64,1152,48C1248,32,1344,32,1392,32L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
                </svg>
            </div>
        </div>

        <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 -mt-6 relative z-10">
            <div id="banner" class="red_banner">
                <ul class="ul_errors mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <form id="form" action="/client/settings" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Colonne de gauche: Informations principales -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Informations personnelles -->
                        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 mb-6">Informations personnelles</h2>
                                <div class="flex flex-col md:flex-row md:items-start">
                                    <div class="flex-shrink-0 h-32 w-32 rounded-full bg-gradient-to-br from-blue-100 to-teal-100 flex items-center justify-center shadow overflow-hidden mb-4 md:mb-0 md:mr-6 relative">
                                        <img id = "profile_image" src="/storage/{{$client->Photo}}" alt="Photo de profil" class="h-full w-full object-cover">
                                        <label for="photo" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity cursor-pointer">
                                            <i class="fas fa-camera text-white text-xl"></i>
                                            <input type="file" id="image_user" name="photo" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="prenom" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Prénom</label>
                                            <input type="text" id="prenom" name="prenom" value="{{$client->Prenom}}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg p-2">
                                        </div>
                                        <div>
                                            <label for="nom" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Nom</label>
                                            <input type="text" id="nom" name="nom" value="{{$client->Nom}}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg p-2">
                                        </div>
                                        <div>
                                            <label for="telephone" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Numéro Téléphone</label>
                                            <input type="tel" id="telephone" name="telephone" value="{{$client->telephone}}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg p-2">
                                        </div>
                                        <div>
                                            <label for="pays" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Pays</label>
                                            <select id="pays" name="pays" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                <option value="France" @if($client->pays == 'France') selected @endif>France</option>
                                                <option value="Belgique" @if($client->pays == 'Belgique') selected @endif>Belgique</option>
                                                <option value="Suisse" @if($client->pays == 'Suisse') selected @endif>Suisse</option>
                                                <option value="Canada" @if($client->pays == 'Canada') selected @endif>Canada</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-8 pt-6 border-t border-gray-200">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <div class="flex items-center mt-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 mb-6">Changer adresse email</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Email</label>
                                        <input type="email" id="email" name="email" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg p-2">
                                        <p class="mt-2 text-sm text-gray-500">Laissez ce champ vide si vous ne souhaitez pas changer votre Email.</p>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>

                        <!-- Mot de passe -->
                        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 mb-6">Changer le mot de passe</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="current-password" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Mot de passe actuel</label>
                                        <input type="password" id="current-password" name="current_password" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg p-2">
                                    </div>
                                    <div></div>
                                    <div>
                                        <label for="password" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Nouveau mot de passe</label>
                                        <input type="password" id="password" name="password" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg p-2">
                                    </div>
                                    <div>
                                        <label for="password-confirm" class="block text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Confirmer le mot de passe</label>
                                        <input type="password" id="password-confirm" name="password_confirm" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg p-2">
                                    </div>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Laissez ces champs vides si vous ne souhaitez pas changer votre mot de passe.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Colonne de droite: Options supplémentaires -->
                    <div class="lg:col-span-1 space-y-8">
                        <!-- Boutons d'action -->
                        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold text-gray-900 mb-6">Actions</h2>
                                <div class="space-y-4">
                                    <button id="submit" type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                        <i class="fas fa-save mr-2"></i> Enregistrer les modifications
                                    </button>
                                    <a href="/client/profile" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                        <i class="fas fa-times mr-2"></i> Annuler
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Support client -->
                        <div class="bg-gradient-to-r from-blue-50 to-teal-50 shadow-lg rounded-xl overflow-hidden border border-blue-100">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-blue-100 to-teal-100 flex items-center justify-center">
                                        <i class="fas fa-headset text-blue-600"></i>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-lg font-medium text-gray-900">Besoin d'aide ?</h3>
                                        <p class="text-sm text-gray-600 mt-1">Notre équipe est disponible 7j/7</p>
                                    </div>
                                </div>
                                <div class="mt-4 space-y-3">
                                    <a href="/help" class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-700 hover:to-teal-600 transition-colors duration-200">
                                        <i class="fas fa-comments mr-2"></i> Contacter le support
                                    </a>
                                    <a href="/faq" class="inline-flex items-center justify-center w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                                        <i class="fas fa-question-circle mr-2"></i> FAQ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <script src="/js/profile-client-settings.js"></script>

    <script>
  let inputimage = document.querySelector('#image_user');
        let profileimage = document.querySelector('#profile_image');

        console.log(inputimage)


        inputimage.addEventListener("change",function(){
            let url = URL.createObjectURL(inputimage.files[0]);
            profileimage.src = url
            console.log(url);
        });
        </script>
    @endsection