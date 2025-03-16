<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    </style>
</head>
<body>
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="index.html" class="flex-shrink-0 flex items-center">
                    <h1 class="text-xl font-bold text-indigo-600 cursor-pointer font-sans">MIND<span class="text-indigo-800">SERVICE</span></h1>
                </a>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="index.html" class="navbar-link text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Accueil</a>
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

    @yield('content')


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

    <script>
        // Toggle mobile menu
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    </body>
    </html>