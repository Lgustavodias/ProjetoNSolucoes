// Script paradar mais opções no formulario
function showAdminFields() {
    var levelSelect = document.getElementById("level");
    var adminFields = document.getElementById("adminFields");
    
    if (levelSelect.value === "cliente") {
      adminFields.style.display = "block";
    } else {
      adminFields.style.display = "none";
    }
  }
// Script para abrir e fechar o modal
  const openModalButton = document.getElementById('openModalButton');
    const closeModalButton = document.getElementById('closeModalButton');
    const modal = document.getElementById('myModal');

    openModalButton.addEventListener('click', () => {
      modal.style.display = 'flex';
    });

    closeModalButton.addEventListener('click', () => {
      modal.style.display = 'none';
    });

    
