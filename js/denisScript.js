// front validation 
window.addEventListener('load', function () {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
}, false);

// toggle display organization
var type = document.getElementById('type_pass');
var div = document.getElementById('const_pass');

type.addEventListener('click', function(){
    if(type.value === 'temp'){
        div.style.display = 'none';
    } else {
        div.style.display = 'flex';
    }
});

//set default for create_date and expire_date
var begin = document.getElementById('create_date');
var end = document.getElementById('expire_date');

type.addEventListener('click', function(){
    if(type.value === 'temp'){
        end.value = begin.value;
    }
    if(type.value === 'const'){
        end.value = "2020-06-14";
    }
    end.setAttribute("readonly", "readonly");
})

// toggle display troika/social_card
var troika = document.getElementById('troika');
var social_card = document.getElementById('social_card');

troika.addEventListener('input', function(){
    if(troika.value != ''){
        social_card.setAttribute("disabled", null);
    }else {
        social_card.removeAttribute("disabled");
    }
})

social_card.addEventListener('input', function(){
    if(social_card.value != ''){
        troika.setAttribute("disabled", null);
    }else {
        troika.removeAttribute("disabled");
    }
});

// toggle display transport checkbox
var worker = document.getElementById('worker');
var personal = document.getElementById('personal');
var notworker = document.getElementById('notworker');
var public = document.getElementById('public');

worker.addEventListener('change', function(){
    if(worker.checked){
        personal.style.display = 'flex';
        notworker.setAttribute('disabled', null);
    }else {
        personal.style.display = 'none';
        notworker.removeAttribute('disabled');
    }
})

notworker.addEventListener('change', function(){
    if(notworker.checked){
        public.style.display = 'flex';
        worker.setAttribute('disabled', null);
    }else {
        public.style.display = 'none';
        worker.removeAttribute('disabled');
    }
})








