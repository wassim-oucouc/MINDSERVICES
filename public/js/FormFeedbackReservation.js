let rating = document.querySelector('#rating');

let comment = document.querySelector('#comment');


document.getElementById('give-review-button').addEventListener('click', function() {
    document.getElementById('review-modal').classList.remove('hidden');
});

document.getElementById('close-modal').addEventListener('click', function() {
    document.getElementById('review-modal').classList.add('hidden');
});

window.addEventListener('click', function(event) {
    const modal = document.getElementById('review-modal');
    if (event.target === modal) {
        modal.classList.add('hidden');
    }
});


let avis_submit = document.querySelector('#avis-submit');

avis_submit.addEventListener('click',function(event){
    event.preventDefault();
    if(validation())
    {
        document.querySelector('#avis-form').submit();
    }
});


function validation()
{
    let validate = true;

    if(rating.value.length == 0)
    {
        validate = false;
        rating.style.borderColor = "red";
    }
    if(comment.value.length == 0)
    {
        validate = false;
        comment.style.borderColor = "red";
    }

    return validate;
}



