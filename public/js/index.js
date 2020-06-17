$(".modif_status").on("click", function () {
  var donnees = $(this).text(); // On créer une variable content le formulaire sérialisé
  var id = $(this).attr("data-id"); // On créer une variable content le formulaire sérialisé
  console.log(donnees);
  console.log(id);
  $.ajax({
    url: "ajax/handler.php",
    data: {
      status: donnees,
      id: id,
    },
    type: "POST",
    success: function (data) {
      // code_html contient le HTML renvoyé
      $("#reponseAjax").html(data);

        setTimeout(RedirectionDemande, 5000); //On attend 5 secondes avant d'exécuter la fonction
  
      function RedirectionDemande() {
        //Le code écrit dans cette fonction ne sera exécuté qu'au bout de 5 secondes 
        window.location.href = "http://localhost/tradegame/proposition.php";
      }
    },
  });
  return false;
});

$(".redirect").on("mousemove", function () {

  setTimeout(RedirectionIndex, 3000); //On attend 3 secondes avant d'exécuter la fonction

  function RedirectionIndex() {
    //Le code écrit dans cette fonction ne sera exécuté qu'au bout de 3 secondes 
    window.location.href = "http://localhost/tradegame/index.php";
  }
});

let btnPopup = document.getElementById("btnPopup");
let btnClose = document.getElementById("btnClose");

if (btnPopup != null) {
  btnPopup.addEventListener("click", openModal);
  btnClose.addEventListener("click", closePopup);
}

function openModal() {
  overlay.style.display = "block";
}

function closePopup() {
  overlay.style.display = "none";
}


$('#btn-inscription').on('click',function(e){
// e.preventDefault();
var email = $("input[name='email']").val();

   if(!validateEmail(email))
   {
     alert('Mauvaise email')
   }
   var password = $("input[name='password']").val();

   if(!validatePassword(password))
   {
     alert('Le password doit être contenu entre 3 et 10 caractères')
   }
   var telephone = $("input[name='telephone']").val();

   if(!validateTelephone(telephone))
   {
     alert('Le numéro de telephone doit contenir 10 chiffres')
   }
});

function validatePassword(champ)
{
   if(champ.length < 3 || champ.length > 10)
   { 
      return false;
   }
   else
   {  
      return true;
   }
}

function validateTelephone(champ)
{

   if(champ.length = 10)
   { 
      return false;
   }
   else
   {  
      return true;
   }
}

function verify(f)
{
   var passwordOk = verifPassword(f.password);
   var mailOk = verifMail(f.email);
   var telephoneOk = verifTelephone(f.telephone);
   
   if(passwordOk && mailOk && telephoneOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

function validateEmail(email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

$("select").on('change', function(){
  var data = $('#filtre').serialize();
 $.ajax({
    url : 'ajax/filtre.php',
    type : 'POST',
    data: data, // On désire recevoir du HTML
    success : function(code_html, statut){ // code_html contient le HTML renvoyé
        $('#content').html(code_html);
    }
 });
});