<!DOCTYPE html>
<html lang="fr">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINDSERVICES - Choisissez votre type de compte</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-poppins bg-gray-100 text-gray-800">
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="index.html" class="flex-shrink-0 flex items-center">
                    <h1 class="text-xl font-bold text-indigo-600 cursor-pointer">MIND<span class="text-indigo-800">SERVICE</span></h1>
                </a>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="index.html" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Accueil</a>
                    <a href="services.html" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Services</a>
                    <a href="providers.html" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Prestataires</a>
                    <a href="about.html" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">À propos</a>
                    <a href="contact.html" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium">Contact</a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-4">
                <a class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium" href="#">Connexion</a>
                <a class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition-colors" href="professional-register.html">Espace Professionnel</a>
                <a class="bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-700 transition-colors" href="client-register.html">Espace Client</a>
            </div>
        </div>
    </div>
</nav>

<!-- Account Type Selection Section -->
<section class="py-10">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="p-10">
                <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">Choisissez votre type de compte</h2>
                <p class="text-gray-600 mb-8 text-center">Sélectionnez le type de compte que vous souhaitez créer.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col items-center p-6 bg-indigo-100 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                        <i class="fas fa-user-circle text-indigo-600 text-5xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-800">Compte Client</h3>
                        <p class="text-gray-600 text-center">Accédez à des services personnalisés et trouvez les meilleurs professionnels.</p>
                        <a href="client-register.html" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition-colors">Créer un compte Client</a>
                    </div>
                    <div class="flex flex-col items-center p-6 bg-green-100 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                        <i class="fas fa-briefcase text-green-600 text-5xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-800">Compte Professionnel</h3>
                        <p class="text-gray-600 text-center">Inscrivez-vous pour offrir vos services et atteindre de nouveaux clients.</p>
                        <a href="professional-register.html" class="mt-4 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors">Créer un compte Professionnel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-white border-t border-gray-200 mt-10">
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <p class="text-sm text-gray-500">&copy; 2025 MINDSERVICE. Tous droits réservés.</p>
        </div>
    </div>
</footer>
</body>
</html>