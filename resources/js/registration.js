// form biodata
let currentStep = 1;
const steps = document.querySelectorAll(".step-number");
const formStep = document.querySelectorAll(".form-step");
const inputs = document.querySelectorAll("input, select, textarea");
// const biodataForm = document.getElementById("biodataForm");
// let data = JSON.parse(localStorage.getItem("data")) || [];

// if (currentStep == 1)
//     biodataForm.addEventListener("submit", (e) => {
//         e.preventDefault();
//         let nisn = document.getElementById("nisn").value;
//         let namaLengkap = document.getElementById("nama_lengkap").value;
//         let jk = document.getElementById("jenis_kelamin").value;
//         let agama = document.getElementById("agama").value;
//         let tpLahir = document.getElementById("tempat_lahir").value;
//         let tLahir = document.getElementById("tanggal_lahir").value;
//         let telp = document.getElementById("telp").value;
//         let pos = document.getElementById("pos").value;
//         let alamat = document.getElementById("alamat").value;
//         let asalSekolah = document.getElementById("asal_sekolah").value;

//         let dataBio = {
//             nisn: nisn,
//             namaLengkap: namaLengkap,
//             jk: jk,
//             agama: agama,
//             tpLahir: tpLahir,
//             tLahir: tLahir,
//             telp: telp,
//             pos: pos,
//             alamat: alamat,
//             asalSekolah: asalSekolah,
//         };
//         console.log("data", data);
//         data.push(dataBio);
//         saveToLocalStorage();
//     });

const nextBtn = document.querySelectorAll(".btn-next");
nextBtn.forEach((button) => {
    button.addEventListener("click", nextStep);
});
const prevBtn = document.querySelectorAll(".btn-prev");
prevBtn.forEach((button) => {
    button.addEventListener("click", prevStep);
});
function nextStep() {
    // const currentForm = formStep[currentStep - 1];
    if (currentStep < formStep.length) {
        if (!validated()) {
            showAlert("error", "❌ Data Harus Dilengkap Semua!");
            document.getElementById("alertBox").scrollIntoView({
                top: 0,
                behavior: "smooth",
                block: "center",
            });
            return;
        }
        currentStep++;
        updateUI();
    }
    if (currentStep == 5) {
        reviewData();
    }
}
function prevStep() {
    if (currentStep > 1) {
        currentStep--;
        updateUI();
    }
}
function updateUI() {
    steps.forEach((step, index) => {
        step.classList.toggle("active", index + 1 === currentStep);
    });
    formStep.forEach((form, index) => {
        form.style.display = index + 1 === currentStep ? "block" : "none";
    });
}
updateUI();

function validated(stepElement) {
    let valid = true;

    const currentForm = formStep[currentStep - 1];
    const inputs = currentForm.querySelectorAll("input, select, textarea");
    const dataWali = document.querySelectorAll(".data-wali");
    inputs.forEach((input) => {
        if (input.classList.contains("data-wali")) {
            return;
        }
        if (!input.value.trim()) {
            input.classList.add("border-red-500", "ring-2", "ring-red-500");
            valid = false;
        }
    });
    return valid;
}

flatpickr("#tanggal_lahir", {
    dateFormat: "d-m-Y",
    altInput: true,
    altFormat: "d F Y",
});

function reviewData() {
    const inputData = document.querySelectorAll("input, select, textarea");
    inputData.forEach((input) => {
        const reviewList = document.getElementById(`review_${input.id}`);
        if (reviewList) {
            reviewList.textContent = input.value || "-";
        }
        if (input.type === "file") {
            reviewList.textContent = input.files.length
                ? input.files[0].name
                : "-";
        }
    });
}

function showAlert(type, message) {
    const alertBox = document.getElementById("alertBox");
    const alertMessage = document.getElementById("alertMessage");

    alertBox.className =
        "max-w-3xl mx-auto mt-4 flex h-15 items-center gap-3 rounded-xl border px-4";

    if (type === "success") {
        alertBox.classList.add("bg-green-50", "border-green-200");
        alertMessage.classList.add("text-green-700");
    }

    if (type === "error") {
        alertBox.classList.add("bg-red-50", "border-red-500");
        alertMessage.classList.add("text-red-700");
    }
    alertMessage.textContent = message;
    alertBox.classList.remove("hidden");

    setTimeout(() => {
        alertBox.classList.add("hidden");
    }, 3000);
}

// hapus error input
document.querySelectorAll(".form-input").forEach((input) => {
    input.addEventListener("input", () => {
        input.classList.remove("border-red-500", "ring-2", "ring-red-100");
    });
});

function saveToLocalStorage() {
    localStorage.setItem("data", JSON.stringify(data));
}
