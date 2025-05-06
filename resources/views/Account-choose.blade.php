@extends('layout.app')

@section('title', 'Account Choose')
@section('content')

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
                        <a href="/client/register" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition-colors">Créer un compte Client</a>
                    </div>
                    <div class="flex flex-col items-center p-6 bg-green-100 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                        <i class="fas fa-briefcase text-green-600 text-5xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-800">Compte Professionnel</h3>
                        <p class="text-gray-600 text-center">Inscrivez-vous pour offrir vos services et atteindre de nouveaux clients.</p>
                        <a href="/pro/register" class="mt-4 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors">Créer un compte Professionnel</a>
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
@endsection