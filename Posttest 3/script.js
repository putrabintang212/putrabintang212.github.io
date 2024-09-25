// Hamburger menu 
const hamburger = document.getElementById('hamburger');
const navbar = document.getElementById('navbar');

hamburger.addEventListener('click', () => {
    navbar.classList.toggle('show');
});

// Dark Mode 
const modeToggle = document.getElementById('mode-toggle');
const body = document.body;

modeToggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    body.classList.toggle('light-mode');
    modeToggle.textContent = body.classList.contains('dark-mode') ? 'Light Mode' : 'Dark Mode';
});

// Pop up 
const popup = document.getElementById('popup');
const popupBtn = document.getElementById('popup-btn');
const closeBtn = document.querySelector('.close-btn');

popupBtn.addEventListener('click', () => {
    popup.style.display = 'flex';
});

closeBtn.addEventListener('click', () => {
    popup.style.display = 'none';
});

window.addEventListener('click', (event) => {
    if (event.target == popup) {
        popup.style.display = 'none';
    }
});

// tombol spek
const specPopup = document.getElementById('spec-popup');
const closeSpecBtn = document.querySelector('.close-spec-btn');
const specDetails = document.getElementById('spec-details');

// Data spek
const productSpecs = {
    "acer-orion": `
        <h3>Acer Orion 900</h3>
        <ul>
            <li>Processor: Intel Core i9-11900K</li>
            <li>RAM: 64GB DDR4</li>
            <li>GPU: NVIDIA GeForce RTX 3090</li>
            <li>Storage: 2TB SSD + 2TB HDD</li>
            <li>Cooling: Liquid Cooling</li>
            <li>PSU: 1000W 80+ Platinum Certified</li>
            <li>Dimensions: 563 x 258 x 596 mm</li>
        </ul>
    `,
    "legion-t7": `
        <h3>Legion T7</h3>
        <ul>
            <li>Processor: Intel Core i7-10700K</li>
            <li>RAM: 32GB DDR4</li>
            <li>GPU: NVIDIA GeForce RTX 3080</li>
            <li>Storage: 1TB SSD + 2TB HDD</li>
            <li>Cooling: Air Cooling with RGB lighting</li>
            <li>PSU: 750W 80+ Gold Certified</li>
            <li>Dimensions: 456 x 184.5 x 460 mm</li>
        </ul>
    `,
    "msi-meg": `
        <h3>MSI MEG TRIDENT X</h3>
        <ul>
            <li>Processor: Intel Core i7-10700K</li>
            <li>RAM: 32GB DDR4</li>
            <li>GPU: NVIDIA GeForce RTX 3080</li>
            <li>Storage: 1TB SSD + 2TB HDD</li>
            <li>Cooling: Air Cooling with RGB lighting</li>
            <li>PSU: 750W 80+ Gold Certified</li>
            <li>Dimensions: 456 x 184.5 x 460 mm</li>
        </ul>
    `,
    "rog-g15cf": `
        <h3>Asus ROG G15CF</h3>
        <ul>
            <li>Processor: Intel Core i7-12700KF</li>
            <li>RAM: 16GB DDR4</li>
            <li>GPU: NVIDIA RTX 3070</li>
            <li>Storage: 512GB NVMe SSD + 1TB HDD</li>
            <li>Cooling: Air Cooling with Dual Fan Design</li>
            <li>PSU: 750W 80+ Bronze Certified</li>
            <li>Dimensions: 429 x 190 x 501 mm</li>
        </ul>
    `
};

// Menampilkan popup spek
document.querySelectorAll('.spec-btn').forEach(button => {
    button.addEventListener('click', () => {
        const product = button.getAttribute('data-product');
        specDetails.innerHTML = productSpecs[product];
        specPopup.style.display = 'flex';
    });
});

closeSpecBtn.addEventListener('click', () => {
    specPopup.style.display = 'none';
});

window.addEventListener('click', (event) => {
    if (event.target == specPopup) {
        specPopup.style.display = 'none';
    }
});
