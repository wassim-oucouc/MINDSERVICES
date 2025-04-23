let button_continuer = document.querySelector('#button_continuer');

let Date_pick = document.querySelector('#date-picker');

let time_select = document.querySelector('#time-select');

 validation = true;




let service_id = document.querySelector('#service_id');

let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');



Date_pick.addEventListener("change", function () {
    if (ValidationInput()) {
        SendDateTime(Date_pick.value, time_select.value)

    }

});

time_select.addEventListener("change", function () {

    if (ValidationInput()) {
        SendDateTime(Date_pick.value,time_select.value)
    }

});

button_continuer.addEventListener('click',function(event){
    event.preventDefault();

    if (ValidationInput() && validation) {
    document.querySelector('#reservation_date').value = Date_pick.value;
    document.querySelector('#reservation_time').value = time_select.value;
        document.querySelector('#reservation').submit();
    }
    else {
        document.querySelector('#time-select').style.borderColor = "red";
        document.querySelector('#date-picker').style.borderColor = "red";
        event.preventDefault();
    }
});

async function SendDateTime(date, time){
    try {
        let response = await fetch(`/reservation/${service_id.value}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                date: date,
                time: time
            }), 

        });
        let json = await response.json();
        ResponseFront(json)
    }
    catch (Error) {
        console.log(Error)
    }
}



function ResponseFront(data) {
    validation = true
    if (data.error_date == 'Already Taked Date') {
        document.querySelector('#date-picker').style.borderColor = "red";
        document.querySelector('#time-select').style.borderColor = "red";
        validation = false;
    }
    if (data.valide_date == 'Date Never Taked') {
        document.querySelector('#date-picker').style.borderColor = "green";
        document.querySelector('#time-select').style.borderColor = "green";
        validation = true;
    }

    return validation;
}

function ValidationInput() {
    let validate = true;
    if (time_select.value.length == 0) {
        document.querySelector('#time-select').style.borderColor = "red";
        validate = false;
    }
    else {
        document.querySelector('#time-select').style.borderColor = "green";
        validate = true;
    }
    if (Date_pick.value.length == 0) {
        document.querySelector('#date-picker').style.borderColor = "red";
        validate = false;
    }
    else {
        document.querySelector('#date-picker').style.borderColor = "green";
        validate = true;
    }

    return validate;
}



