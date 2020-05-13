//------изменение стилей пунктов меню при клике----
/*  console.log(document.location);
let pageHref = window.location.href;
navLinks = document.getElementsByClassName('nav-link');
for (let i=0; i < navLinks.length; i++) {
    if( 
        navLinks[i].href == pageHref 

    ){
        navLinks[i].classList.add('active');
        
    }
} 
  */


//------------Открытие и закрытие блока работодатель-------
let type_pass = document.getElementById("type_pass");
let container = document.getElementById("depend_pass");
let start = document.getElementById('start_date');
let end = document.getElementById('end_date');
if(type_pass.value === 'permanent'){
    container.hidden = false;
}else{
    container.hidden = true;
    end.value = start.value;
    start.addEventListener('input', handlerDate); 
}

type_pass.addEventListener('click', handler);
function handler() {
    if (type_pass.value === 'permanent'){
        container.hidden = false;
    }   
    if(type_pass.value === 'temporary'){
        container.hidden = true;
    }
    
}
//----------------------------Открытие и закрытие блоков Личный и Общественный транспорт-------------------------------------------------------------

let parentPublic = document.getElementById('parentPublic');
let auto = document.getElementById('auto');
if(document.getElementById('personal').checked){
   auto.hidden = false;
}else{
    auto.hidden = true; 
}
//----------------------------------------------------------------
let social_card = document.getElementById('social_card');
let troika = document.getElementById('troika_card');
if(social_card.value != ""){
    troika.setAttribute("readonly", "readonly");
}
if(troika.value != ""){
    social_card.setAttribute("readonly", "readonly");
}
//---------------------------------------------------------------


let publicTransport = document.getElementById('public_transport');
if(document.getElementById('public').checked){
    publicTransport.hidden = false;
 }else{
    publicTransport.hidden = true; 
 }


let containTransport = document.getElementById('transport');
containTransport.addEventListener('change', handlerCheckBox);
function handlerCheckBox(event) {
    if(event.target.id === 'personal'){
        let parentPersonal = document.getElementById('parentPersonal');
        if(event.target.checked){
                auto.hidden = false;
            }
            else
            {
                auto.hidden = true;
            }
       
        }



     if(event.target.id === 'public'){
        let parentPersonal = document.getElementById('parentPublic');
        if(event.target.checked){

            publicTransport.hidden = false;

            
            troika.addEventListener('input', handlerPublicTransportTroika);
            function handlerPublicTransportTroika() {
                
                if(troika.value != ''){
                    social_card.setAttribute("readonly", "readonly");
                }else {
                    social_card.removeAttribute("readonly");
                }
            }

            social_card.addEventListener('input', handlerPublicTransportCard);

            function handlerPublicTransportCard() {
               if(social_card.value != ''){
                troika.setAttribute("readonly", "readonly");
               }else {
                troika.removeAttribute("readonly");
            }
              
               
            }
        }
        else
        {
            publicTransport.hidden = true;
 
        }
                
    } 
    
}
//----------------------------------Установка срока дейстия пропусков---------------------------------
let typePass = document.getElementById('type_pass');


if(typePass.value ==='permanent'){
    end.value = "2020-05-31";
}
if(typePass.value ==='temporary'){
    end.value = start.value;
}
typePass.addEventListener('change', handlerTypePass)

function handlerTypePass() {
    
    if(typePass.value === 'permanent'){
        end.value = "2020-05-31";
        start.removeEventListener('input', handlerDate);
    }
    if(typePass.value === 'temporary'){
        
        end.value = start.value;
        start.addEventListener('input', handlerDate); 
    }
}


end.setAttribute("readonly", "readonly");


function handlerDate() {
    end.value = start.value;
}



//-----------------------------------------------------------
troika.addEventListener('input', handlerPublicTransportTroika);
function handlerPublicTransportTroika() {
    
    if(troika.value != ''){
        social_card.setAttribute("readonly", "readonly");
    }else {
        social_card.removeAttribute("readonly");
    }
}

social_card.addEventListener('input', handlerPublicTransportCard);

function handlerPublicTransportCard() {
   if(social_card.value != ''){
    troika.setAttribute("readonly", "readonly");
   }else {
    troika.removeAttribute("readonly");
}
  
   
}


