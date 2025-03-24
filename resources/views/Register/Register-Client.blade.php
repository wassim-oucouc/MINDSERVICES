<!DOCTYPE html>
<html lang="fr">
<head>
    <base href = "/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINDSERVICES - Inscription Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
        }
        .hero-bg {
            background-image: url('https://images.unsplash.com/photo-1560179707-f14e90ef3623?q=80&w=2073&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
        /* CSS-only animations */
        .fade-in {
            opacity: 0;
            animation: fadeIn 0.8s ease-in-out forwards;
        }
        .slide-in {
            opacity: 0;
            animation: slideIn 0.6s ease-in-out forwards;
        }
        .scale-in {
            opacity: 0;
            animation: scaleIn 0.7s ease-in-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideIn {
            from { transform: translateX(-30px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes scaleIn {
            from { transform: scale(0.95); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        /* Delayed animations for staggered effect */
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        
        /* Form styling */
        .input-field {
            transition: all 0.3s ease;
            border: 2px solid transparent;
            background-color: #f1f5f9;
        }
        .input-field:focus {
            border-color: #4F46E5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
            background-color: #ffffff;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #4F46E5 0%, #6366F1 100%);
        }
        .btn-client {
            background: linear-gradient(135deg, #4F46E5 0%, #6366F1 100%);
            transition: all 0.3s ease;
            transform: translateY(0);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }
        .btn-client:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(79, 70, 229, 0.35);
        }
        .btn-client:active {
            transform: translateY(0);
        }
        .floating-label {
            position: absolute;
            pointer-events: none;
            left: 12px;
            top: 12px;
            transition: 0.2s ease-in-out all;
            font-size: 14px;
            color: #6B7280;
        }
        .input-field:focus ~ .floating-label,
        .input-field:not(:placeholder-shown) ~ .floating-label {
            top: -10px;
            left: 10px;
            font-size: 12px;
            background: #fff;
            padding: 0 6px;
            color: #4F46E5;
        }
        /* Card hover effects */
        .hover-card {
            transition: all 0.3s ease;
        }
        .hover-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="text-gray-800">
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="index.html" class="flex-shrink-0 flex items-center">
                    <h1 class="text-xl font-bold text-indigo-600 cursor-pointer font-sans">MIND<span class="text-indigo-800">SERVICE</span></h1>
                </a>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="/" class="navbar-link text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Accueil</a>
                    <a href="services.html" class="navbar-link text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Services</a>
                    <a href="providers.html" class="navbar-link text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Prestataires</a>
                    <a href="about.html" class="navbar-link text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">À propos</a>
                    <a href="contact.html" class="navbar-link text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Contact</a>
                </div>
            </div>
            <!-- Version desktop des boutons -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-4">
                <a class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium" href="#">Connexion</a>
                <a class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition-colors" href="professional-register.html">Espace Professionnel</a>
                <a class="bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-700 transition-colors" href="client-register.html">Espace Client</a>
            </div>
            <div class="flex items-center sm:hidden">
                <button type="button" class="text-gray-500 hover:text-gray-900 focus:outline-none" id="mobile-menu-button">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Menu mobile modifié -->
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
            <a href="index.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Accueil</a>
            <a href="services.html" class="block pl-3 pr-4 py-2 text-base font-medium text-indigo-600 bg-indigo-50">Services</a>
            <a href="providers.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Prestataires</a>
            <a href="about.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">À propos</a>
            <a href="contact.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Contact</a>
            <div class="flex flex-col space-y-2 mt-4">
                <a href="#" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Connexion</a>
                <a href="professional-register.html" class="block text-center bg-indigo-600 text-white px-4 py-2 rounded-md text-base font-medium hover:bg-indigo-700 transition-colors mx-3">Espace Professionnel</a>
                <a href="client-register.html" class="block text-center bg-green-600 text-white px-4 py-2 rounded-md text-base font-medium hover:bg-green-700 transition-colors mx-3">Espace Client</a>
            </div>
        </div>
    </div>
</nav>

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
                                        <input type="checkbox" id="terms" required
                                            class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-all cursor-pointer">
                                    </div>
                                    <div class="ml-3">
                                        <label for="terms" class="text-sm text-gray-700">
                                            J'accepte les <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">conditions d'utilisation</a> et la <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">politique de confidentialité</a>
                                        </label>
                                    </div>
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
</body>
</html>