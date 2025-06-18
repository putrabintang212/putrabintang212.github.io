onload = () => {
    document.body.classList.remove("container");
};

const wrapper = document.querySelector(".wrapper");
const openBtn = document.getElementById("openBtn");
const closeBtn = document.getElementById("closeBtn");
const letter = document.querySelector(".letter");
const overlay = document.getElementById("overlay");

// Fungsi menutup semuanya
const closeEnvelope = () => {
    wrapper.classList.remove("open");
    closeBtn.style.display = "none";
    openBtn.style.display = "inline-block";
    letter.classList.remove("popout");
    overlay.style.display = "none";
};

// Tombol buka
openBtn.addEventListener("click", () => {
    wrapper.classList.add("open");
    openBtn.style.display = "none";
    closeBtn.style.display = "inline-block";
});

// Tombol tutup
closeBtn.addEventListener("click", closeEnvelope);

// Klik kertas
letter.addEventListener("click", () => {
    if (letter.classList.contains("popout")) {
        // Jika sudah popout, maka tutup
        closeEnvelope();
    } else if (wrapper.classList.contains("open")) {
        // Jika belum popout dan amplop terbuka
        setTimeout(() => {
            letter.classList.add("popout");
            overlay.style.display = "block";
        }, 500); // Waktu animasi envelope membuka
    }
});

// Klik overlay
overlay.addEventListener("click", closeEnvelope);
