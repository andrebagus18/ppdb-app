const addPublish = document.getElementById("addPublish");
const closePublish = document.getElementById("closePublish");

document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
});

function openAdd() {
    addPublish.classList.remove("hidden");
    addPublish.classList.add("flex");
    closePublish.addEventListener("click", () => {
        addPublish.classList.add("hidden");
        addPublish.classList.remove("flex");
    });
}
window.openAdd = openAdd;
if (addPublish) {
    addPublish.addEventListener("click", (e) => {
        if (e.target === addPublish) {
            addPublish.classList.add("hidden");
        }
    });
}