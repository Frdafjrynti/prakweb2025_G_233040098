// url API untuk mengambil data users
const API_URL = "https://apipw.kodingin.id/api/users";

// ambil elemen html yang akan dimanipulasi
const loadingElement = document.getElementById("loading");
const errorElement = document.getElementById("error");
const tableContainer = document.getElementById("table-Container");
const tableBody = document.getElementById("users-tBody");

// Fungsi untuk format tanggal ke bahasa Indonesia
// Contoh: "2024-01-15T10:30:00Z" -> "15 Jan 2024, 10.30"
function formatDate(dateString) {
    const options = {
        year: "numeric",
        month: "short",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
    };
    return new Date(dateString).toLocaleDateString("id-ID", options);
}

// Membuat 1 baris tabel untuk setiap user
function createUserRow(user, index) {
    const row = document.createElement("tr");

    row.innerHTML = `
        <td>${index + 1}</td>
        <td>
            <img
                src="${user.image}"
                alt="${user.firstName} ${user.lastName}"
                class="user-avatar"
                loading="lazy"
                onerror="this.src='https://ui-avatars.com/api/?name=${
                    user.firstName
                }+${user.lastName}&size=50&background=3498db&color=fff'"
            >
        </td>
        <td class="user-fullname">${user.firstName} ${user.lastName}</td>
        <td class="user-email">${user.email}</td>
        <td>${formatDate(user.createdAt)}</td>
        <td>${formatDate(user.updatedAt)}</td>
        <td>
            <a href="user-detail.html?id=${
                user.id
            }" class="btn-detail">Lihat Detail</a>
        </td>
    `;

    return row;
}

// Tampilkan semua data users ke dalam tabel
function renderUsers(users) {
    tableBody.innerHTML = "";

    if (!users || users.length === 0) {
        tableBody.innerHTML =
            '<tr><td colspan="7" style="text-align: center; padding: 40px;">Tidak ada data pengguna.</td></tr>';
        return;
    }

    // Loop setiap user dan buat baris tabel
    users.forEach((user, index) => {
        const row = createUserRow(user, index);
        tableBody.appendChild(row);
    });
}

// Fungsi untuk mengatur tampilan loading, error, atau success
function updateUIState(state) {
    // Sembunyikan semua elemen dulu
    loadingElement.classList.add("hidden");
    errorElement.classList.add("hidden");
    tableContainer.classList.add("hidden");

    // Tampilkan sesuai state
    switch (state) {
        case "loading":
            loadingElement.classList.remove("hidden");
            break;
        case "error":
            errorElement.classList.remove("hidden");
            break;
        case "success":
            tableContainer.classList.remove("hidden");
            break;
    }
}

// FUNGSI UTAMA: Ambil data users dari API
// Menggunakan fetch() untuk request data, async/await untuk menunggu response
async function fetchUsers() {
    updateUIState("loading");

    try {
        // Kirim request ke API
        const response = await fetch(API_URL);

        // Cek apakah response berhasil
        if (!response.ok) {
            throw new Error(`Kesalahan HTTP! status: ${response.status}`);
        }

        // Ubah response JSON menjadi objek JavaScript
        const result = await response.json();

        // Tampilkan data jika berhasil
        if (result.success && result.data) {
            renderUsers(result.data);
            updateUIState("success");
        } else {
            throw new Error("Format data tidak valid");
        }
    } catch (error) {
        // Tangkap error jika gagal
        console.error("Kesalahan saat mengambil data users:", error);
        updateUIState("error");
    }
}

// Jalankan saat halaman selesai dimuat
document.addEventListener("DOMContentLoaded", () => {
    fetchUsers();
});

// Auto refresh data setiap 5 menit
setInterval(fetchUsers, 5 * 60 * 1000);


