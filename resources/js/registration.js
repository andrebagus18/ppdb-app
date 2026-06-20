// form biodata
const modal = document.querySelector("#modal");
const preview = document.querySelector("#preview");
const close = document.querySelector("#close");
const inputs = document.querySelectorAll("input, select, textarea");
const menus = document.querySelectorAll(".menu-link");

document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
});

// fungsi tab aside
document.querySelectorAll("[data-target]").forEach((btn) => {
    btn.addEventListener("click", () => {
        document.getElementById("navbar-title").textContent =
            btn.textContent.trim();
        document.querySelectorAll(".content").forEach((content) => {
            content.classList.add("hidden");
        });
        document.getElementById(btn.dataset.target)?.classList.remove("hidden");
    });
});

// fungsi tanggal
flatpickr("#tanggal_lahir", {
    dateFormat: "d-m-Y",
    altInput: true,
    altFormat: "d F Y",
});

// active link
menus.forEach((menu) => {
    menu.addEventListener("click", () => {
        menus.forEach((item) => {
            item.classList.remove("bg-blue-500", "text-white");
        });
        menu.classList.add("bg-blue-500", "text-white");
    });
});

function reviewData() {
    modal.classList.remove("hidden");
    modal.classList.add("flex");
    const inputData = document.querySelectorAll("input, select, textarea");
    inputData.forEach((input) => {
        const reviewList = document.getElementById(`review_${input.id}`);
        if (reviewList) {
            reviewList.textContent = input.value || "-";
        }
    });
    close.addEventListener("click", () => {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    });
}
window.reviewData = reviewData;
modal.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }
});

// hapus error input
document.querySelectorAll(".form-input").forEach((input) => {
    input.addEventListener("input", () => {
        input.classList.remove("border-red-500", "ring-2", "ring-red-100");
    });
});
