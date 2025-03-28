<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINDSERVICE - Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="font-poppins bg-gray-50 min-h-screen flex flex-col">
    <!-- Navigation -->
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
                    <a class="text-indigo-600 border-b-2 border-indigo-500 px-3 py-2 text-sm font-medium" href="login.html">Connexion</a>
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
        
        <!-- Menu mobile -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="index.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Accueil</a>
                <a href="services.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Services</a>
                <a href="providers.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Prestataires</a>
                <a href="about.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">À propos</a>
                <a href="contact.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Contact</a>
                <div class="flex flex-col space-y-2 mt-4">
                    <a href="login.html" class="block pl-3 pr-4 py-2 text-base font-medium text-indigo-600 bg-indigo-50">Connexion</a>
                    <a href="professional-register.html" class="block text-center bg-indigo-600 text-white px-4 py-2 rounded-md text-base font-medium hover:bg-indigo-700 transition-colors mx-3">Espace Professionnel</a>
                    <a href="client-register.html" class="block text-center bg-green-600 text-white px-4 py-2 rounded-md text-base font-medium hover:bg-green-700 transition-colors mx-3">Espace Client</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Section -->
    <section class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-indigo-50 via-blue-50 to-white">
        <div class="max-w-4xl w-full bg-white rounded-2xl shadow-xl overflow-hidden flex">
            <!-- Image Section -->
            <div class="hidden md:block md:w-1/2">
                <img src="https://plus.unsplash.com/premium_photo-1669686968068-ef4133a3e782?q=80&w=1925&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Login Image" class="w-full h-full object-cover">
            </div>
            <!-- Form Section -->
            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Bienvenue</h2>
                <p class="text-gray-600 mb-8 text-center">Connectez-vous à votre espace</p>
                
                <!-- Message d'erreur conditionnel -->
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 hidden" id="error-message">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        @if(session('error'))
                        <div class="ml-3">
                            <p class="text-sm">{{session('error')}}</p>
                        </div>
                        @endif
                    </div>
                </div>
                
                <form id="loginForm" method="POST" action="/login" class="space-y-6">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" id="email" name="Email" required class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200" placeholder="votre@email.com">
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                                <a href="#" class="text-xs text-indigo-600 hover:text-indigo-800 transition-colors duration-200">Mot de passe oublié?</a>
                            </div>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input type="password" id="password" name="Password" required class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200" placeholder="••••••••">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <button type="button" id="togglePassword" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">Se souvenir de moi</label>
                        </div>
                    </div>
                    
                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                            <i class="fas fa-sign-in-alt mr-2"></i> Se connecter
                        </button>
                    </div>
                </form>
                
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Ou continuer avec</span>
                        </div>
                    </div>
                    
                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <div>
                            <a href="#" class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                                <i class="fab fa-google text-red-500 mr-2"></i>
                                Google
                            </a>
                        </div>
                        <div>
                            <a href="#" class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                                <i class="fab fa-facebook text-blue-600 mr-2"></i>
                                Facebook
                            </a>
                        </div>
                    </div>
                </div>
                
                <p class="mt-8 text-center text-sm text-gray-600">
                    Vous n'avez pas de compte? 
                    <a href="/web/account-selection" class="font-medium text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
                        Inscrivez-vous
                    </a>
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
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
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Plomberie</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Électricité</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Jardinage</a></li>
                        <li><a href="#" class="text-sm text-gray-600 hover:text-indigo-600">Rénovation</a></li>
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

        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        
        togglePassword.addEventListener('click', function(e) {
            // Prevent form submission
            e.preventDefault();
            
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle eye icon
            if (type === 'text') {
                this.querySelector('i').classList.remove('fa-eye');
                this.querySelector('i').classList.add('fa-eye-slash');
            } else {
                this.querySelector('i').classList.remove('fa-eye-slash');
                this.querySelector('i').classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>