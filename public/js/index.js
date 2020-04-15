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
  