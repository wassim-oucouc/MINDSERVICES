<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINDSERVICES - Profil Public</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
        }
        .profile-cover {
            height: 200px;
            background-image: url('https://images.unsplash.com/photo-1508614999368-9260051292e5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
        }
        .service-card {
            transition: all 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .navbar-link {
            position: relative;
        }
        .navbar-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #4F46E5;
            transition: width 0.3s;
        }
        .navbar-link:hover:after {
            width: 100%;
        }
        .navbar-link.active:after {
            width: 100%;
        }
    </style>
</head>
<body class="text-gray-800">
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
                        <a href="providers.html" class="navbar-link active text-indigo-600 hover:text-indigo-900 px-3 py-2 text-sm font-medium">Prestataires</a>
                        <a href="about.html" class="navbar-link text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">À propos</a>
                        <a href="contact.html" class="navbar-link text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Contact</a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-4">
                    <a href="login.html" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Connexion</a>
                    <a href="register.html" class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition-colors">Inscription</a>
                </div>
                <div class="flex items-center sm:hidden">
                    <button type="button" class="text-gray-500 hover:text-gray-900 focus:outline-none" id="mobile-menu-button">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="index.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Accueil</a>
                <a href="services.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Services</a>
                <a href="providers.html" class="block pl-3 pr-4 py-2 text-base font-medium text-indigo-600 bg-indigo-50">Prestataires</a>
                <a href="about.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">À propos</a>
                <a href="contact.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Contact</a>
                <div class="border-t border-gray-200 pt-4 pb-3">
                    <a href="login.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Connexion</a>
                    <a href="register.html" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-indigo-600">Inscription</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="mb-5">
                <ol class="flex text-sm">
                    <li class="flex items-center">
                        <a href="index.html" class="text-gray-500 hover:text-indigo-600">Accueil</a>
                        <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                    </li>
                    <li class="flex items-center">
                        <a href="providers.html" class="text-gray-500 hover:text-indigo-600">Prestataires</a>
                        <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                    </li>
                    <li class="text-gray-900 font-medium">Paul Martin</li>
                </ol>
            </nav>

            <!-- Profile Header -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
                <!-- Cover Image -->
                <div class="profile-cover relative"></div>
                
                <!-- Profile Basic Info -->
                <div class="p-8 flex flex-col items-center md:items-start md:flex-row md:space-x-8">
                    <!-- Large Profile Picture -->
                    <div class="w-40 h-40 -mt-24 bg-white rounded-full shadow-lg border-4 border-white relative mb-4 md:mb-0">
                        <img 
                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1287&auto=format&fit=crop" 
                            alt="Profile Picture" 
                            class="w-full h-full object-cover rounded-full"
                        >
                        <div class="absolute bottom-3 right-2 w-6 h-6 bg-green-500 rounded-full border-2 border-white"></div>
                    </div>
                    <div class="text-center md:text-left mt-4 md:mt-0">
                        <div class="flex items-center flex-col md:flex-row">
                            <h1 class="text-3xl font-bold text-gray-900">Paul Martin</h1>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium ml-0 md:ml-4 mt-2 md:mt-0 px-2.5 py-1 rounded-full">Développeur Web</span>
                        </div>
                        <p class="text-lg text-gray-600 mt-1">Membre depuis: 15 janvier 2025</p>
                        <div class="flex items-center mt-3 justify-center md:justify-start">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="ml-2 text-sm text-gray-500">4.8 (58 avis)</span>
                        </div>
                        <div class="mt-4 flex space-x-3 justify-center md:justify-start">
                            <button class="px-6 py-2.5 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors text-sm font-medium">
                                <i class="fas fa-envelope mr-2"></i>Contacter
                            </button>
                            <button class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition-colors text-sm font-medium">
                                <i class="fas fa-bookmark mr-2"></i>Enregistrer
                            </button>
                        </div>
                    </div>
                    <div class="hidden md:flex md:flex-col md:items-end md:ml-auto mt-6 md:mt-0">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="font-semibold text-gray-900">Tarif horaire</p>
                            <p class="text-2xl font-bold text-indigo-600">75€<span class="text-sm text-gray-500 font-normal">/heure</span></p>
                            <button class="mt-3 w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition-colors text-sm font-medium">
                                Réserver
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:hidden bg-white rounded-lg shadow-sm overflow-hidden mb-6 p-4 text-center">
                <p class="font-semibold text-gray-900">Tarif horaire</p>
                <p class="text-2xl font-bold text-indigo-600">75€<span class="text-sm text-gray-500 font-normal">/heure</span></p>
                <button class="mt-3 w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition-colors text-sm font-medium">
                    Réserver
                </button>
            </div>

            <!-- Profile Content -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left Column - Information and Reviews -->
                <div class="md:col-span-1 space-y-6">
                    <!-- About Me -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">À propos</h2>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 mb-4">
                                Spécialiste en développement frontend React et Vue.js avec 5 ans d'expérience. Passionné par la création d'interfaces utilisateur intuitives et performantes.
                            </p>
                            <div class="mt-4">
                                <h3 class="text-sm font-medium text-gray-900 mb-2">Compétences</h3>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">React</span>
                                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">Vue.js</span>
                                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">JavaScript</span>
                                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">TypeScript</span>
                                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">HTML/CSS</span>
                                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">Tailwind CSS</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h3 class="text-sm font-medium text-gray-900 mb-2">Informations</h3>
                                <ul class="space-y-2">
                                    <li class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-map-marker-alt w-5 text-gray-400"></i>
                                        <span>Paris, France</span>
                                    </li>
                                    <li class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-language w-5 text-gray-400"></i>
                                        <span>Français, Anglais</span>
                                    </li>
                                    <li class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-clock w-5 text-gray-400"></i>
                                        <span>Disponible en semaine</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-4">
                                <h3 class="text-sm font-medium text-gray-900 mb-2">Réseaux sociaux</h3>
                                <div class="flex space-x-3">
                                    <a href="#" class="text-gray-400 hover:text-gray-700">
                                        <i class="fab fa-linkedin text-lg"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-700">
                                        <i class="fab fa-github text-lg"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-700">
                                        <i class="fab fa-twitter text-lg"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-gray-700">
                                        <i class="fas fa-globe text-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Client Reviews -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                            <h2 class="text-lg font-semibold text-gray-900">Avis clients</h2>
                            <div class="flex items-center">
                                <div class="flex text-yellow-400 mr-1">
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-900">4.8</span>
                                <span class="text-sm text-gray-500 ml-1">(58)</span>
                            </div>
                        </div>
                        <div class="p-6 space-y-6">
                            <!-- Review 1 -->
                            <div class="border-b border-gray-100 pb-6">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center">
                                        <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" 
                                            alt="Client" 
                                            class="w-10 h-10 rounded-full object-cover mr-3">
                                        <div>
                                            <p class="font-medium text-gray-900">Thomas Dubois</p>
                                            <p class="text-xs text-gray-500">Client</p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-gray-500">10/02/2025</span>
                                </div>
                                <div class="flex text-yellow-400 text-sm mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <p class="text-sm text-gray-900 font-medium">Très professionnel</p>
                                <p class="text-sm text-gray-600 mt-1">Le site web développé par Paul est exactement ce dont j'avais besoin pour mon entreprise. L'interface est intuitive et le design est moderne. Je recommande vivement ses services.</p>
                            </div>

                            <!-- Review 2 -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center">
                                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" 
                                            alt="Client" 
                                            class="w-10 h-10 rounded-full object-cover mr-3">
                                        <div>
                                            <p class="font-medium text-gray-900">Sophie Martin</p>
                                            <p class="text-xs text-gray-500">Client</p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-gray-500">15/01/2025</span>
                                </div>
                                <div class="flex text-yellow-400 text-sm mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="text-sm text-gray-900 font-medium">Excellent travail</p>
                                <p class="text-sm text-gray-600 mt-1">Paul a fait un travail exceptionnel sur mon projet. Il a été à l'écoute de mes besoins et a proposé des solutions innovantes. Je n'hésiterai pas à faire appel à lui pour mes prochains projets.</p>
                            </div>
                            
                            <div class="text-center pt-2">
                                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                                    Voir tous les avis <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Services -->
                <div class="md:col-span-2">
                    <!-- Services Proposés -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">Services proposés</h2>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Service Card 1 -->
                                <div class="service-card rounded-lg border border-gray-200 overflow-hidden">
                                    <div class="h-40 overflow-hidden">
                                        <img class="w-full h-full object-cover" 
                                             src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" 
                                             alt="Service">
                                    </div>
                                    <div class="p-4">
                                        <div class="flex justify-between items-start">
                                            <h3 class="text-lg font-medium text-gray-900">Développement Frontend</h3>
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Web</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-2">Création d'interfaces utilisateur réactives et modernes avec React.js ou Vue.js</p>
                                        <div class="flex justify-between items-center mt-4">
                                            <span class="text-lg font-medium text-indigo-600">75€<span class="text-sm text-gray-500 font-normal">/heure</span></span>
                                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700 transition-colors">
                                                Réserver
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Service Card 2 -->
                                <div class="service-card rounded-lg border border-gray-200 overflow-hidden">
                                    <div class="h-40 overflow-hidden">
                                        <img class="w-full h-full object-cover" 
                                             src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" 
                                             alt="Service">
                                    </div>
                                    <div class="p-4">
                                        <div class="flex justify-between items-start">
                                            <h3 class="text-lg font-medium text-gray-900">Refonte de Site Web</h3>
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Web</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-2">Modernisation et optimisation de sites web existants pour une meilleure expérience utilisateur</p>
                                        <div class="flex justify-between items-center mt-4">
                                            <span class="text-lg font-medium text-indigo-600">750€<span class="text-sm text-gray-500 font-normal">/projet</span></span>
                                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700 transition-colors">
                                                Réserver
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Service Card 3 -->
                                <div class="service-card rounded-lg border border-gray-200 overflow-hidden">
                                    <div class="h-40 overflow-hidden">
                                        <img class="w-full h-full object-cover" 
                                             src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" 
                                             alt="Service">
                                    </div>
                                    <div class="p-4">
                                        <div class="flex justify-between items-start">
                                            <h3 class="text-lg font-medium text-gray-900">Consultation Technique</h3>
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Conseil</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-2">Conseil et expertise technique pour votre projet web ou mobile</p>
                                        <div class="flex justify-between items-center mt-4">
                                            <span class="text-lg font-medium text-indigo-600">95€<span class="text-sm text-gray-500 font-normal">/heure</span></span>
                                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700 transition-colors">
                                                Réserver
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Service Card 4 -->
                                <div class="service-card rounded-lg border border-gray-200 overflow-hidden">
                                    <div class="h-40 overflow-hidden">
                                        <img class="w-full h-full object-cover" 
                                             src="https://images.unsplash.com/photo-1546146830-2cca9512c747?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80" 
                                             alt="Service">
                                    </div>
                                    <div class="p-4">
                                        <div class="flex justify-between items-start">
                                            <h3 class="text-lg font-medium text-gray-900">Formation Web</h3>
                                            <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Formation</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-2">Formation personnalisée aux technologies web modernes pour débutants ou professionnels</p>
                                        <div class="flex justify-between items-center mt-4">
                                            <span class="text-lg font-medium text-indigo-600">450€<span class="text-sm text-gray-500 font-normal">/jour</span></span>
                                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700 transition-colors">
                                                Réserver
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Portfolio -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-900">Portfolio</h2>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                <div class="rounded-lg overflow-hidden shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                                    <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&h=500&q=80" alt="Portfolio item" class="w-full h-48 object-cover">
                                    <div class="p-3">
                                        <h3 class="text-sm font-medium text-gray-900">Site e-commerce ModaChic</h3>
                                        <p class="text-xs text-gray-500 mt-1">React, Node.js, MongoDB</p>
                                    </div>
                                </div>
                                <div class="rounded-lg overflow-hidden shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                                    <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&h=500&q=80" alt="Portfolio item" class="w-full h-48 object-cover">
                                    <div class="p-3">
                                        <h3 class="text-sm font-medium text-gray-900">Application CRM SalesBoost</h3>
                                        <p class="text-xs text-gray-500 mt-1">Vue.js, Express, PostgreSQL</p>
                                    </div>
                                </div>
                                <div class="rounded-lg overflow-hidden shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&h=500&q=80" alt="Portfolio item" class="w-full h-48 object-cover">
                                    <div class="p-3">
                                        <h3 class="text-sm font-medium text-gray-900">Dashboard analytique FinTech</h3>
                                        <p class="text-xs text-gray-500 mt-1">React, TypeScript, GraphQL</p>
                                    </div>
                                </div>
                                <div class="rounded-lg overflow-hidden shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&h=500&q=80" alt="Portfolio item" class="w-full h-48 object-cover">
                                    <div class="p-3">
                                        <h3 class="text-sm font-medium text-gray-900">Application mobile FitTrack</h3>
                                        <p class="text-xs text-gray-500 mt-1">React Native, Firebase</p>
                                    </div>
                                </div>
                                <div class="rounded-lg overflow-hidden shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                                    <img src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&h=500&q=80" alt="Portfolio item" class="w-full h-48 object-cover">
                                    <div class="p-3">
                                        <h3 class="text-sm font-medium text-gray-900">Site vitrine Eco-Habitat</h3>
                                        <p class="text-xs text-gray-500 mt-1">HTML/CSS, JavaScript, GSAP</p>
                                    </div>
                                </div>
                                <div class="rounded-lg overflow-hidden shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                                    <img src="https://images.unsplash.com/photo-1551434678-bf36aece8a1d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&h=500&q=80" alt="Portfolio item" class="w-full h-48 object-cover">
                                    <div class="p-3">
                                        <h3 class="text-sm font-medium text-gray-900">Blog culinaire ChefAtHome</h3>
                                        <p class="text-xs text-gray-500 mt-1">Gatsby.js, Contentful CMS</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-center">
                                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                                    Voir tous les projets <i class="fas fa-long-arrow-alt-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Providers -->
            <div class="mt-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Prestataires similaires</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Provider 1 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="h-32 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=1770&auto=format&fit=crop" 
                                 alt="Provider Cover" class="w-full h-full object-cover">
                        </div>
                        <div class="relative px-4 pt-8 pb-4">
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1287&auto=format&fit=crop" 
                                     alt="Provider" class="w-12 h-12 rounded-full border-2 border-white object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-base font-medium text-gray-900">Alexandre Dupont</h3>
                                <p class="text-xs text-gray-500 mt-1">Développeur Backend</p>
                                <div class="flex justify-center mt-2">
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">5.0</span>
                                </div>
                                <a href="#" class="block mt-3 text-sm text-indigo-600 hover:text-indigo-800 font-medium">Voir profil</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Provider 2 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="h-32 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?q=80&w=1770&auto=format&fit=crop" 
                                 alt="Provider Cover" class="w-full h-full object-cover">
                        </div>
                        <div class="relative px-4 pt-8 pb-4">
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1364&auto=format&fit=crop" 
                                     alt="Provider" class="w-12 h-12 rounded-full border-2 border-white object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-base font-medium text-gray-900">Marie Legrand</h3>
                                <p class="text-xs text-gray-500 mt-1">Designer UX/UI</p>
                                <div class="flex justify-center mt-2">
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">4.5</span>
                                </div>
                                <a href="#" class="block mt-3 text-sm text-indigo-600 hover:text-indigo-800 font-medium">Voir profil</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Provider 3 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="h-32 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1531685250784-7569952593d2?q=80&w=1974&auto=format&fit=crop" 
                                 alt="Provider Cover" class="w-full h-full object-cover">
                        </div>
                        <div class="relative px-4 pt-8 pb-4">
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1287&auto=format&fit=crop" 
                                     alt="Provider" class="w-12 h-12 rounded-full border-2 border-white object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-base font-medium text-gray-900">Thomas Klein</h3>
                                <p class="text-xs text-gray-500 mt-1">Développeur Full-Stack</p>
                                <div class="flex justify-center mt-2">
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">4.0</span>
                                </div>
                                <a href="#" class="block mt-3 text-sm text-indigo-600 hover:text-indigo-800 font-medium">Voir profil</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Provider 4 -->
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="h-32 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" 
                                 alt="Provider Cover" class="w-full h-full object-cover">
                        </div>
                        <div class="relative px-4 pt-8 pb-4">
                            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2">
                                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1288&auto=format&fit=crop" 
                                     alt="Provider" class="w-12 h-12 rounded-full border-2 border-white object-cover">
                            </div>
                            <div class="text-center">
                                <h3 class="text-base font-medium text-gray-900">Claire Bernard</h3>
                                <p class="text-xs text-gray-500 mt-1">Développeuse Mobile</p>
                                <div class="flex justify-center mt-2">
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">5.0</span>
                                </div>
                                <a href="#" class="block mt-3 text-sm text-indigo-600 hover:text-indigo-800 font-medium">Voir profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
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