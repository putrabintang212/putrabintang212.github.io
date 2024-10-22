const products = [
    {
        name: "Acer Orion 900",
        price: "Rp95.469.000",
        image: "img/Acer Orion 900.png"
    },
    {
        name: "Legion T7",
        price: "Rp67.319.000",
        image: "img/Legion T7.png"
    },
    {
        name: "MSI Meg Trident X",
        price: "Rp56.990.000",
        image: "img/MSI DESKTOP MEG TRIDENT X-1.png"
    },
    {
        name: "ROG G15CF",
        price: "Rp33.699.000",
        image: "img/ROG G15CF 2.png"
    }
];

function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

function displaySearchResults(query) {
    const resultsDiv = document.getElementById('results');
    const filteredProducts = products.filter(product => 
        product.name.toLowerCase().includes(query.toLowerCase())
    );

    if (filteredProducts.length > 0) {
        filteredProducts.forEach(product => {
            const productCard = `
                <div class="product-card">
                    <img src="${product.image}" alt="${product.name}">
                    <p>${product.name}</p>
                    <p>${product.price}</p>
                    <form action="payment.php" method="post">
                        <input type="hidden" name="product_name" value="${product.name}">
                        <input type="hidden" name="product_image" value="${product.image}">
                        <button type="submit">Buy</button>
                    </form>
                </div>
            `;
            resultsDiv.innerHTML += productCard;
        });
    } else {
        resultsDiv.innerHTML = `<p>No products found for "${query}".</p>`;
    }
}

window.onload = function() {
    const query = getQueryParam('query');
    if (query) {
        displaySearchResults(query);
    } else {
        document.getElementById('results').innerHTML = '<p>No search query provided.</p>';
    }
};
