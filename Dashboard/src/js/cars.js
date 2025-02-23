document.addEventListener("DOMContentLoaded", function () {
    const openButtons = document.querySelectorAll(".open-modal");
    const closeButtons = document.querySelectorAll(".close-modal");
    const modals = document.querySelectorAll(".modal");

    // Abrir modal
    openButtons.forEach(button => {
        button.addEventListener("click", function () {
            const targetModal = document.querySelector(this.getAttribute("data-target"));
            if (targetModal) {
                targetModal.style.display = "flex";
            }
        });
    });

    // Fechar modal
    closeButtons.forEach(button => {
        button.addEventListener("click", function () {
            this.closest(".modal").style.display = "none";
        });
    });

    // Fechar modal ao clicar fora dele
    modals.forEach(modal => {
        modal.addEventListener("click", function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    });
});
