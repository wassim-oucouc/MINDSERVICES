@extends('layout.admin')

@section('Catégories', 'flex items-center space-x-3 px-4 py-3 rounded-lg bg-indigo-100 text-indigo-600')

@section('title', 'Catégories')
@section('content')
        <!-- Main Content -->
        <main class="main-content flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
            <!-- Top header -->
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button class="text-gray-500 hover:text-indigo-600 focus:outline-none mr-6">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl font-semibold text-gray-800">Gestion des Catégories</h2>
                </div>
             
            </header>

            <!-- Categories content -->
            <div class="p-6 fade-in">
                <!-- Stats cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Catégories</p>
                                <h3 class="text-2xl font-bold">{{$StatisticCategrie}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                                <i class="fas fa-tags text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                   
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total Services</p>
                                <h3 class="text-2xl font-bold">{{$service}}</h3>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 12% ce mois
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center">
                                <i class="fas fa-box text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @if(session('success'))
        <div class="w-full max-w-md my-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md flex justify-start items-center space-x-2" role="alert">
  <svg class="fill-current w-5 h-5 text-green-500 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11H9v4h2V7zm0 6H9v2h2v-2z" />
  </svg>
  <span><strong>Succès !</strong> {{session('success')}}</span>
</div>
@endif
                <!-- Action buttons -->
                <div class="flex flex-wrap items-center justify-between mb-6">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-indigo-700 transition-colors">
                            <a href="/admin/create/categorie    ">
                            <i class="fas fa-plus"></i>
                            <span>Ajouter Catégorie</span>
                            </a>
                        </button>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors">
                            <i class="fas fa-filter"></i>
                            <span>Filtres</span>
                        </button>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-gray-200 transition-colors">
                            <i class="fas fa-download"></i>
                            <span>Exporter</span>
                        </button>
                    </div>
                   
                </div>

<!-- Categories Table Container -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
   

    
<!-- Categories Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 mb-8">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center space-x-2">
                            <span>ID</span>
                        </div>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom Catégorie</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre de Produits</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($categories as $value)
                <tr class="table-row hover:bg-indigo-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm text-gray-900">{{$value->id}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="h-10 w-10 flex-shrink-0">
                            <img src="{{'/storage/' . $value->Photo}}" alt="Catégorie" class="h-10 w-10 rounded-full object-cover">
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{$value->Nom}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$value->COUNT}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{$value->created_at}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a target = "_blank" href="/categorie/services/{{$value->id}}">
                        <button class="text-indigo-600 hover:text-indigo-900 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>

                        </button>
</a>
                        <div>
                        <button onclick = "editcategorie({{$value->id}},{{json_encode($value->Nom)}},{{json_encode($value->Description)}},{{json_encode($value->Photo)}})" type = "submit" class="text-indigo-600 hover:text-indigo-900 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
</svg>
                        </button>
                        </div>
                        <form action="/admin/delete/categorie/{{$value->id}}" method = "POST">
                            @csrf
                            @method('DELETE')
                        <button type = "submit" class="text-red-600 hover:text-red-900 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>

                        </button>
                        </a>
                        </form>
                    </td>
                </tr>
                @endforeach
                
                
                
                
                <!-- Ajoutez plus de lignes selon vos besoins -->
            </tbody>
        </table>
    </div>
</div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-8">
                    <div class="text-sm text-gray-600">
                    {{$categories->links()}}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- Modal Backdrop -->
<div id="edit-modal-backdrop" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40 hidden flex items-center justify-center">
    <!-- Modal Container -->
    <div id="edit-category-modal" class="bg-white rounded-xl shadow-lg w-full max-w-xl mx-4 overflow-hidden transform transition-all">
        <!-- Modal Header -->
        <div class="px-6 py-4 bg-indigo-50 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">Modifier la catégorie</h3>
                <button type="button" class="text-gray-500 hover:text-gray-700 focus:outline-none" onclick="closeEditModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        @if($errors->any())
    <div class = "red_errors">
  <div class=" mx-auto my-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md">
    <ul class="list_errors list-disc pl-5">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  </div>
@endif
        
        <!-- Modal Content -->
        <div class="px-6 py-4">
            <form id="modal-edit-form" action = "/admin/categories" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id = "categorie_id">
                
                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label for="modal-name" class="block text-sm font-medium text-gray-700 mb-1">Nom de la catégorie <span class="text-red-600">*</span></label>
                        <input type="text" id="modal-name" name="name" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    
                    <!-- Description -->
                    <div>
                        <label for="modal-description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea id="modal-description" name="description" rows="3" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    </div>
                    
                    <!-- Image -->
                    <div>
                        <label for="modal-image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <input id="modal-image" name="image" type="file" class="block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-indigo-50 file:text-indigo-700
                            hover:file:bg-indigo-100">
                        <div id="current-image-preview" class="mt-2 h-20 w-20 bg-gray-100 rounded flex items-center justify-center">
                            <img id="preview-img" src="" alt="Aperçu" class="h-full w-full object-cover rounded ">
                        </div>
                    </div><div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
            <button type="button" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="closeEditModal()">
                Annuler
            </button>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" >
                Enregistrer
            </button>
                </div>
                
            </form>
        </div>
        
        <!-- Modal Footer -->
       
        </div>
    </div>
</div>


    <script>

        let name = document.querySelector('#modal-name');
        let description = document.querySelector('#modal-description');
        console.log(description)
        let image = document.querySelector('#preview-img');

        let categorie_id = document.querySelector('#categorie_id');

        let errors = document.querySelector('.list_errors');


        if(errors)
        {
            document.querySelector('#edit-modal-backdrop').classList.remove('hidden');
            let data = JSON.parse(localStorage.getItem('categorie'));
            console.log(data)

            categorie_id.value = data.id;
            name.value = data.Nom;
            description.value = data.Description;
            image.value = data.Photo;
        }
          function editcategorie(id,Nom,Description,Photo)
            {
                if(errors)
                {
                document.querySelector('.red_errors').innerHTML = '';
                }
                let categoriebject = {
                    id : id,
                    Nom : Nom,
                    Description : Description,
                    Photo : Photo
                };
                

                let categoriestringify = JSON.stringify(categoriebject);

                localStorage.setItem('categorie',categoriestringify);
                console.log(Nom);
                categorie_id.value = id;
                name.value = Nom;
                description.value = Description;
                image.src = '/storage/'+Photo;
                document.querySelector('#edit-modal-backdrop').classList.remove('hidden');
            }

            function closeEditModal()
            {
              
                document.querySelector('#edit-modal-backdrop').classList.add('hidden');


            }

        // Toggle sidebar
        document.querySelector('.fa-bars').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                mainContent.classList.remove('ml-0');
            } else {
                sidebar.classList.add('hidden');
                mainContent.classList.add('ml-0');
            }


        });
    </script>
</body>
</html>
@endsection