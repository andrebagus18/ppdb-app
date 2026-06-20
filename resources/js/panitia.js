const open = document.getElementById("detailModalSiswa");
const close = document.getElementById("closeModalSiswa");
const openDoc = document.getElementById("detailModalDoc");
const closeDoc = document.getElementById("closeModalDoc");
const menus = document.querySelectorAll(".menu-link");

document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
});

// modal siswa
function openModalSiswa(id) {
    const data = registrations.find((reg) => reg.id === id);
    if (!data) return;
    document.getElementById("nama").innerText = "Andre";
    console.log(data.student?.nama_lengkap);
    document.getElementById("nama").style.backgroundColor = "red";
    document.getElementById("nik").innerText =
        data.student?.["nik/nisn"] ?? "-";
    document.getElementById("tempat").innerText =
        data.student?.tempat_lahir +
            ", " +
            formatDate(data.student?.tanggal_lahir) ?? "-";
    document.getElementById("jk").innerText =
        data.student?.jenis_kelamin ?? "-";
    document.getElementById("asal").innerText =
        data.student?.asal_sekolah ?? "-";
    document.getElementById("nilai").innerText =
        data.student?.nilai_rata_rata ?? "-";
    document.getElementById("agama").innerText = data.student?.agama ?? "-";
    document.getElementById("alamat").innerText = data.student?.alamat ?? "-";
    document.getElementById("pos").innerText = data.student?.pos ?? "-";
    document.getElementById("hp").innerText = data.student?.no_hp ?? "-";
    document.getElementById("ayah").innerText = data.student?.ayah ?? "-";
    document.getElementById("kayah").innerText =
        data.student?.kerja_ayah ?? "-";
    document.getElementById("ibu").innerText = data.student?.ibu ?? "-";
    document.getElementById("kibu").innerText = data.student?.kerja_ibu ?? "-";
    document.getElementById("wali").innerText = data.student?.wali ?? "-";
    document.getElementById("hwali").innerText =
        data.student?.hubungan_wali ?? "-";

    open.classList.remove("hidden");
    open.classList.add("flex");
    close.addEventListener("click", () => {
        open.classList.add("hidden");
        open.classList.remove("flex");
    });
}
window.openModalSiswa = openModalSiswa;
if (open) {
    open.addEventListener("click", (e) => {
        if (e.target === open) {
            open.classList.add("hidden");
        }
    });
}
// modal document
function openModalDoc(id) {
    const data = registrations.find((reg) => reg.id === id);
    if (!data) return;
    document.getElementById("name").innerText =
        data.student?.nama_lengkap ?? "-";
    document.getElementById("nod").innerText = data.no_daftar ?? "-";
    let html = "";
    data.documents.forEach((doc) => {
        html += `<tr class="border-t">
                                        <td class="p-4" id="jenis">
                                            ${doc.jenis_document}
                                        </td>
                                        <td class="p-4 font-medium italic" id="status">
                                            ${doc.status_verifikasi}
                                        </td>
                                        <td class="p-4" id="catat">
                                            ${doc.catatan}
                                        </td>
                                        <td class="p-4">
                                            <div class="flex gap-2 justify-between">
                                                <a href="${doc.cloudinary_url}" target="_blank"
                                                    class="bg-blue-600 hover:bg-blue-700 text-sm text-center text-white px-8 py-2 rounded-lg cursor-pointer">
                                                    View
                                                </a>
                                                <form method="POST" action="/panitia/documents/${doc.id}/approve">
                                                    <input type="hidden" name="_token" value="${window.csrf}">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <button
                                                        class="bg-green-600 hover:bg-green-700 text-sm text-center text-white px-6 py-2 rounded-lg cursor-pointer">
                                                        Approve
                                                    </button>
                                                </form>
                                                <form method="POST" action="/panitia/documents/${doc.id}/reject">
                                                    <input type="hidden" name="_token" value="${window.csrf}">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <button
                                                        class="bg-red-500 hover:bg-red-600 text-sm text-white px-6 py-2 mb-1 rounded-lg cursor-pointer">
                                                        Reject
                                                    </button>
                                                    <input name="catatan" placeholder="Alasan Ditolak"
                                                        class="border rounded-lg text-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>`;
    });
    document.getElementById("contentBody").innerHTML = html;

    openDoc.classList.remove("hidden");
    openDoc.classList.add("flex");
    closeDoc.addEventListener("click", () => {
        openDoc.classList.add("hidden");
        openDoc.classList.remove("flex");
    });
}
window.openModalDoc = openModalDoc;
if (openDoc) {
    openDoc.addEventListener("click", (e) => {
        if (e.target === openDoc) {
            openDoc.classList.add("hidden");
        }
    });
}

//format tanggal
function formatDate(dateString) {
    const date = new Date(dateString);
    return new Intl.DateTimeFormat("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric",
    }).format(date);
}

//ajax search and filter
const searchInput = document.getElementById("search");
const statusFilter = document.getElementById("status");
const jalurFilter = document.getElementById("jalur_id");

function fetchData(pushState = true) {
    const search = searchInput.value;
    const status = statusFilter.value;
    const jalur = jalurFilter.value;

    const params = new URLSearchParams();
    if (search) params.append("search", search);
    if (status) params.append("status", status);
    if (jalur) params.append("jalur_id", jalur);

    const queryString = params.toString();
    const url = queryString
        ? `/panitia/registrations?${queryString}`
        : `/panitia/registrations`;
    console.log(url);
    fetch(url, {
        headers: {
            "X-Requested-With": "XMLHttpRequest",
        },
    })
        .then((res) => res.text())
        .then((html) => {
            document.getElementById("table-container").innerHTML = html;
            if (pushState) window.history.pushState({}, "", url);
        })
        .catch((error) => console.log(error));
}
let timeout;

if (searchInput) {
    searchInput.addEventListener("input", () => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            if (!searchInput.value) {
                window.history.pushState({}, "", "/panitia/registrations");
            }
            fetchData();
        }, 500);
    });
}
if (statusFilter) {
    statusFilter.addEventListener("change", () => {
        fetchData();
    });
}
if (jalurFilter) {
    jalurFilter.addEventListener("change", () => {
        fetchData();
    });
}
document.addEventListener("DOMContentLoaded", () => {
    const url = new URL(window.location.href);
    if (searchInput) searchInput.value = url.searchParams.get("searh") || "";
    if (statusFilter) statusFilter.value = url.searchParams.get("status") || "";
    if (jalurFilter) jalurFilter.value = url.searchParams.get("jalur_id") || "";
    fetchData(false);
});
