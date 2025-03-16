console.log('hello');




const form1 = document.querySelector('#firstform');
const form2 = document.querySelector('#secondform');
const ButtonSuivant = document.querySelector('#suivant');
const ButtonRetour = document.querySelector('#retour');
const ButtonInscription = document.querySelector('#inscription');

let Array = [];
form2.style.display = "none";

ButtonInscription.addEventListener('click', function (event) {
    event.preventDefault()
    if (!ValidationFormSecond()) {
        event.preventDefault()
        console.log('soso');
    }
    else {
        document.getElementById("fullForm").submit();
    }
});

ButtonSuivant.addEventListener('click', function (event) {
    event.preventDefault()
    if (ValidationFormFirst()) {
        console.log('hello');
        if (form1.style.display = "block") {
            document.querySelector('#dop').classList.toggle('active');
            document.querySelector('#text-etape').textContent = "Étape 2 : Informations Fiscal"
            form1.style.display = "none";
            form2.style.display = "block";
        }
    }
    else
    {
        event.preventDefault();
    }





});

ButtonRetour.addEventListener('click', function () {
    if (form2.style.display = "block") {
        document.querySelector('#dop').classList.toggle('active');
        document.querySelector('#text-etape').textContent = "Étape 1 : Informations de base"
        form2.style.display = "none";
        form1.style.display = "block";
    }
})




function ValidationFormFirst() {

    let prenom = document.querySelector('#prenom-error');
    let nom = document.querySelector('#nom-error');
    let email = document.querySelector('#email-error');
    let password = document.querySelector('#password-error');
    let telephone = document.querySelector('#telephone-error');
    let image = document.querySelector('#image-error');
    let service = document.querySelector('#service-error');



    let NomInput = document.querySelector('#nom').value;
    let PrenomInput = document.querySelector('#prenom').value;
    let EmailInput = document.querySelector('#email').value;
    // console.log(EmailInput)
    let PasswordInput = document.querySelector('#password').value;
    let PhoneInput = document.querySelector('#phone').value;
    let PhotoInput = document.querySelector('#Photo').value;
    let serviceInput = document.querySelector('#service').value;
    const RegexName = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]{2,50}$/;

    const RegexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    const RegexPassword = /^.{8,}$/;

    let isvalid = true;

    if (PrenomInput == "" || !RegexName.test(PrenomInput)) {
        prenom.textContent = "Enter a Valid Prenom";
        document.querySelector('#prenom').style.borderColor = "red";
        console.log(nom);
        isvalid = false;
    }
    else {
        prenom.textContent = "";
        document.querySelector('#prenom').style.borderColor = "green";
    }

    if (NomInput == "" || !RegexName.test(NomInput)) {
        nom.textContent = "Enter a Valid Name";
        console.log(nom);
        isvalid = false;
    }
    else {
        nom.textContent = "";
        document.querySelector('#nom').style.borderColor = "green";
    }

    if (EmailInput == "" || !RegexEmail.test(EmailInput)) {
        console.log('hello')
        email.textContent = "Enter a Valid Email";
        document.querySelector('#email').style.borderColor = "red";
        console.log(email)
        isvalid = false;
    }
    else {
        email.textContent = "";
        document.querySelector('#email').style.borderColor = "green";
    }

    if (!RegexPassword.test(PasswordInput) || PasswordInput == "") {
        password.textContent = "Enter a Valid Password";
        document.querySelector('#password').style.borderColor = "red";
        isvalid = false;
    }
    else {
        password.textContent = "";
        document.querySelector('#password').style.borderColor = "green";

    }
    if (PhoneInput.length < 9 || PhoneInput == "") {
        telephone.textContent = "Enter a Valid Number";
        document.querySelector('#phone').style.borderColor = "red";
        isvalid = false;
    }
    else {
        telephone.textContent = "";
        document.querySelector('#phone').style.borderColor = "green";
    }

    if (PhotoInput.length == 0) {
        image.textContent = "Upload Image";
        document.querySelector('#Photo').style.borderColor = "red";
        isvalid = false;

    }
    else {
        image.textContent = "";
        document.querySelector('#Photo').style.borderColor = "green";
    }
    if (serviceInput == "") {
        service.textContent = "Choisi Service Principale";
        document.querySelector('#service').style.borderColor = "green";
        isvalid = false;
    }
    else {
        service.textContent = "";
        document.querySelector('#service').borderColor = "red";
    }

    return isvalid;

}


function ValidationFormSecond() {
    let AdresseInput = document.querySelector('#adresse').value;
    let VilleInput = document.querySelector('#Ville').value;
    console.log(document.querySelector('#Ville'));
    let PostalCodeInput = document.querySelector('#PostalCode').value;
    let PaysInput = document.querySelector('#pays').value;

    let adress = document.querySelector('#adresse-error');
    let ville = document.querySelector('#ville-error');
    let postal = document.querySelector('#postal-error');
    let pays = document.querySelector('#pays-error');

    let isvalid = true;

    if (AdresseInput == "") {
        adress.textContent = "Enter A valid Address";
        console.log(document.querySelector('#adresse'));
        document.querySelector('#adresse').style.borderColor = "red";
        isvalid = false;
    }
    else {
        adress.textContent = "";
        document.querySelector('#adresse').style.borderColor = "green";
    }

    if(VilleInput == "" || VilleInput.length < 2)
    {
        console.log('fifi')
        ville.textContent = "Enter A valid City";
        document.querySelector('#Ville').style.borderColor = "red";
        isvalid = false;
    }
    else
    {
        ville.textContent = "";
        document.querySelector('#Ville').style.borderColor = "green";
    }

    if(isNaN(PostalCodeInput) || PostalCodeInput == "" || PostalCodeInput.length < 4 )
    {
        postal.textContent = "Enter A valid PostalCode";
        document.querySelector('#PostalCode').style.borderColor = "red";
        isvalid = false;
    }
    else
    {
        postal.textContent = "";
        document.querySelector('#PostalCode').style.borderColor = "green";
    }
    if(PaysInput == "")
    {
        pays.textContent = "Enter A valid Country";
        document.querySelector('#pays').style.borderColor = "red";
        isvalid = false;
    }
    else
    {
        pays.textContent = "";
        document.querySelector('#pays').style.borderColor = "green";
    }


    console.log(isvalid);
    return isvalid;

}