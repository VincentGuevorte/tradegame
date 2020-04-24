// $("#form_add_game").on("submit", function () {
//       var donnees = $(this).serialize(); // On créer une variable content le formulaire sérialisé
//       console.log(donnees);
//       $.ajax({
  
//         url: "ajax/add_games.php",
//         data: new FormData(this),
//         contentType: false,
//         cache: false,
//         processData: false,
//         type: "POST",
//         success: function (data) {
//           // code_html contient le HTML renvoyé
//           $("#reponseAjax").html(data);
//         },
//       });
  
    //   return false;
    // });
  
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
  