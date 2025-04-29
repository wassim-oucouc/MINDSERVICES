@extends('layout.app')

@section('title', 'Register Client')
@section('content')

    <!-- Registration Section -->
    <section class="py-10 slide-in">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden hover-card">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-2/5 hero-bg p-8 flex items-center justify-center">
                        <div class="bg-black bg-opacity-40 p-8 rounded-xl backdrop-blur-sm scale-in delay-100" style="backdrop-filter: blur(10px);">
                            <h2 class="text-3xl font-bold mb-6 text-white">Rejoignez notre communauté de clients</h2>
                            <div class="space-y-5">
                                <div class="flex items-start fade-in delay-200">
                                    <div class="flex-shrink-0 mt-1">
                                        <i class="fas fa-check-circle text-green-400 mr-3 text-xl"></i>
                                    </div>
                                    <p class="text-white text-lg">Trouvez les meilleurs professionnels qualifiés</p>
                                </div>
                                <div class="flex items-start fade-in delay-300">
                                    <div class="flex-shrink-0 mt-1">
                                        <i class="fas fa-check-circle text-green-400 mr-3 text-xl"></i>
                                    </div>
                                    <p class="text-white text-lg">Réservez facilement vos rendez-vous en ligne</p>
                                </div>
                                <div class="flex items-start fade-in delay-400">
                                    <div class="flex-shrink-0 mt-1">
                                        <i class="fas fa-check-circle text-green-400 mr-3 text-xl"></i>
                                    </div>
                                    <p class="text-white text-lg">Paiements sécurisés et garantie satisfaction</p>
                                </div>
                                <div class="flex items-start fade-in delay-500">
                                    <div class="flex-shrink-0 mt-1">
                                        <i class="fas fa-check-circle text-green-400 mr-3 text-xl"></i>
                                    </div>
                                    <p class="text-white text-lg">Service client disponible 7j/7</p>
                                </div>
                            </div>
                            <div class="mt-8 text-center fade-in delay-500">
                                <p class="text-white opacity-90 mb-4">Rejoignez plus de 10 000 clients satisfaits</p>
                                <div class="flex justify-center space-x-2">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <i class="fas fa-star-half-alt text-yellow-400"></i>
                                    <span class="text-white ml-1">4.9/5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-3/5 p-10">
                        <h2 class="text-3xl font-bold mb-2 text-gray-800">Inscription Client</h2>
                        <p class="text-gray-600 mb-8">Commencez à trouver les meilleurs professionnels dès aujourd'hui</p>
                        <form id="clientForm" method="POST" action="/client/register" enctype="multipart/form-data">
                            @csrf
                            <ul class = "">
        @if($errors->all())
        @foreach($errors->all() as $error)
        <li class = "my-2 text-red-500">
        {{$error}}
        </li>
        @endforeach
    @endif
    </ul>
                            <div class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="relative input-group">
                                        <input id="prenom" name="Prenom" class="w-full px-4 py-3.5 rounded-lg input-field focus:outline-none font-medium transition-all" 
                                            type="text" placeholder=" " required>
                                        <label class="floating-label" for="prenom">Prénom</label>
                                        <span id="prenom-error" class="text-red-500 text-xs"></span>
                                    </div>
                                    <div class="relative input-group">
                                        <input id="nom" name="Nom" class="w-full px-4 py-3.5 rounded-lg input-field focus:outline-none font-medium transition-all" 
                                            type="text" placeholder=" " required>
                                        <label class="floating-label" for="nom">Nom</label>
                                        <span id="nom-error" class="text-red-500 text-xs"></span>
                                    </div>
                                </div>
                                <div class="relative input-group">
                                    <input name="Email" class="w-full px-4 py-3.5 rounded-lg input-field focus:outline-none font-medium transition-all" 
                                        type="email" id="email" placeholder=" " required>
                                    <label class="floating-label" for="email">Email</label>
                                    <span id="email-error" class="text-red-500 text-xs"></span>
                                </div>
                                <div class="relative input-group">
                                    <input name="Password" class="w-full px-4 py-3.5 rounded-lg input-field focus:outline-none font-medium transition-all" 
                                        type="password" id="password" placeholder=" " required>
                                    <label class="floating-label" for="password">Mot de passe</label>
                                    <span id="password-error" class="text-red-500 text-xs"></span>
                                    <div class="text-xs text-gray-500 mt-1 ml-1">Au moins 8 caractères, incluant chiffres et lettres</div>
                                </div>
                                <div class="relative input-group">
                                    <input value="+" name="NumeroTele" class="w-full px-4 py-3.5 rounded-lg input-field focus:outline-none font-medium transition-all" 
                                        type="tel" id="phone" placeholder=" " required>
                                    <label class="floating-label" for="phone">Téléphone</label>
                                    <span id="telephone-error" class="text-red-500 text-xs"></span>
                                </div>
                                <div class="relative input-group">
                                    <input  name = "Photo" class="w-full px-4 py-3.5 rounded-lg input-field focus:outline-none font-medium transition-all" 
                                        type="file" id="Photo" placeholder=" " >
                                    <label class="floating-label" for="Photo">Profile Image</label>
                                    <span id="image-error" class="text-red-500 text-xs"></span>
                                </div>
                                <div class="relative input-group">
                                    <select id="pays" name="pays" class="w-full px-4 py-3.5 rounded-lg input-field focus:outline-none font-medium transition-all appearance-none" required>
                                        <option value="" disabled selected></option>
                                        <option value="france">France</option>
                                        <option value="spain">Espagne</option>
                                        <option value="germany">Allemagne</option>
                                        <option value="italy">Italie</option>
                                        <option value="morocco">Maroc</option>
                                        <option value="netherlands">Pays-Bas</option>
                                        <option value="unitedkingdom">Royaume-Uni</option>
                                        <option value="usa">États-Unis</option>
                                        <option value="canada">Canada</option>
                                        <option value="brazil">Brésil</option>
                                        <option value="japan">Japon</option>
                                        <option value="southkorea">Corée du Sud</option>
                                        <option value="australia">Australie</option>
                                        <option value="sweden">Suède</option>
                                        <option value="switzerland">Suisse</option>
                                        <option value="belgium">Belgique</option>
                                        <option value="austria">Autriche</option>
                                        <option value="portugal">Portugal</option>
                                    </select>
                                    <label class="floating-label" for="pays">Pays</label>
                                    <span id="pays-error" class="text-red-500 text-xs"></span>
                                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 pointer-events-none">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-6">
                        
                                </div>
                                <button id="inscription" type="submit" name="send" class="w-full btn-client text-white px-6 py-4 rounded-lg font-medium transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-lg">
                                    Créer mon compte
                                </button>
                            </div>
                        </form>
                        <p class="mt-8 text-center text-gray-600">
                            Vous avez déjà un compte ? <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Connectez-vous</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-200 mt-10">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-1">
                    <h1 class="text-xl font-bold text-indigo-600 cursor-pointer font-sans">MIND<span class="text-indigo-800">SERVICE</span></h1>
                    <p class="mt-2 text-sm text-gray-600">La plateforme qui connecte les experts et les clients pour des services de qualité.</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider">Services</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Tous les services</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Développement Web</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Design</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Marketing</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Conseil</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider">Entreprise</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">À propos</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Carrières</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Blog</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Presse</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider">Légal</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Conditions d'utilisation</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Politique de confidentialité</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Politique de cookies</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">RGPD</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Mentions légales</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-200 pt-8 mt-8 text-center">
                <p class="text-sm text-gray-500">&copy; 2025 MINDSERVICE. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    
    <script src="/js/register-client.js"></script>
@endsection