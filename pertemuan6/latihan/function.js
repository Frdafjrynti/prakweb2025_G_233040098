/* =========================================
   BAGIAN A: JAVASCRIPT DASAR & FUNCTION
   (Halaman 4 - 6)
   ========================================= */

// Contoh IF/ELSE (Halaman 4)
var angka = 1;
if (angka === 1) {
    console.log("Anda memasukkan angka 1");
}

// Cek Ganjil Genap (Halaman 5)
var angkaGenap = 2;
if (angkaGenap % 2 === 0) {
    console.log("Genap");
} else {
    console.log("Ganjil");
}

// Studi Kasus: Menghitung Volume Dua Kubus (Halaman 6)
function volumeDuaKubus(a, b) {
    var volumeA = a * a * a;
    var volumeB = b * b * b;
    return volumeA + volumeB;
}

console.log("Total Volume Kubus (8,3): " + volumeDuaKubus(8, 3));
console.log("Total Volume Kubus (10,15): " + volumeDuaKubus(10, 15));


/* =========================================
   BAGIAN B: JURAGAN ANGKOT (ARRAY & OBJECT)
   (Halaman 9)
   ========================================= */

var penumpang = [];
var tambahPenumpang = function(namaPenumpang, penumpang) {
    // Jika angkot kosong
    if (penumpang.length == 0) {
        penumpang.push(namaPenumpang);
        return penumpang;
    } else {
        // Telusuri kursi dari awal
        for (var i = 0; i < penumpang.length; i++) {
            // Jika ada kursi kosong
            if (penumpang[i] == undefined) {
                penumpang[i] = namaPenumpang;
                return penumpang;
            }
            // Jika nama penumpang sudah ada
            else if (penumpang[i] == namaPenumpang) {
                console.log(namaPenumpang + " sudah ada di dalam angkot");
                return penumpang;
            }
            // Jika seluruh kursi terisi
            else if (i == penumpang.length - 1) {
                penumpang.push(namaPenumpang);
                return penumpang;
            }
        }
    }
}

// Simulasi Angkot (Cek Console Browser)
console.log("--- Simulasi Angkot ---");
tambahPenumpang("Galih", penumpang);
tambahPenumpang("Sandhika", penumpang);
tambahPenumpang("Dody", penumpang);
console.log(penumpang);


/* =========================================
   BAGIAN C: DOM MANIPULATION
   (Halaman 10 - 15)
   ========================================= */

// 1. Ubah Background Color (Halaman 11)
function ubahWarnaJudul() {
    // Seleksi elemen id 'judul' lalu ubah style
    document.getElementById('judul').style.backgroundColor = 'red';
    document.getElementById('judul').style.color = 'white';
}

// 2. Ubah InnerHTML (Halaman 12)
function ubahIsi() {
    const el = document.getElementById("judul-klik");
    el.innerHTML = "Sudah diklik!";
}

// 3. Ubah Style CSS (Halaman 12)
function gantiWarna() {
    const el = document.getElementById("teks");
    el.style.color = "red";
    el.style.fontSize = "24px";
}

// 4. SetAttribute (Halaman 13)
function gantiFoto() {
    const img = document.getElementById("gambar");
    // Mengubah src dan width
    img.setAttribute("src", "https://via.placeholder.com/300/0000FF/808080"); // Contoh ganti gambar
    img.setAttribute("width", "300");
}

// 5. ClassList Toggle (Halaman 13)
function besarKecil() {
    const el = document.getElementById("box");
    el.classList.toggle("besar");
}

// 6. Event Handler & Listener (Halaman 14-15)

// --- Menggunakan Event Handler (onclick) ---
const btnHandler = document.getElementById('ubah');
const pHandler = document.getElementById('p');

function ubahParaf() {
    pHandler.style.backgroundColor = 'red';
    pHandler.style.color = 'white';
}
// Assign function ke event onclick
btnHandler.onclick = ubahParaf;

// --- Menggunakan AddEventListener ---
const btnListener = document.getElementById('ubahJudul');
const judulListener = document.getElementById('judul');

btnListener.addEventListener('click', function() {
    alert('Judul berhasil diubah');
    judulListener.innerHTML = 'Mantap';
});


/* =========================================
   BAGIAN D: JAVASCRIPT MODERN (ES6)
   (Halaman 15 - 18)
   ========================================= */

console.log("--- JS Modern ---");

// 1. Arrow Function (Halaman 15)
const tampilNama = nama => `Halo ${nama}`;
console.log(tampilNama('Budi'));

// 2. Filter (Halaman 16)
const angka = [-2, -2, 6, 8, 3, 6, 8, -16];
// Mengambil angka >= 0
const arrFilter = angka.filter(a => a >= 0);
console.log("Filter angka >= 0:", arrFilter);

// 3. Map (Halaman 17)
// Kalikan semua angka dengan 2
const angkabaru2 = angka.map(a => a * 2);
console.log("Map (dikali 2):", angkabaru2);

// 4. Reduce (Halaman 17)
// Menjumlahkan seluruh elemen array
const angkabaru3 = angka.reduce((accumulator, currentValue) => accumulator + currentValue);
console.log("Reduce (Jumlah total):", angkabaru3);

// 5. Destructuring (Halaman 18)
// Array Destructuring
const kelas = ['A', 'B', 'C'];
const [senin, rabu, kamis] = kelas;
console.log(`Kelas hari senin: ${senin}`);

// Object Destructuring
const mhs = {
    namaMhs: 'Budi',
    umurMhs: 20
};
const { namaMhs, umurMhs } = mhs;
console.log(`Nama mahasiswa: ${namaMhs}, Umur: ${umurMhs}`);


/* =========================================
   BAGIAN E: LOGIKA NODEJS (TOKO)
   (Halaman 23)
   *Diadaptasi agar tampil di console browser*
   ========================================= */

console.log("--- Logika Toko (NodeJS Case) ---");

const namaToko = "Toko Serba Ada";
const hargaBuku = 5000;
const hargaPensil = 2000;

function hitungTotal(jmlBuku, jmlPensil) {
    return (jmlBuku * hargaBuku) + (jmlPensil * hargaPensil);
}

function cetakStruk(total) {
    console.log("===" + namaToko + "===");
    console.log("Total Belanja: Rp " + total);
    console.log("Terima Kasih!");
}

// Eksekusi
const tagihan = hitungTotal(2, 3); // Beli 2 buku, 3 pensil
cetakStruk(tagihan);