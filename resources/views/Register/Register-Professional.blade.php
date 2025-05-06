@extends('layout.app')

@section('title', 'Register Professional')
@section('content')

<div class="container mx-auto px-4 py-6 fade-in">
    <div class="flex justify-center items-center space-x-2">
        <div class="w-3 h-3 bg-indigo-600 rounded-full"></div>
        <div class="h-0.5 w-8 bg-gray-200"></div>
        <div id="dop" class="w-3 h-3 bg-gray-200 rounded-full"></div>
    </div>
    <div id="text-etape" class="text-center mt-2 text-sm text-gray-500">
        Étape 1 : Informations de base
    </div>
</div>

<section class="py-8 slide-in">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-lg transition-all">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-2/5 hero-bg p-8 flex items-center justify-center">
                    <div class="bg-black bg-opacity-40 p-8 rounded-xl backdrop-blur-sm scale-in delay-100" style="backdrop-filter: blur(10px);">
                        <h2 class="text-3xl font-bold mb-6 text-white">Rejoignez l'élite des professionnels</h2>
                        <div class="space-y-5">
                            <div class="flex items-start fade-in delay-200">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-check-circle text-green-400 mr-3 text-xl"></i>
                                </div>
                                <p class="text-white text-lg">Accédez à un réseau de clients qualifiés et motivés</p>
                            </div>
                            <div class="flex items-start fade-in delay-300">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-check-circle text-green-400 mr-3 text-xl"></i>
                                </div>
                                <p class="text-white text-lg">Gérez professionnellement votre agenda et vos rendez-vous</p>
                            </div>
                            <div class="flex items-start fade-in delay-400">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-check-circle text-green-400 mr-3 text-xl"></i>
                                </div>
                                <p class="text-white text-lg">Boostez votre visibilité et votre chiffre d'affaires</p>
                            </div>
                            <div class="flex items-start fade-in delay-500">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-check-circle text-green-400 mr-3 text-xl"></i>
                                </div>
                                <p class="text-white text-lg">Recevez des paiements sécurisés et garantis</p>
                            </div>
                        </div>
                        <div class="mt-8 text-center fade-in delay-500">
                            <p class="text-white opacity-90 mb-4">Déjà plus de 2 500 professionnels nous font confiance</p>
                            <div class="flex justify-center space-x-2">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star-half-alt text-yellow-400"></i>
                                <span class="text-white ml-1">4.8/5</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-3/5 p-10">
                @if($errors->all())
                <ul class="errorban px-4 py-2 bg-red-100">
                                    @foreach($errors->all() as $error)
                                        <li class="error my-2 text-red-500">{{ $error }}</li>
                                    @endforeach
                                @endif
                            </ul>
                    <h2 class="text-3xl font-bold mb-2 text-gray-800">Inscription Professionnel</h2>
                    <p class="text-gray-600 mb-8">Commencez à développer votre activité dès aujourd'hui</p>
                    <form id="fullForm" method="POST" action="{{ route('registerpro') }}" enctype="multipart/form-data">
                        @csrf
                        <div id="firstform">
                            <div class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="relative">
                                        <input id="prenom" name="Prenom" class="w-full px-4 py-3.5 rounded-lg border-2 border-transparent bg-gray-100 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all" type="text" placeholder=" ">
                                        <label class="absolute left-3 top-2 text-gray-500 transition-all transform -translate-y-1/2" for="prenom">Prénom</label>
                                        <span id="prenom-error" class="text-red-500 text-xs"></span>
                                    </div>
                                    <div class="relative">
                                        <input id="nom" name="Nom" class="w-full px-4 py-3.5 rounded-lg border-2 border-transparent bg-gray-100 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all" type="text" placeholder=" ">
                                        <label class="absolute left-3 top-2 text-gray-500 transition-all transform -translate-y-1/2" for="nom">Nom</label>
                                        <span id="nom-error" class="text-red-500 text-xs"></span>
                                    </div>
                                </div>
                                <div class="relative">
                                    <input name="Email" class="w-full px-4 py-3.5 rounded-lg border-2 border-transparent bg-gray-100 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all" type="email" id="email" placeholder=" ">
                                    <label class="absolute left-3 top-2 text-gray-500 transition-all transform -translate-y-1/2" for="email">Email professionnel</label>
                                    <span id="email-error" class="text-red-500 text-xs"></span>
                                </div>
                                <div class="relative">
                                    <input name="Password" class="w-full px-4 py-3.5 rounded-lg border-2 border-transparent bg-gray-100 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all" type="password" id="password" placeholder=" ">
                                    <label class="absolute left-3 top-2 text-gray-500 transition-all transform -translate-y-1/2" for="password">Mot de passe</label>
                                    <span id="password-error" class="text-red-500 text-xs"></span>
                                    <div class="text-xs text-gray-500 mt-1 ml-1">Au moins 8 caractères, incluant chiffres et lettres</div>
                                </div>
                                <div class="relative">
                                    <input value="+" name="NumeroTele" class="w-full px-4 py-3.5 rounded-lg border-2 border-transparent bg-gray-100 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all" type="tel" id="phone" placeholder=" ">
                                    <label class="absolute left-3 top-2 text-gray-500 transition-all transform -translate-y-1/2" for="phone">Téléphone</label>
                                    <span id="telephone-error" class="text-red-500 text-xs"></span>
                                </div>
                                <div class="relative">
                                    <input name="Photo" class="w-full px-4 py-3.5 rounded-lg border-2 border-transparent bg-gray-100 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all" type="file" id="Photo" placeholder=" ">
                                    <label class="absolute left-3 top-2 text-gray-500 transition-all transform -translate-y-1/2" for="Photo">Profile Image</label>
                                    <span id="image-error" class="text-red-500 text-xs"></span>
                                </div>
                                <div class="relative">
                                    <select name="service" class="w-full px-4 py-3.5 rounded-lg border-2 border-transparent bg-gray-100 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all appearance-none" id="service">
                                    @foreach($services as $service)
                                        <option value="" disabled selected></option>
                                        <option value="{{$service}}">{{$service}}</option>
                                        @endforeach
                                    </select>
                                    <label class="absolute left-3 top-2 text-gray-500 transition-all transform -translate-y-1/2" for="service">Service principal proposé</label>
                                    <span id="service-error" class="text-red-500 text-xs"></span>
                                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 pointer-events-none">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="flex items-start">
        
                                </div>
                                <button id="suivant" name="send" class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-6 py-4 rounded-lg font-medium transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-lg">
                                    Suivant
                                </button>
                            </div>
                        </div>

                        <div id="secondform">
                        
                            <div class="space-y-6">
                                <div class="relative">
                                    <input name="Adresse" class="w-full px-4 py-3.5 rounded-lg border-2 border-transparent bg-gray-100 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all" type="text" id="adresse" placeholder=" ">
                                    <label class="absolute left-3 top-2 text-gray-500 transition-all transform -translate-y-1/2" for="adresse">Adresse Professionnelle</label>
                                    <span id="adresse-error" class="text-red-500 text-xs"></span>
                                </div>
                                <div class="relative">
                                    <input name="Ville" class="w-full px-4 py-3.5 rounded-lg border-2 border-transparent bg-gray-100 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all" type="text" id="Ville" placeholder=" ">
                                    <label class="absolute left-3 top-2 text-gray-500 transition-all transform -translate-y-1/2" for="Ville">Ville</label>
                                    <span id="ville-error" class="text-red-500 text-xs"></span>
                                </div>
                                <div class="relative">
                                    <input name="PostalCode" class="w-full px-4 py-3.5 rounded-lg border-2 border-transparent bg-gray-100 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all" type="tel" id="PostalCode" placeholder=" ">
                                    <label class="absolute left-3 top-2 text-gray-500 transition-all transform -translate-y-1/2" for="PostalCode">Postal Code</label>
                                    <span id="postal-error" class="text-red-500 text-xs"></span>
                                </div>
                                <div class="relative">
                                    <select id="pays" name="pays" class="w-full px-4 py-3.5 rounded-lg border-2 border-transparent bg-gray-100 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all appearance-none">
                                        <option value="" disabled selected></option>
                                       @foreach($countryList as $country)
                                       <option value="{{$country}}" >{{$country}}</option>
                                       @endforeach
                                    </select>
                                    <label class="absolute left-3 top-2 text-gray-500 transition-all transform -translate-y-1/2" for="pays">Pays</label>
                                    <span id="pays-error" class="text-red-500 text-xs"></span>
                                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 pointer-events-none">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                 
                                </div>
                                <div class="flex flex-col space-y-4">
                                    <button id="retour" type="button" class="w-full text-gray-600 border border-gray-300 hover:bg-gray-50 px-6 py-3 rounded-lg font-medium transition-all focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 text-lg">
                                        <i class="fas fa-arrow-left mr-2"></i> Retour
                                    </button>
                                    <button id="inscription" type="submit" name="send" class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 text-white px-6 py-4 rounded-lg font-medium transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-lg">
                                        Inscription
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="mt-8 text-center text-gray-600">
                        Vous avez déjà un compte ? <a href="/login" class="text-indigo-600 hover:text-indigo-800 font-medium">Connectez-vous</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-50 fade-in">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Pourquoi nous rejoindre ?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-center mb-4">Clientèle qualifiée</h3>
                <p class="text-gray-600 text-center">Accédez à des clients sérieux et motivés qui recherchent spécifiquement votre expertise.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-center mb-4">Développez votre activité</h3>
                <p class="text-gray-600 text-center">Augmentez votre visibilité et boostez votre chiffre d'affaires grâce à notre plateforme.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-r from-indigo-600 to-indigo-700 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-tools text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-center mb-4">Outils professionnels</h3>
                <p class="text-gray-600 text-center">Profitez d'outils de gestion complets pour vos rendez-vous, factures et paiements.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 fade-in">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Témoignages de professionnels</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-all">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex items-center">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=774&auto=format&fit=crop" alt="Professional" class="w-14 h-14 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-semibold">Thomas Durand</h4>
                            <p class="text-sm text-gray-500">Architecte d'intérieur</p>
                        </div>
                    </div>
                    <div class="flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>
                <p class="text-gray-600 italic">"Depuis que j'ai rejoint MINDSERVICE, mon carnet de commandes est plein. L'interface est intuitive et les clients sont sérieux."</p>
                <div class="mt-4 text-right text-indigo-600 font-medium">
                    <span class="flex items-center justify-end">
                        <span>Voir plus</span>
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </span>
                </div>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-all">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex items-center">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=776&auto=format&fit=crop" alt="Professional" class="w-14 h-14 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-semibold">Sophie Martin</h4>
                            <p class="text-sm text-gray-500">Coach sportif</p>
                        </div>
                    </div>
                    <div class="flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star-half-alt text-yellow-400"></i>
                    </div>
                </div>
                <p class="text-gray-600 italic">"La plateforme m'a permis de multiplier par trois mon nombre de clients en seulement 6 mois. Le système de paiement est fiable et rapide."</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-all">
                <div class="flex justify-between items-start mb-6">
                    <div class="flex items-center">
                        <img src="https://images.unsplash.com/photo-1566492031773-4f4e44671857?q=80&w=774&auto=format&fit=crop" alt="Professional" class="w-14 h-14 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-semibold">Marc Leroy</h4>
                            <p class="text-sm text-gray-500">Développeur web</p>
                        </div>
                    </div>
                    <div class="flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>
                <p class="text-gray-600 italic">"Les outils de gestion de projet et de facturation m'ont fait gagner un temps précieux. Je recommande à tous les indépendants !"</p>
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
                    <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">
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
<script src="/js/register.js"></script>
@endsection