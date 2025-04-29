@extends('layout.Prestataire')

@section('Paramètres', 'flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600')

@section('title', 'Settings')

@section('content')
        
        <main class="main-content flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">Paramètres du Compte</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher..." class="bg-gray-100 rounded-full py-2 px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white">
                        <i class="fas fa-search absolute right-3 top-2.5 text-gray-500"></i>
                    </div>
                    <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                    </button>
                    <button class="p-2 text-gray-500 hover:text-indigo-600 focus:outline-none">
                        <i class="fas fa-cog text-xl"></i>
                    </button>
                </div>
            </header>

            <!-- Settings Content -->
             
            <div class="p-6 fade-in">
            @if ($errors->any())
    <div class="max-w-md mt-4 space-y-3">
        @foreach ($errors->all() as $error)
            <div class="flex items-center gap-2 px-4 py-3 bg-red-100 border border-red-300 text-red-800 rounded-lg shadow-sm">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <span class="text-sm font-medium">{{ $error }}</span>
            </div>
        @endforeach
    </div>
@endif
            @if (session('infosupdated'))
    <div class="w-full max-w-2xl mt-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow-sm flex items-center gap-2">
        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
        <span class="text-sm font-medium">
            {{ session('infosupdated') }}
        </span>
    </div>
@endif
            @if (session('email'))
        <div class="flex items-center gap-2 px-4 py-3 bg-red-100 border border-red-300 text-red-800 rounded-lg shadow-sm">
            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                 d="M6 18L18 6M6 6l12 12"></path></svg>
            <span class="text-sm font-medium">{{ session('email') }}</span>
        </div>
    @endif

                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Informations du Compte</h3>
                        
                        <form action="{{ route('update.prestataire') }}" method="POST">
                        @csrf  
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                                    <input value ="{{Auth::user()->Prenom}}" type="text" id="first_name" name="first_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="Jean">
                                </div>
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Nom</label>
                                    <input value = "{{Auth::user()->Nom}}" type="text" id="last_name" name="last_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="Dupont">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input value = "{{Auth::user()->Email}}" type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                                    <input type="tel" id="phone" name="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value = "{{$phone->Numero_Telephone}}">
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">Enregistrer les modifications</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
                @if (session('password'))
        <div class="flex items-center gap-2 px-4 py-3 bg-red-100 border border-red-300 text-red-800 rounded-lg shadow-sm">
            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                 d="M6 18L18 6M6 6l12 12"></path></svg>
            <span class="text-sm font-medium">{{ session('password') }}</span>
        </div>
    @endif
    @if (session('passwordchanged'))
        <div class="flex items-center gap-2 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow-sm">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                 d="M5 13l4 4L19 7"></path></svg>
            <span class="text-sm font-medium">{{ session('passwordchanged') }}</span>
        </div>
    @endif
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Changer le Mot de Passe</h3>
                        <form action = "{{Route('update.password')}}" method = "POST">
                            @csrf 
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700">Mot de passe actuel</label>
                                    <input type="password" id="current_password" name="current_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="new_password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                                    <input type="password" id="new_password" name="new_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmer le nouveau mot de passe</label>
                                    <input type="password" id="confirm_password" name="confirm_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">Changer le mot de passe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
                @if (session('imagechanged'))
        <div class="flex items-center gap-2 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded-lg shadow-sm">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                 d="M5 13l4 4L19 7"></path></svg>
            <span class="text-sm font-medium">{{ session('imagechanged') }}</span>
        </div>
    @endif  
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Changer la Photo de Profil</h3>
                        <form action = "{{route('update.image')}}" method = "POST" enctype="multipart/form-data">
                            @csrf 
                            @method('PUT')
                            <div class="flex items-center mb-6">
                                <div class="profile-image-container">
                                    <img id = "image_user" src="/storage/{{Auth::user()->Photo}}" 
                                         alt="Admin Profile" class="w-20 h-20 rounded-full border-4 border-white object-cover shadow-md">
                                </div>
                                <div class="ml-4">
                                    <label for="profile_image" class="block text-sm font-medium text-gray-700">Télécharger une nouvelle photo</label>
                                    <input type="file" id="profile_image" name="profile_image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">Changer la photo de profil</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Supprimer le Compte</h3>
                        <p class="text-sm text-gray-600 mb-4">Attention : Cette action est irréversible. Toutes vos données seront supprimées définitivement.</p>
                        <div class="flex items-center justify-between">
                            <button type="button" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">Supprimer le compte</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
      let inputimage = document.querySelector('#profile_image');
        let profileimage = document.querySelector('#image_user');


        inputimage.addEventListener("change",function(){
            let url = URL.createObjectURL(inputimage.files[0]);
            profileimage.src = url
            console.log(url);
        });
        
    </script>
</body>
</html>
@endsection