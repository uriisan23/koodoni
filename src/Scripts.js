
var textOnSubmit = document.getElementById('texto_submit');


function sendContact(e)
{
    
    e.preventDefault();
    
    var nombre = Contact.name.value.trim();
    var lastname = Contact.lastname.value.trim();
    var mail = Contact.mail.value.trim();
    var phone = parseInt(Contact.phone.value.trim());
    var message = Contact.message.value.trim();
   

    if (nombre.length == 0 || lastname.length == 0 || message.length == 0)
       {
         textOnSubmit.innerHTML = "Todos los campos son obligatorios";
         document.getElementById('mensaje_envio').className = "mostrar";
         return;
       } 


   
   var data = "name=" +  nombre +  "&mail=" +  mail + "&phone=" +  phone + "&message=" +  message ;

   var Request = new XMLHttpRequest();
   
    Request.open("post", 'api/koodonicontact.php');
 

    Request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");




    Request.onload = function()
    {
        Contact.name.value = "";
        Contact.lastname.value = "";
        Contact.mail.value = "";
        Contact.phone.value = "";
        Contact.message.value = "";

        console.log(Request.responseText);
      

        textOnSubmit.innerHTML = "Gracias por su visita, en breve nos contactaremos con usted";
        document.getElementById('mensaje_envio').className = "mostrar";
    }

    Request.onerror= function()
    {
        console.log(JSON.parse(Request.responseText));
    }

    Request.send(data);   
     
}

function unsetItem(){
    
    textOnSubmit.innerHTML = "";
    document.getElementById('mensaje_envio').className = "ocultar";
}

Contact.addEventListener('submit', function (e) {sendContact(e) });