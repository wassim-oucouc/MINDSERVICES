<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINDSERVICES - Mon Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-poppins text-gray-800 bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="bg-white w-64 shadow-lg h-full flex-shrink-0 z-20 border-r border-gray-200">
            <div class="h-full flex flex-col">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 border-b border-gray-200">
                    <h1 class="text-xl font-bold text-indigo-600 cursor-pointer">MIND<span class="text-indigo-800">SERVICE</span></h1>
                </div>
                
                <!-- User Info -->
                <div class="flex items-center space-x-4 px-6 py-4 border-b border-gray-200">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1287&auto=format&fit=crop" 
                         alt="Client Profile" class="w-10 h-10 rounded-full object-cover">
                    <div>
                        <h3 class="font-medium text-sm">Paul Martin</h3>
                        <p class="text-xs text-gray-500">Client</p>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
                    <a href="client-dashboard.html" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-tachometer-alt text-lg"></i>
                        <span class="font-medium">Tableau de bord</span>
                    </a>
                    <a href="client-appointments.html" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-calendar-alt text-lg"></i>
                        <span class="font-medium">Mes Rendez-vous</span>
                    </a>
                    <a href="client-services.html" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-concierge-bell text-lg"></i>
                        <span class="font-medium">Services</span>
                    </a>
                    <a href="client-messages.html" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-comments text-lg"></i>
                        <span class="font-medium">Messages</span>
                        <span class="ml-auto bg-red-500 text-white text-xs py-0.5 px-2 rounded-full">2</span>
                    </a>
                    <a href="client-invoices.html" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-file-invoice-dollar text-lg"></i>
                        <span class="font-medium">Factures</span>
                    </a>
                    <a href="client-profile.html" class="flex items-center space-x-3 px-4 py-3 rounded-lg active-nav-item bg-indigo-100 text-indigo-600">
                        <i class="fas fa-user-circle text-lg"></i>
                        <span class="font-medium">Mon Profil</span>
                    </a>
                    <a href="client-help.html" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-question-circle text-lg"></i>
                        <span class="font-medium">Aide</span>
                    </a>
                </nav>
                
                <!-- Logout -->
                <div class="p-4 border-t border-gray-200">
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-red-500 transition-colors">
                        <i class="fas fa-sign-out-alt text-lg"></i>
                        <span class="font-medium">Déconnexion</span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6 lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">Mon Profil</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                    </button>
                </div>
            </header>

            <!-- Profile content -->
            <div class="container mx-auto px-4 py-8">
                <!-- Profile Header -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
                    <!-- Cover Image -->
                    <div class="h-48 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1508614999368-9260051292e5?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');"></div>
                    
                    <!-- Profile Basic Info -->
                    <div class="p-8 flex flex-col items-center md:items-start md:flex-row md:space-x-8">
                        <!-- Large Profile Picture -->
                        <div class="w-40 h-40 -mt-24 bg-white rounded-full shadow-lg border-4 border-white relative mb-4 md:mb-0">
                            <img 
                                src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1287&auto=format&fit=crop" 
                                alt="Profile Picture" 
                                class="w-full h-full object-cover rounded-full"
                            >
                        </div>
                        <div class="text-center md:text-left mt-4 md:mt-0">
                            <h1 class="text-3xl font-bold text-gray-900">Paul Martin</h1>
                            <p class="text-lg text-gray-600 mt-1">Membre depuis: 15 janvier 2025</p>
                            <div class="mt-6">
                                <button class="px-6 py-2.5 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors text-sm font-medium">
                                    <i class="fas fa-pencil-alt mr-2"></i>Modifier le profil
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Left Column - Personal Information -->
                    <div class="md:col-span-1">
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-semibold text-gray-900">Informations personnelles</h2>
                            </div>
                            <div class="p-6">
                                <ul class="space-y-4">
                                    <li class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-500">Nom</span>
                                        <span class="text-base text-gray-900">Martin</span>
                                    </li>
                                    <li class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-500">Prénom</span>
                                        <span class="text-base text-gray-900">Paul</span>
                                    </li>
                                    <li class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-500">Email</span>
                                        <span class="text-base text-gray-900">paul.martin@example.com</span>
                                    </li>
                                    <li class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-500">Téléphone</span>
                                        <span class="text-base text-gray-900">+33 6 12 34 56 78</span>
                                    </li>
                                    <li class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-500">Adresse</span>
                                        <span class="text-base text-gray-900">123 Rue de Paris, 75001 Paris</span>
                                    </li>
                                    <li class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-500">Date de naissance</span>
                                        <span class="text-base text-gray-900">15/07/1985</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- My Reviews -->
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden mt-6">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-semibold text-gray-900">Mes avis</h2>
                            </div>
                            <div class="p-6 space-y-6">
                                <!-- Review 1 -->
                                <div class="border-b border-gray-100 pb-6">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1364&auto=format&fit=crop" 
                                                alt="Provider" 
                                                class="w-10 h-10 rounded-full object-cover mr-3">
                                            <div>
                                                <p class="font-medium text-gray-900">Camille Laurent</p>
                                                <p class="text-xs text-gray-500">Coach Sportif</p>
                                            </div>
                                        </div>
                                        <span class="text-xs text-gray-500">01/03/2025</span>
                                    </div>
                                    <div class="flex text-yellow-400 text-xs mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <p class="text-sm text-gray-900 font-medium">Excellent service</p>
                                    <p class="text-sm text-gray-600 mt-1">Camille est une coach incroyable ! Elle sait exactement comment me pousser à donner le meilleur de moi-même tout en respectant mes limites.</p>
                                </div>

                                <!-- Review 2 -->
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1288&auto=format&fit=crop" 
                                                alt="Provider" 
                                                class="w-10 h-10 rounded-full object-cover mr-3">
                                            <div>
                                                <p class="font-medium text-gray-900">Emma Bernard</p>
                                                <p class="text-xs text-gray-500">Photographe</p>
                                            </div>
                                        </div>
                                        <span class="text-xs text-gray-500">15/01/2025</span>
                                    </div>
                                    <div class="flex text-yellow-400 text-xs mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="text-sm text-gray-900 font-medium">Bon travail</p>
                                    <p class="text-sm text-gray-600 mt-1">Emma a un oeil artistique impressionnant. Les photos qu'elle a prises sont superbes et correspondent parfaitement à ce que je recherchais.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Services -->
                    <div class="md:col-span-2">
                        <!-- Services Réservés -->
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-semibold text-gray-900">Services réservés précédents</h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Service Card 1 -->
                                    <div class="service-card rounded-lg border border-gray-200 overflow-hidden">
                                        <div class="flex p-4">
                                            <div class="flex-shrink-0 mr-4">
                                                <img class="h-16 w-16 rounded-lg object-cover" 
                                                     src="https://images.unsplash.com/photo-1434494878577-86c23bcb06b9?q=80&w=1770&auto=format&fit=crop" 
                                                     alt="Service">
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex justify-between">
                                                    <h3 class="text-sm font-medium text-gray-900">Coaching Sportif</h3>
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terminé</span>
                                                </div>
                                                <div class="flex items-center mt-1">
                                                    <img class="h-6 w-6 rounded-full mr-2" 
                                                         src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1364&auto=format&fit=crop" 
                                                         alt="Provider">
                                                    <span class="text-xs text-gray-500">Camille Laurent</span>
                                                </div>
                                                <div class="flex justify-between items-center mt-2">
                                                    <span class="text-xs text-gray-500">10/03/2025</span>
                                                    <span class="text-sm font-medium text-gray-900">150 €</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 2 -->
                                    <div class="service-card rounded-lg border border-gray-200 overflow-hidden">
                                        <div class="flex p-4">
                                            <div class="flex-shrink-0 mr-4">
                                                <img class="h-16 w-16 rounded-lg object-cover" 
                                                     src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?q=80&w=1712&auto=format&fit=crop" 
                                                     alt="Service">
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex justify-between">
                                                    <h3 class="text-sm font-medium text-gray-900">Shooting Photo</h3>
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terminé</span>
                                                </div>
                                                <div class="flex items-center mt-1">
                                                    <img class="h-6 w-6 rounded-full mr-2" 
                                                         src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1288&auto=format&fit=crop" 
                                                         alt="Provider">
                                                    <span class="text-xs text-gray-500">Emma Bernard</span>
                                                </div>
                                                <div class="flex justify-between items-center mt-2">
                                                    <span class="text-xs text-gray-500">15/02/2025</span>
                                                    <span class="text-sm font-medium text-gray-900">250 €</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 3 -->
                                    <div class="service-card rounded-lg border border-gray-200 overflow-hidden">
                                        <div class="flex p-4">
                                            <div class="flex-shrink-0 mr-4">
                                                <img class="h-16 w-16 rounded-lg object-cover" 
                                                     src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=1770&auto=format&fit=crop" 
                                                     alt="Service">
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex justify-between">
                                                    <h3 class="text-sm font-medium text-gray-900">Développement Web</h3>
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terminé</span>
                                                </div>
                                                <div class="flex items-center mt-1">
                                                    <img class="h-6 w-6 rounded-full mr-2" 
                                                         src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1287&auto=format&fit=crop" 
                                                         alt="Provider">
                                                    <span class="text-xs text-gray-500">Paul Martin</span>
                                                </div>
                                                <div class="flex justify-between items-center mt-2">
                                                    <span class="text-xs text-gray-500">05/01/2025</span>
                                                    <span class="text-sm font-medium text-gray-900">650 €</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Card 4 -->
                                    <div class="service-card rounded-lg border border-gray-200 overflow-hidden">
                                        <div class="flex p-4">
                                            <div class="flex-shrink-0 mr-4">
                                                <img class="h-16 w-16 rounded-lg object-cover" 
                                                     src="https://images.unsplash.com/photo-1485217988980-11786ced9454?q=80&w=1470&auto=format&fit=crop" 
                                                     alt="Service">
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex justify-between">
                                                    <h3 class="text-sm font-medium text-gray-900">Consultation Marketing</h3>
                                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terminé</span>
                                                </div>
                                                <div class="flex items-center mt-1">
                                                    <img class="h-6 w-6 rounded-full mr-2" 
                                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=2070&auto=format&fit=crop" 
                                                         alt="Provider">
                                                    <span class="text-xs text-gray-500">Jean Dupont</span>
                                                </div>
                                                <div class="flex justify-between items-center mt-2">
                                                    <span class="text-xs text-gray-500">20/12/2024</span>
                                                    <span class="text-sm font-medium text-gray-900">350 €</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-6 text-center">
                                    <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                                        Voir tous les services <i class="fas fa-long-arrow-alt-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Statistiques -->
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-semibold text-gray-900">Statistiques</h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    <div class="bg-indigo-50 rounded-lg p-4 text-center">
                                        <div class="text-3xl font-bold text-indigo-600 mb-1">8</div>
                                        <div class="text-sm text-gray-600">Services réservés</div>
                                    </div>
                                    <div class="bg-green-50 rounded-lg p-4 text-center">
                                        <div class="text-3xl font-bold text-green-600 mb-1">5</div>
                                        <div class="text-sm text-gray-600">Prestataires</div>
                                    </div>
                                    <div class="bg-yellow-50 rounded-lg p-4 text-center">
                                        <div class="text-3xl font-bold text-yellow-600 mb-1">2</div>
                                        <div class="text-sm text-gray-600">Avis publiés</div>
                                    </div>
                                    <div class="bg-blue-50 rounded-lg p-4 text-center">
                                        <div class="text-3xl font-bold text-blue-600 mb-1">1400€</div>
                                        <div class="text-sm text-gray-600">Total dépensé</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.querySelector('.fa-bars').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
            } else {
                sidebar.classList.add('hidden');
            }
        });
    </script>
</body>
</html>