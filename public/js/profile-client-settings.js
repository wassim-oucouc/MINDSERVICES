
let Photo = document.querySelector('#photo');
let Prenom = document.querySelector('#prenom');
let Nom = document.querySelector('#nom');
let email = document.querySelector('#email');
let numero = document.querySelector('#telephone');
let pays = document.querySelector('#pays');

let current_password = document.querySelector('#current-password');
let nouveau_password = document.querySelector('#password');
let password_confirm = document.querySelector('#password-confirm');

console.log(document.querySelector('#banner'));

function ClearErrors()
{
     document.querySelector('.ul_errors').innerHTML = "";
}

function toggleRedBanner() {
    document.querySelector('#banner')
    .classList.add('mb-4');
  document.querySelector('#banner')
    .classList.add('p-3');
  document.querySelector('#banner')
    .classList.add('bg-red-100');
  document.querySelector('#banner')
    .classList.add('border');
  document.querySelector('#banner')
    .classList.add('border-red-400');
  document.querySelector('#banner')
    .classList.add('text-red-700');
  document.querySelector('#banner')
    .classList.add('rounded');  }

    function togglegreenBanner() {
        document.querySelector('#banner')
        .classList.add('mb-4');
      document.querySelector('#banner')
        .classList.add('p-3');
      document.querySelector('#banner')
        .classList.add('bg-green-100');
      document.querySelector('#banner')
        .classList.add('border');
      document.querySelector('#banner')
        .classList.add('border-green-400');
      document.querySelector('#banner')
        .classList.add('text-green-700');
      document.querySelector('#banner')
        .classList.add('rounded');  }

function showError(message)
{
    let ul = document.querySelector('.ul_errors');

    let errorlist = document.createElement('li');

    errorlist.textContent = message;
    ul.appendChild(errorlist);
}
function Validation()
{
    let PrenomExpression = /^[A-Za-zÀ-ÿ-]+$/;
    let NomExpression = /^[A-Za-zÀ-ÿ\s-]+$/;
    let EmailExpression = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    let NumeroExpression = /^\+?[0-9]{1,4}?[ -]?[0-9]{10}$/;

    let validate = true;


    if(Prenom.value == '' || !PrenomExpression.test(Prenom.value.trim()))
    {
        showError('Prenom invalide (lettres et tirets uniquement).');
        toggleRedBanner()        
        validate = false;
    }

  
    if(Nom.value == '' || !NomExpression.test(Nom.value.trim()))
    {
        showError('Nom invalide (lettres et tirets uniquement)');
        toggleRedBanner();
        validate = false;
    }
    if(numero.value == '' || !NumeroExpression.test(numero.value.trim()))
        {
            showError('Numéro de téléphone invalide (ex: +212600000000)');
            toggleRedBanner();
            validate = false;
        }
        if (pays.value.trim() === ''){
            showError("Le champ pays est requis");
            validate = false;
        }

        if (current_password.value.trim() !== ''){
            if (nouveau_password.value.trim().length < 8) {
                showError("Le nouveau mot de passe doit contenir au moins 8 caractères");
                toggleRedBanner();
                validate = false;
            }
        }

            if (nouveau_password.value !== password_confirm.value) {
                showError("La confirmation du mot de passe ne correspond pas");
                toggleRedBanner();
                validate = false;
            }

            return validate;

}

document.querySelector('#submit').addEventListener('click',function(event){
    // console.log(document.querySelector('#form'));
    event.preventDefault();
    ClearErrors();
    if(Validation())
    {

    let formdata = new FormData(document.querySelector('#form'));
    SendFormData(formdata);


}
});



async function SendFormData(data)
    {
try
{
    let response = await fetch('/client/settings',{
        method : 'POST',
        headers: {
            'Accept': 'application/json',
        },
        body : data
    });
    
    let json = await response.json();
    console.log(json);

    if(json.message == 'Profile updated successfully!')
    {
       document.querySelector('#banner').className = "";
        let greenmessage = document.createElement('li');
        let ul = document.querySelector('.ul_errors');
        togglegreenBanner();
        greenmessage.textContent = json.message;
    ul.appendChild(greenmessage);

    }

    if(json.errors)
    {
        toggleRedBanner();
        Object.keys(json.errors).forEach(element => {
            json.errors[element].forEach(error =>{
                showError(error)
            })
        });
    }

    



}

catch(error)
{
    console.log(error);
}
    }
