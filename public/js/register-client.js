function ValidationForm() {

    let prenom = document.querySelector('#prenom-error');
    let nom = document.querySelector('#nom-error');
    let email = document.querySelector('#email-error');
    let password = document.querySelector('#password-error');
    let telephone = document.querySelector('#telephone-error');
    let image = document.querySelector('#image-error');



    let NomInput = document.querySelector('#nom').value;
    let PrenomInput = document.querySelector('#prenom').value;
    let EmailInput = document.querySelector('#email').value;
    // console.log(EmailInput)
    let PasswordInput = document.querySelector('#password').value;
    let PhoneInput = document.querySelector('#phone').value;
    let PhotoInput = document.querySelector('#Photo').value;
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

    return isvalid;

}


let Inscription = document.querySelector('#inscription');


Inscription.addEventListener('click',function(event){
    event.preventDefault()

    if(!ValidationForm())
    {
        event.preventDefault()
    }

    else
    {
        document.querySelector('#clientForm').submit();
    }


})