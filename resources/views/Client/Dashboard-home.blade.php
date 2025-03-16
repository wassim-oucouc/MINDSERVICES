<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINDSERVICES - Espace Client</title>
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
                    <a href="client-dashboard.html" class="flex items-center space-x-3 px-4 py-3 rounded-lg active-nav-item bg-indigo-100 text-indigo-600">
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
                    <a href="client-profile.html" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-indigo-600 transition-colors">
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
                    <h2 class="text-xl font-semibold text-gray-800">Tableau de Bord</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                    </button>
                </div>
            </header>

            <!-- Dashboard content -->
            <div class="p-6 fade-in">
                <!-- Welcome Message -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 mb-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Bienvenue, Paul Martin 👋</h3>
                            <p class="text-gray-600 mt-1">Heureux de vous revoir sur votre espace personnel</p>
                        </div>
                        <button class="mt-4 md:mt-0 bg-indigo-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-indigo-700 transition-colors">
                            <i class="fas fa-plus"></i>
                            <span>Prendre Rendez-vous</span>
                        </button>
                    </div>
                </div>

                <!-- Stats cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Rendez-vous</p>
                                <h3 class="text-2xl font-bold">12</h3>
                                <p class="text-xs text-indigo-500 mt-2 flex items-center">
                                    <i class="fas fa-calendar-check mr-1"></i> 3 Confirmés
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                                <i class="fas fa-calendar-check text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Prochain Rendez-vous</p>
                                <h3 class="text-lg font-bold">14 Mars 2025</h3>
                                <p class="text-xs text-indigo-500 mt-2 flex items-center">
                                    <i class="fas fa-clock mr-1"></i> 10:00 - Coaching
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center">
                                <i class="fas fa-hourglass-half text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Messages</p>
                                <h3 class="text-2xl font-bold">2</h3>
                                <p class="text-xs text-red-500 mt-2 flex items-center">
                                    <i class="fas fa-envelope mr-1"></i> Non lus
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-red-500 flex items-center justify-center">
                                <i class="fas fa-comments text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Factures</p>
                                <h3 class="text-2xl font-bold">3</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-check-circle mr-1"></i> Toutes payées
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center">
                                <i class="fas fa-file-invoice-dollar text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Appointments -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-6">
                    <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="font-semibold text-gray-900">Prochains Rendez-vous</h3>
                        <a href="client-appointments.html" class="text-indigo-600 text-sm hover:text-indigo-800">
                            Voir tout <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                    <div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Heure</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prestataire</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Appointment 1 -->
                                <tr class="table-row hover:bg-indigo-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">14/03/2025</div>
                                        <div class="text-xs text-gray-500">10:00 - 11:30</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 flex-shrink-0">
                                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1364&auto=format&fit=crop" alt="Provider" class="h-8 w-8 rounded-full object-cover">
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">Camille Laurent</div>
                                                <div class="text-xs text-gray-500">Coach Sportif</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Séance de coaching personnalisé</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmé</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 mx-1">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Appointment 2 -->
                                <tr class="table-row hover:bg-indigo-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">15/03/2025</div>
                                        <div class="text-xs text-gray-500">11:00 - 13:00</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 flex-shrink-0">
                                                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1288&auto=format&fit=crop" alt="Provider" class="h-8 w-8 rounded-full object-cover">
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">Emma Bernard</div>
                                                <div class="text-xs text-gray-500">Photographe</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Séance photo professionnelle</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmé</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 mx-1">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <!-- Appointment 3 -->
                                <tr class="table-row hover:bg-indigo-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">20/03/2025</div>
                                        <div class="text-xs text-gray-500">14:00 - 15:00</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 flex-shrink-0">
                                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1287&auto=format&fit=crop" alt="Client" class="h-8 w-8 rounded-full object-cover">
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium text-gray-900">Lucas Petit</div>
                                                <div class="text-xs text-gray-500">Architecte d'intérieur</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Consultation design</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">En attente</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900 mx-1">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Two Columns Layout -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Recent Messages -->
                    <div class="md:col-span-1 bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="font-semibold text-gray-900">Messages Récents</h3>
                            <span class="text-xs text-gray-500">3 messages</span>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <!-- Message 1 -->
                            <div class="p-4 hover:bg-gray-50">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex items-center">
                                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1364&auto=format&fit=crop" alt="Sender" class="h-8 w-8 rounded-full object-cover mr-3">
                                        <div>
                                            <p class="font-medium text-gray-900">Camille Laurent</p>
                                            <p class="text-xs text-gray-500">Coach Sportif</p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-gray-500">Aujourd'hui</span>
                                </div>
                                <p class="text-sm text-gray-600 line-clamp-2">Bonjour Paul, je vous confirme notre rendez-vous de coaching personnalisé pour le 14 mars à 10h00. N'oubliez pas votre tenue de sport.</p>
                                <div class="mt-2">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">Nouveau</span>
                                </div>
                            </div>

                            <!-- Message 2 -->
                            <div class="p-4 hover:bg-gray-50">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex items-center">
                                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1288&auto=format&fit=crop" alt="Sender" class="h-8 w-8 rounded-full object-cover mr-3">
                                        <div>
                                            <p class="font-medium text-gray-900">Emma Bernard</p>
                                            <p class="text-xs text-gray-500">Photographe</p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-gray-500">Hier</span>
                                </div>
                                <p class="text-sm text-gray-600 line-clamp-2">Pour votre séance photo, pourriez-vous apporter 2-3 tenues différentes? Je vous conseille des couleurs unies qui passent bien à l'image.</p>
                                <div class="mt-2">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">Nouveau</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recommended Services -->
                    <div class="md:col-span-2 bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="font-semibold text-gray-900">Services Recommandés</h3>
                            <a href="client-services.html" class="text-indigo-600 text-sm hover:text-indigo-800">
                                Voir tout <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Service Card 1 -->
                            <div class="service-card bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                                <div class="h-32 w-full overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1434494878577-86c23bcb06b9?q=80&w=1770&auto=format&fit=crop" 
                                        alt="Coaching Service" class="w-full h-full object-cover">
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between">
                                        <div>
                                            <h4 class="font-medium text-gray-900">Programme Nutrition</h4>
                                            <p class="text-sm text-gray-600 mt-1">Plan alimentaire adapté à vos objectifs</p>
                                        </div>
                                        <div class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Santé</div>
                                    </div>
                                    <div class="flex items-center mt-3">
                                        <div class="flex text-yellow-400 text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-xs text-gray-500 ml-2">5.0 (32 avis)</span>
                                    </div>
                                    <div class="flex justify-between items-center mt-4">
                                        <span class="text-indigo-600 font-medium">À partir de 120€</span>
                                        <button class="bg-indigo-600 text-white px-3 py-1 rounded text-sm hover:bg-indigo-700 transition-colors">
                                            Réserver
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity and Invoices -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <!-- Recent Activity -->
                    <div class="md:col-span-2 bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="font-semibold text-gray-900">Activité Récente</h3>
                        </div>
                        <div class="p-4">
                            <div class="relative">
                                <!-- Timeline line -->
                                <div class="absolute top-0 left-4 h-full w-0.5 bg-gray-200"></div>
                                
                                <!-- Activity items -->
                                <div class="space-y-6">
                                    <!-- Activity 1 -->
                                    <div class="relative pl-10">
                                        <div class="absolute top-1 left-0 h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <i class="fas fa-calendar-check text-indigo-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Rendez-vous confirmé</h4>
                                            <p class="text-xs text-gray-500 mt-1">Vous avez confirmé votre rendez-vous avec Camille Laurent pour le 14 mars.</p>
                                            <span class="text-xs text-gray-400 mt-1 block">Aujourd'hui, 09:45</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Activity 2 -->
                                    <div class="relative pl-10">
                                        <div class="absolute top-1 left-0 h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                            <i class="fas fa-comments text-blue-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Nouveau message</h4>
                                            <p class="text-xs text-gray-500 mt-1">Vous avez reçu un message de Emma Bernard concernant votre séance photo.</p>
                                            <span class="text-xs text-gray-400 mt-1 block">Hier, 15:32</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Activity 3 -->
                                    <div class="relative pl-10">
                                        <div class="absolute top-1 left-0 h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                                            <i class="fas fa-file-invoice-dollar text-green-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Paiement effectué</h4>
                                            <p class="text-xs text-gray-500 mt-1">Vous avez payé la facture #INV-2025-003 d'un montant de 150€.</p>
                                            <span class="text-xs text-gray-400 mt-1 block">10 mars 2025, 11:20</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Activity 4 -->
                                    <div class="relative pl-10">
                                        <div class="absolute top-1 left-0 h-8 w-8 rounded-full bg-yellow-100 flex items-center justify-center">
                                            <i class="fas fa-calendar-plus text-yellow-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Nouveau rendez-vous</h4>
                                            <p class="text-xs text-gray-500 mt-1">Vous avez réservé un rendez-vous avec Lucas Petit pour le 20 mars.</p>
                                            <span class="text-xs text-gray-400 mt-1 block">05 mars 2025, 14:15</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Invoices -->
                    <div class="md:col-span-1 bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="font-semibold text-gray-900">Dernières Factures</h3>
                            <a href="client-invoices.html" class="text-indigo-600 text-sm hover:text-indigo-800">
                                Voir tout <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <!-- Invoice 1 -->
                            <div class="p-4 hover:bg-gray-50">
                                <div class="flex justify-between items-center mb-2">
                                    <div class="text-sm font-medium text-gray-900">#INV-2025-003</div>
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Payée</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-xs text-gray-500">Coaching Sportif</p>
                                        <p class="text-xs text-gray-500">10 mars 2025</p>
                                    </div>
                                    <div class="text-sm font-medium text-gray-900">150€</div>
                                </div>
                                <button class="mt-2 text-xs text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-download mr-1"></i> Télécharger
                                </button>
                            </div>

                            <!-- Invoice 2 -->
                            <div class="p-4 hover:bg-gray-50">
                                <div class="flex justify-between items-center mb-2">
                                    <div class="text-sm font-medium text-gray-900">#INV-2025-002</div>
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Payée</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-xs text-gray-500">Shooting Photo</p>
                                        <p class="text-xs text-gray-500">15 fév 2025</p>
                                    </div>
                                    <div class="text-sm font-medium text-gray-900">250€</div>
                                </div>
                                <button class="mt-2 text-xs text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-download mr-1"></i> Télécharger
                                </button>
                            </div>

                            <!-- Invoice 3 -->
                            <div class="p-4 hover:bg-gray-50">
                                <div class="flex justify-between items-center mb-2">
                                    <div class="text-sm font-medium text-gray-900">#INV-2025-001</div>
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Payée</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-xs text-gray-500">Développement Web</p>
                                        <p class="text-xs text-gray-500">05 jan 2025</p>
                                    </div>
                                    <div class="text-sm font-medium text-gray-900">650€</div>
                                </div>
                                <button class="mt-2 text-xs text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-download mr-1"></i> Télécharger
                                </button>
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