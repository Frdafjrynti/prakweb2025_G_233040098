// URL API - akan digabung dengan ID user (contoh: /users/1)
const API_BASE_URL = "https://apipw.kodingin.id/api/users";

// Ambil elemen HTML
const loadingElement = document.getElementById("loading");
const errorElement = document.getElementById("error");
const userDetailContainer = document.getElementById("user-detail-container");

// Ambil ID user dari URL (contoh: user-detail.html?id=123)
function getUserIdFromUrl() {
    const params = new URLSearchParams(window.location.search);
    return params.get("id");
}

// Format tanggal ke bahasa Indonesia
function formatDate(dateString) {
    const options = {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
    };
    return new Date(dateString).toLocaleDateString("id-ID", options);
}

// Buat HTML untuk menampilkan detail user
function createUserDetailHTML(user) {
    return `
        <article class="detail-card">
            <div class="detail-header">
                <div class="detail-image-container">
                    <img
                        src="${user.image}"
                        alt="${user.firstName} ${user.lastName}"
                        class="detail-image"
                        onerror="this.src='https://ui-avatars.com/api/?name=${
                            user.firstName
                        }+${
        user.lastName
    }&size=400&background=3498db&color=fff&font-size=0.4'"
                    >
                </div>
                <div class="detail-info">
                    <h1 class="detail-name">${user.firstName} ${
        user.lastName
    }</h1>
                    <p class="detail-email">${user.email}</p>
                    <div class="detail-meta">
                        <div class="meta-item">
                            <span class="meta-label">Dibuat:</span>
                            <span class="meta-value">${formatDate(
                                user.createdAt
                            )}</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Diupdate:</span>
                            <span class="meta-value">${formatDate(
                                user.updatedAt
                            )}</span>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    `;
}

// Mengatur tampilan loading, error, atau success
function updateUIState(state) {
    loadingElement.classList.add("hidden");
    errorElement.classList.add("hidden");
    userDetailContainer.classList.add("hidden");

    switch (state) {
        case "loading":
            loadingElement.classList.remove("hidden");
            break;
        case "error":
            errorElement.classList.remove("hidden");
            break;
        case "success":
            userDetailContainer.classList.remove("hidden");
            break;
    }
}

// FUNGSI UTAMA: Ambil detail 1 user berdasarkan ID dari API
async function fetchUserDetail(userId) {
    updateUIState("loading");

    try {
        // Gabungkan URL dengan ID user
        const response = await fetch(`${API_BASE_URL}/${userId}`);

        if (!response.ok) {
            throw new Error(`Kesalahan HTTP! status: ${response.status}`);
        }

        const result = await response.json();

        if (result.success && result.data) {
            userDetailContainer.innerHTML = createUserDetailHTML(result.data);
            updateUIState("success");
        } else {
            throw new Error("Format data tidak valid");
        }
    } catch (error) {
        console.error("Kesalahan saat mengambil detail user:", error);
        updateUIState("error");
    }
}

// Jalankan saat halaman selesai dimuat
document.addEventListener("DOMContentLoaded", () => {
    const userId = getUserIdFromUrl();

    // Jika tidak ada ID, tampilkan error
    if (!userId) {
        updateUIState("error");
        return;
    }

    // Ambil detail user dari API
    fetchUserDetail(userId);
});