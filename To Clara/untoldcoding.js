const text =
  " Hey Yayaa! Ini Aku. Aku bikin program kecil ini buat nemenin kamu yang lagi pusing UAS. Cuma kepengen buat aja sih, karena kepikiran kamu. Mungkin sekarang kamu lagi capek, tapi aku cuma mau bilang kamu hebat! Udah bisa sejauh ini, aku yakin kamu bakal ngelaluin semuanya dengan baik. Semangat terus yaaa!!, jangan lupa istirahat juga. Aku dukung kamu, always ✨.";

const paragraph = text.split("");
let i = 0;

function dashOut(arr) {
  if (i < arr.length) {
    document.querySelector(".textCont").textContent += arr[i];
    i++;
    setTimeout(function () {
      dashOut(arr);
    }, interval(arr[i]));
  } else {
    // Setelah selesai mengetik, tampilkan tombol dengan animasi
    const button = document.querySelector(".center-button");
    button.classList.add("show");
    // Setelah selesai mengetik, tampilkan tombol dan teks flower

    // Tampilkan teks flower dengan animasi
    const flowerText = document.getElementById("flowerText");
    flowerText.classList.add("show");
  }
}

function interval(letter) {
  if (letter == ";" || letter == "." || letter == ",") {
    return Math.floor(Math.random() * 500 + 500);
  } else {
    return Math.floor(Math.random() * 130 + 5);
  }
}

function startFromBegin() {
  i = 0;
  dashOut(paragraph);
}

startFromBegin();
