<!DOCTYPE html>
<html lang="fr">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
        }
        .hero-bg {
            background-image: url('https://images.unsplash.com/photo-1664575602276-acd073f104c1?q=80&w=2070&auto=format&fit=crop');
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
                    <a href="/" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Accueil</a>
                    <a href="services.html" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Services</a>
                    <a href="providers.html" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Prestataires</a>
                    <a href="about.html" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">À propos</a>
                    <a href="/contact" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Contact</a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-4">
                <a class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium" href="/login">Connexion</a>
                <a class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition-colors" href="/pro/register">Espace Professionnel</a>
                <a class="bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-700 transition-colors" href="/client/register">Espace Client</a>
            </div>
            <div class="flex items-center sm:hidden">ton">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <button type="button" class="text-gray-500 hover:text-gray-900 focus:outline-none" id="mobile-menu-but
            </div>
        </div>
    </div>
    
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