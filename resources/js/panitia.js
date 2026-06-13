const open = document.querySelector("#detailModal");
const close = document.querySelector("#closeModal");
function openModal() {
    open.classList.remove("hidden");
    close.addEventListener("click", () => {
        open.classList.add("hidden");
    });
}
window.openModal = openModal;
open.addEventListener("click", (e) => {
    if (e.target === open) {
        open.classList.add("hidden");
    }
});
