const form = document.getElementById("searchRegistration");
const closeCari = document.getElementById('closeCari');
document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
});

form.addEventListener("submit", async function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const response = await fetch(this.action, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": formData.get("_token"),
            Accept: "application/json",
        },
        body: formData,
    });
    const data = await response.json();
    if (!data.success) {
        Swal.fire({
            icon: "error",
            text: data.message,
        });

        return;
    }
    document.getElementById("nama").textContent = data.data.nama;
    document.getElementById("nomor").textContent = data.data.nomor;
    document.getElementById("jalurNama").textContent = data.data.jalurNama;
    document.getElementById("status").textContent = data.data.status.title;
    document.getElementById("status").className = `rounded-md text-center ${data.data.status.bg}`;
    document.getElementById("hasil").textContent = data.data.hasil.title;
    document.getElementById("hasil").className = `rounded-md text-center ${data.data.hasil.bg}`;
    document.getElementById("modalRegistration").classList.remove("hidden");
    document.getElementById("modalRegistration").classList.add("flex");
});

function closeModal() {
    const modal = document.getElementById("modalRegistration");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}
window.closeModal = closeModal;
window.addEventListener('click', (e) => {
    document.getElementById('modalRegistration').classList.add('hidden');
    document.getElementById('modalRegistration').classList.remove('flex');
})
