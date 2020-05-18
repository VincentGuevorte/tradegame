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

  setTimeout(RedirectionIndex, 5000); //On attend 5 secondes avant d'exécuter la fonction

  function RedirectionIndex() {
    //Le code écrit dans cette fonction ne sera exécuté qu'au bout de 5 secondes 
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
