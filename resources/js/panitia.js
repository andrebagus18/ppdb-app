const open = document.getElementById("detailModalSiswa");
const close = document.getElementById("closeModalSiswa");
const openDoc = document.getElementById("detailModalDoc");
const closeDoc = document.getElementById("closeModalDoc");
const menus = document.querySelectorAll(".menu-link");

document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
});

document.querySelectorAll("[data-target]").forEach((btn) => {
    btn.addEventListener("click", () => {
        document.querySelectorAll(".content").forEach((content) => {
            content.classList.add("hidden");
        });
        const target = document.getElementById(btn.dataset.target);
        if (target) {
            target.classList.remove("hidden");
        }
    });
});

// modal siswa
function openModalSiswa(id) {
    open.classList.remove("hidden");
    open.classList.add("flex");
    close.addEventListener("click", () => {
        open.classList.add("hidden");
        open.classList.remove("flex");
    });
}
window.openModalSiswa = openModalSiswa;
open.addEventListener("click", (e) => {
    if (e.target === open) {
        open.classList.add("hidden");
    }
});
// modal document
function openModalDoc(id) {
    openDoc.classList.remove("hidden");
    openDoc.classList.add("flex");
    closeDoc.addEventListener("click", () => {
        openDoc.classList.add("hidden");
        openDoc.classList.remove("flex");
    });
}
window.openModalDoc = openModalDoc;
openDoc.addEventListener("click", (e) => {
    if (e.target === openDoc) {
        openDoc.classList.add("hidden");
    }
});

// active link
menus.forEach(menu => {
    menu.addEventListener("click", () => {
        menus.forEach(item => {
            item.classList.remove(
                "bg-emerald-500",
                "text-white"
            );
        });
        menu.classList.add(
            "bg-emerald-500",
            "text-white"
        );
    });
});
