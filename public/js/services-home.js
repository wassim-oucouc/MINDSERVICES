let ButtonSearch = document.querySelector('#ButtonSearch');

let services = document.querySelector('#services');

let pagination = document.querySelector('#pagination');


let FiltrageButton = document.querySelector('#fitrage');


//add event listener pour button de recherche
ButtonSearch.addEventListener('click',function(event){
event.preventDefault();
    $data = new FormData(document.querySelector('#searchForm'));
    SendDataSearch($data);
});



FiltrageButton.addEventListener('click',function(event){
    event.preventDefault();

    $datafiltrage = new FormData(document.querySelector('#filtreform'));
    SendDataFiltre($datafiltrage);


})





// Recherche par service et ville
async function SendDataSearch($data) {
    try
    {
        let response = await fetch('/services',{
            method : 'POST',
            headers: {
                'Accept': 'application/json',
            },
            body : $data
        });

        let json = await response.json();
        console.log(json.message);
        HandleSectionServices(json.message)
        
        }
    catch(Error)
    {
        console.log(Error);
    }
}





async function SendDataFiltre($data)
{
    try
    {
        let response = await fetch('/services',{
            method : 'POST',
            headers: {
                'Accept': 'application/json',
            },
            body : $data
        });

        let json = await response.json();

        console.log(json.services);

        HandleSectionServices(json.services)
    }
    catch(Error)
    {
        console.log(Error)
    }
}

 function HandleSectionServices($array)
 {
    services.innerHTML = "";
    pagination.style.display = "none";


                $array.forEach(element => {
                   
                    services.innerHTML += `
        <div class="bg-white shadow rounded-lg overflow-hidden">
                   <img src="/storage/${element.Photo}" alt="${element.titre}" class="w-full h-48 object-cover">
                   <div class="p-4">
                       <h2 class="text-lg font-medium text-gray-900">${element.titre}</h2>
                       <div class="flex items-center mt-1">
                           <div class="flex text-yellow-400">
                          ${function()
                            {
                                let star= "";
                                for(let i = 1 ; i <= 5 ; i++)
                                {
                                if(element.Note_avg >= i)
                                {
                                    star += '<i class="fas fa-star"></i>';
                                }
                                else
                                {
                                   star += '<i class="far fa-star"></i>';
                                }
                                }
                                return star;
                          }()}
                           </div>
                           <span class="ml-1 text-sm text-gray-500">${function(){
                            if(!element.Note_avg)
                            {
                                return 0;
                            }
                            else
                            {
                                return element.Note_avg;
                            }
                           }()} (${element.note_count} avis)</span>
                       </div>
                       <p class="mt-1 text-sm text-gray-500">
                           <i class="fas fa-map-marker-alt mr-1"></i> Ville ${element.Ville} • <span class="text-green-600">${element.categorieNom}</span>
                       </p>
                       <p class="mt-1 text-sm text-gray-700">
                       ${element.Description}
                       </p>
                       <div class="mt-4 flex justify-between items-center">
                           <p class="text-sm font-medium text-gray-900">À partir de ${element.Prix}€/h</p>
                           <a href="/service/details/${element.id}">
                           <button class="mt-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                               Détails
                           </button>
                           </a>
                       </div>
                   </div>
               </div>`;
                });



 }

 function validation()
 {
    let validation = true;
 }
