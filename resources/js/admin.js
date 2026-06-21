const addPublish = document.getElementById("addPublish");
const closePublish = document.querySelectorAll(".closePublish");
const modalDetail = document.getElementById("modalDetail");
const closeDetail = document.querySelectorAll(".closeDetail");
const modalEdit = document.getElementById("modalEdit");
const closeEdit = document.querySelectorAll(".closeEdit");
const modalEditUser = document.getElementById('modalEditUser');
const closeEditUser = document.querySelectorAll('.closeEditUser');
const addUser = document.getElementById('addUser');
const closeAddUser = document.querySelectorAll('.closeAddUser');


document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
});

// open modal add pengumuman
function openAdd() {
    addPublish.classList.remove("hidden");
    addPublish.classList.add("flex");
    closePublish.forEach((close) => {
        close.addEventListener("click", () => {
            addPublish.classList.add("hidden");
            addPublish.classList.remove("flex");
        });
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

// detail pengumuman
document.querySelectorAll(".detail-btn").forEach((detailBtn) => {
    detailBtn.addEventListener("click", () => {
        document.getElementById("detailJudul").textContent =
            detailBtn.dataset.judul;
        document.getElementById("detailIsi").textContent =
            detailBtn.dataset.isi;
        document.getElementById("detailStatus").textContent =
            detailBtn.dataset.status;
        document.getElementById("detailPublished").textContent =
            detailBtn.dataset.published;
        modalDetail.classList.remove("hidden");
        modalDetail.classList.add("flex");
    });
});
if (modalDetail) {
    modalDetail.addEventListener("click", (e) => {
        if (e.target === modalDetail) {
            modalDetail.classList.add("hidden");
        }
    });
    closeDetail.forEach((close) => {
        close.addEventListener("click", () => {
            modalDetail.classList.add("hidden");
            modalDetail.classList.remove("flex");
        });
    });
}

// edit pengumuman
document.querySelectorAll(".edit-btn").forEach((editBtn) => {
    editBtn.addEventListener("click", () => {
        document.getElementById("editJudul").value = editBtn.dataset.judul;
        document.getElementById("editIsi").value = editBtn.dataset.isi;
        document.getElementById("editForm").action =
            `/admin/announcement/${editBtn.dataset.id}/update`;
        modalEdit.classList.remove("hidden");
        modalEdit.classList.add("flex");
    });
});
if (modalEdit) {
    modalEdit.addEventListener("click", (e) => {
        if (e.target === modalEdit) {
            modalEdit.classList.add("hidden");
        }
    });
    closeEdit.forEach((close) => {
        close.addEventListener("click", () => {
            modalEdit.classList.add("hidden");
            modalEdit.classList.remove("flex");
        });
    });
}

// edit user
document.querySelectorAll(".editUser").forEach((editUser) => {
    editUser.addEventListener("click", () => {
        document.getElementById("editName").value = editUser.dataset.name;
        document.getElementById("editEmail").value = editUser.dataset.email;
        document.getElementById("editFormUser").action =
            `/admin/manajemen/${editUser.dataset.id}/update`;
        modalEditUser.classList.remove("hidden");
        modalEditUser.classList.add("flex");
    });
});
if (modalEditUser) {
    modalEditUser.addEventListener("click", (e) => {
        if (e.target === modalEditUser) {
            modalEditUser.classList.add("hidden");
        }
    });
    closeEditUser.forEach((close) => {
        close.addEventListener("click", () => {
            modalEditUser.classList.add("hidden");
            modalEditUser.classList.remove("flex");
        });
    });
}

//modal create user
function modalAdd() {
    addUser.classList.remove("hidden");
    addUser.classList.add("flex");
    closeAddUser.forEach((close) => {
        close.addEventListener("click", () => {
            addUser.classList.add("hidden");
            addUser.classList.remove("flex");
        });
    });
}
window.modalAdd = modalAdd;
if (addUser) {
    addUser.addEventListener("click", (e) => {
        if (e.target === addUser) {
            addUser.classList.add("hidden");
        }
    });
}

// function button password
window.togglePassword = function (inputId, button) {
    const input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
        button.textContent = "🔒";
    } else {
        input.type = "password";
        button.textContent = "🔓";
    }
};
