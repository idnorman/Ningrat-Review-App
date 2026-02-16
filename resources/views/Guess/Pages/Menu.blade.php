@include('Guess.Template.Navbar')

<main class="main">
    <section class="section">
        <div class="container my-4">
            <div class="row">
                <!-- ASIDE PESANAN -->
                <aside class="col-md-3">
                    <div class="card">
                        <div class="card-header fw-bold">
                            Pesanan Dipilih
                        </div>
                        <ul class="list-group list-group-flush" id="orderList">
                            <li class="list-group-item text-muted text-center">
                                Belum ada pesanan
                            </li>
                        </ul>
                    </div>
                </aside>

                <!-- CONTENT -->
                <div class="col-md-9">

                    <!-- SEARCH -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="text" id="searchInput" class="form-control"
                                placeholder="Cari produk...">
                        </div>
                    </div>

                    <!-- PRODUCT GRID -->
                    <div class="row g-3" id="productGrid"></div>

                    <!-- PAGINATION -->
                    <nav>
                        <ul class="pagination justify-content-center mt-4" id="pagination"></ul>
                    </nav>

                </div>
            </div>
        </div>
    </section>
</main>

@include('Guess.Template.Footer')

<style>
.product-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    background: #fff;
}
.product-card:hover {
    box-shadow: 0 0 10px rgba(0,0,0,.1);
}
.product-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
}
.product-info {
    padding: 10px;
}
.product-name {
    font-weight: 600;
}
.product-price {
    color: #198754;
}
.product-meta {
    font-size: 14px;
    color: #6c757d;
}
</style>

<script>
let products = [
    { id: 1, name: "AQUA Elektronik AQR-D190", price: "Rp1.710.000", loc: "Jakarta Pusat", img: "https://via.placeholder.com/300" },
    { id: 2, name: "Kulkas 2 Pintu POLYTRON", price: "Rp588.831", loc: "Toko Kulkas", img: "https://via.placeholder.com/300" },
    { id: 3, name: "Xiaomi Mijia Refrigerator", price: "Rp8.179.000", loc: "Xiaomi Indonesia", img: "https://via.placeholder.com/300" },
    { id: 4, name: "Hisense Inverter Upgrade", price: "Rp8.499.000", loc: "Hisense Official", img: "https://via.placeholder.com/300" },
    { id: 5, name: "LG Smart Refrigerator", price: "Rp6.500.000", loc: "LG Official", img: "https://via.placeholder.com/300" },
    { id: 6, name: "Samsung Twin Cooling", price: "Rp7.200.000", loc: "Samsung Store", img: "https://via.placeholder.com/300" }
];

const grid = document.getElementById('productGrid');
const pagination = document.getElementById('pagination');
const searchInput = document.getElementById('searchInput');
const orderList = document.getElementById('orderList');
const totalItem = document.getElementById('totalItem');

let currentPage = 1;
const itemsPerPage = 4;
let filteredProducts = [...products];
let orders = [];

function renderProducts() {
    grid.innerHTML = '';
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;

    filteredProducts.slice(start, end).forEach(p => {
        grid.innerHTML += `
            <div class="col-md-3">
                <div class="product-card" onclick="addOrder(${p.id})">
                    <img src="${p.img}" class="product-image">
                    <div class="product-info">
                        <div class="product-name">${p.name}</div>
                        <div class="product-price">${p.price}</div>
                        <div class="product-meta">${p.loc}</div>
                    </div>
                </div>
            </div>
        `;
    });

    renderPagination();
}

function renderPagination() {
    pagination.innerHTML = '';
    const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);

    for (let i = 1; i <= totalPages; i++) {
        pagination.innerHTML += `
            <li class="page-item ${i === currentPage ? 'active' : ''}">
                <a class="page-link" href="#" onclick="goToPage(${i})">${i}</a>
            </li>
        `;
    }
}

function goToPage(page) {
    currentPage = page;
    renderProducts();
}

searchInput.addEventListener('keyup', function () {
    const keyword = this.value.toLowerCase();
    filteredProducts = products.filter(p =>
        p.name.toLowerCase().includes(keyword) ||
        p.loc.toLowerCase().includes(keyword)
    );
    currentPage = 1;
    renderProducts();
});

// ORDER LOGIC
function addOrder(id) {
    const product = products.find(p => p.id === id);
    orders.push(product);
    renderOrders();
}

function removeOrder(index) {
    orders.splice(index, 1);
    renderOrders();
}

function renderOrders() {
    orderList.innerHTML = '';

    if (orders.length === 0) {
        orderList.innerHTML = `
            <li class="list-group-item text-muted text-center">
                Belum ada pesanan
            </li>
        `;
    } else {
        orders.forEach((o, i) => {
            orderList.innerHTML += `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>${o.name}</span>
                    <button class="btn btn-sm btn-danger" onclick="removeOrder(${i})">x</button>
                </li>
            `;
        });
    }

    totalItem.innerText = orders.length;
}

// INIT
renderProducts();
</script>
