<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('pageStyles') ?>
<style>

    /* ===== Add to Cart button ===== */
    .btn-add-cart {
        position: relative;
        overflow: hidden;
        transition: background-color .3s ease, border-color .3s ease,
                    color .3s ease, box-shadow .3s ease;
    }

    .btn-add-cart:active {
        transform: scale(0.95);
    }

    .btn-add-cart.added {
        background-color: #198754;
        border-color: #198754;
        color: #fff;
        box-shadow: 0 0 0 4px rgba(25, 135, 84, 0.15);
        pointer-events: none;
        animation: btnPop .35s ease;
    }

    @keyframes btnPop {
        0%   { transform: scale(0.95); }
        60%  { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    /* ripple burst from click point, added dynamically via JS */
    .btn-add-cart .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        pointer-events: none;
        animation: rippleOut .5s ease-out forwards;
    }

    @keyframes rippleOut {
        to { transform: scale(3); opacity: 0; }
    }
    /* ========== PROMO CAROUSEL ========== */
    .promo-carousel {
		margin-top: 20px;
        position: relative;
        height: 400px;
        border-radius: 16px;
        overflow: hidden;
        background: #f1f5f9;
        margin-bottom: 60px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }

    .carousel-container {
        position: relative;
        height: 100%;
        overflow: hidden;
    }

    .promo-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .promo-slide.active {
        opacity: 1;
        z-index: 1;
    }

    .slide-1 {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .slide-2 {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .slide-3 {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .slide-4 {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }

    .promo-content {
        text-align: center;
        color: white;
        position: relative;
        z-index: 2;
        padding: 40px;
    }

    .promo-content h2 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    }

    .promo-content p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        opacity: 0.95;
    }

    .promo-discount {
        display: inline-block;
        background: rgba(255, 255, 255, 0.3);
        padding: 10px 20px;
        border-radius: 20px;
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 2rem;
        backdrop-filter: blur(10px);
    }

    .carousel-controls {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
        z-index: 5;
    }

    .carousel-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid white;
    }

    .carousel-dot.active {
        background: white;
        width: 30px;
        border-radius: 6px;
    }

    .carousel-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 4;
        backdrop-filter: blur(10px);
    }

    .carousel-arrow:hover {
        background: rgba(255, 255, 255, 0.4);
    }

    .carousel-arrow.prev {
        left: 20px;
    }

    .carousel-arrow.next {
        right: 20px;
    }

    /* ========== PRODUCTS SECTION ========== */
    .products-container {
        padding-bottom: 60px;
    }

    .products-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .products-controls {
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
    }

  .search-box {
        position: relative;
    }

    .search-box input {
        padding: 12px 44px 12px 18px;
        border: 2px solid #e2e8f0;
        border-radius: 50px;
        width: 200px;
        font-size: 0.95rem;
        background: #f8fafc;
        transition: width 0.35s ease, border-color 0.3s ease,
                    box-shadow 0.3s ease, background 0.3s ease;
    }

    .search-box input::placeholder {
        color: #94a3b8;
        transition: opacity 0.2s ease;
    }

    .search-box input:hover {
        border-color: #cbd5e1;
    }

    .search-box input:focus {
        outline: none;
        width: 450px;
        background: #fff;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12),
                    0 4px 12px rgba(59, 130, 246, 0.08);
    }

    .search-box input:focus::placeholder {
        opacity: 0.5;
    }

    .search-box i {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-light);
        transition: color 0.3s ease, transform 0.3s ease, opacity 0.3s ease;
        pointer-events: none;
    }

    .search-box input:focus ~ i {
        color: var(--primary-color);
        transform: translateY(-50%) scale(0.9);
    }

    /* Icon fades/shrinks once there's actual text, making room to feel like
    a "searching" state rather than an empty field with a stuck icon */
    .search-box input:not(:placeholder-shown) ~ i {
        opacity: 0.35;
    }

    .filter-sort {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .filter-btn, .sort-btn {
        padding: 10px 20px;
        border: 2px solid #e2e8f0;
        background: white;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .filter-btn:hover, .sort-btn:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .filter-btn.active, .sort-btn.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }

    .product-card {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        animation: fadeIn 0.5s ease-out;
        cursor: pointer;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
    }

    .product-image {
        height: 250px;
        overflow: hidden;
        position: relative;
        background: #f1f5f9;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.1);
    }

    .product-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, var(--accent-color), #d97706);
        color: white;
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .product-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-title {
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 10px;
        color: var(--text-dark);
        min-height: 50px;
    }

    .product-rating {
        margin-bottom: 12px;
        font-size: 0.9rem;
    }

    .star {
        color: #fbbf24;
        margin-right: 2px;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: 10px;
    }

    .product-original-price {
        font-size: 0.95rem;
        color: var(--text-light);
        text-decoration: line-through;
        margin-right: 10px;
    }

    .product-footer {
        display: flex;
        gap: 10px;
        margin-top: auto;
    }

    .btn-add-cart {
        flex: 1;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-add-cart:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        color: white;
        text-decoration: none;
    }

    .btn-wishlist {
        background: #f1f5f9;
        border: none;
        width: 45px;
        height: 45px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 1.2rem;
    }

    .btn-wishlist:hover {
        background: var(--primary-color);
        color: white;
        transform: scale(1.05);
    }

    .btn-wishlist.active {
        background: #ef4444;
        color: white;
    }

    /* ========== PAGINATION ========== */
    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .pagination-btn {
        padding: 10px 16px;
        border: 2px solid #e2e8f0;
        background: white;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .pagination-btn:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .pagination-btn.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .pagination-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* ========== NO PRODUCTS ========== */
    .no-products {
        text-align: center;
        padding: 60px 20px;
    }

    .no-products-icon {
        font-size: 4rem;
        color: var(--text-light);
        margin-bottom: 1rem;
    }

    .no-products h3 {
        font-size: 1.8rem;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .no-products p {
        color: var(--text-light);
        font-size: 1rem;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
        .products-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .products-title {
            font-size: 1.8rem;
        }

        .products-controls {
            width: 100%;
            flex-direction: column;
        }

        .search-box input {
            width: 100%;
        }

        .filter-sort {
            width: 100%;
            flex-wrap: wrap;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .promo-carousel {
            height: 300px;
        }

        .promo-content h2 {
            font-size: 2rem;
        }

        .carousel-arrow {
            width: 40px;
            height: 40px;
        }

        .carousel-arrow.prev {
            left: 10px;
        }

        .carousel-arrow.next {
            right: 10px;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="container-lg">

    <!-- ========== PROMO CAROUSEL ========== -->
    <div class="promo-carousel">
        <div class="carousel-container">
            <!-- Slide 1 -->
            <div class="promo-slide active slide-1">
                <div class="promo-content">
                    <div class="promo-discount">UP TO 50% OFF</div>
                    <h2>Summer Sale</h2>
                    <p>Get amazing discounts on selected items. Limited time offer!</p>
                    <a href="#" class="btn btn-hero btn-hero-primary">Shop Now</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="promo-slide slide-2">
                <div class="promo-content">
                    <div class="promo-discount">EXCLUSIVE</div>
                    <h2>New Arrivals</h2>
                    <p>Check out our latest collection of premium products.</p>
                    <a href="#" class="btn btn-hero btn-hero-primary">Explore</a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="promo-slide slide-3">
                <div class="promo-content">
                    <div class="promo-discount">FREE SHIPPING</div>
                    <h2>Orders Over ₱999</h2>
                    <p>Enjoy free delivery on all orders above ₱999. No hidden charges!</p>
                    <a href="#" class="btn btn-hero btn-hero-primary">Start Shopping</a>
                </div>
            </div>

            <!-- Slide 4 -->
            <div class="promo-slide slide-4">
                <div class="promo-content">
                    <div class="promo-discount">FLASH SALE</div>
                    <h2>24 Hours Only</h2>
                    <p>Massive discounts on electronics and fashion items. Don't miss out!</p>
                    <a href="#" class="btn btn-hero btn-hero-primary">View Deals</a>
                </div>
            </div>

            <!-- Carousel Controls -->
            <div class="carousel-arrow prev" onclick="previousSlide()">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="carousel-arrow next" onclick="nextSlide()">
                <i class="fas fa-chevron-right"></i>
            </div>

            <div class="carousel-controls">
                <div class="carousel-dot active" onclick="goToSlide(0)"></div>
                <div class="carousel-dot" onclick="goToSlide(1)"></div>
                <div class="carousel-dot" onclick="goToSlide(2)"></div>
                <div class="carousel-dot" onclick="goToSlide(3)"></div>
            </div>
        </div>
    </div>

    <!-- ========== PRODUCTS SECTION ========== -->
    <div class="products-container">

        <!-- Header with Search and Filters -->
        <div class="products-header">
            <div class="products-controls">
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Search products..." onkeyup="filterProducts()">
                    <i class="fas fa-search"></i>
                </div>
                <div class="filter-sort">
                    <button class="sort-btn active" onclick="sortProducts('featured')">
                        <i class="fas fa-star"></i> Featured
                    </button>
                    <button class="sort-btn" onclick="sortProducts('price-low')">
                        <i class="fas fa-arrow-up"></i> Price: Low to High
                    </button>
                    <button class="sort-btn" onclick="sortProducts('price-high')">
                        <i class="fas fa-arrow-down"></i> Price: High to Low
                    </button>
                    <button class="sort-btn" onclick="sortProducts('newest')">
                        <i class="fas fa-calendar"></i> Newest
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="products-grid" id="productsGrid">
            
            <?php if (empty($products)): ?>
                <div class="no-products" style="grid-column: 1/-1;">
                    <div class="no-products-icon">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <h3>No Products Found</h3>
                    <p>Sorry, we couldn't find any products matching your criteria.</p>
                </div>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card" data-product-id="<?= $product['id'] ?>">
                        <div class="product-image">
                            <img src="<?= base_url($product['image'] ?? 'logobusiness.png') ?>" 
                                alt="<?= $product['name'] ?>">
                            <span class="product-badge">
                                <?php
                                    $created = strtotime($product['created_at'] ?? date('Y-m-d H:i:s'));
                                    $now = time();
                                    $daysOld = ($now - $created) / (60 * 60 * 24);

                                    if ($product['stock'] < 10) {
                                        echo 'Low Stock';
                                    } elseif ($daysOld < 7) {
                                        echo 'New Arrival';
                                    } elseif ($product['stock'] > 50) {
                                        echo 'Best Seller';
                                    } else {
                                        echo 'Trending';
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="product-body">
                            <h5 class="product-title"><?= $product['name'] ?></h5>
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i></span>
                                <span class="star"><i class="fas fa-star"></i></span>
                                <span class="star"><i class="fas fa-star"></i></span>
                                <span class="star"><i class="fas fa-star"></i></span>
                                <span class="star"><i class="fas fa-star"></i></span>
                                <span>(<?= rand(50, 500) ?> reviews)</span>
                            </div>
                            <div>
                                <span class="product-original-price">₱<?= number_format($product['price'] * 1.3, 2) ?></span>
                                <span class="product-price">₱<?= number_format($product['price'], 2) ?></span>
                            </div>
                            <p style="color: var(--text-light); font-size: 0.85rem; margin-bottom: 10px;">
                                Stock: <strong><?= $product['stock'] ?></strong>
                            </p>
                            <div class="product-footer">
                                <?php if (auth()->loggedIn()): ?>
                                    <button class="btn-add-cart" data-product-id="<?= $product['id'] ?>">
                                        <i class="fas fa-cart-plus"></i> Add to Cart
                                    </button>
                                <?php else: ?>
                                    <a href="<?= site_url('login') ?>" class="btn-add-cart">
                                        <i class="fas fa-cart-plus"></i> Add to Cart
                                    </a>
                                <?php endif; ?>
                                <button class="btn-wishlist" onclick="toggleWishlist(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
 
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            <button class="pagination-btn" onclick="previousPage()">&laquo; Previous</button>
            <button class="pagination-btn active" onclick="goToPage(1)">1</button>
            <button class="pagination-btn" onclick="goToPage(2)">2</button>
            <button class="pagination-btn" onclick="goToPage(3)">3</button>
            <button class="pagination-btn" onclick="nextPage()">Next &raquo;</button>
        </div>

    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('pageScripts') ?>
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.promo-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    const totalSlides = slides.length;

    // Auto-rotate carousel every 5 seconds
    setInterval(() => {
        nextSlide();
    }, 5000);

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    }

    function previousSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }

    function goToSlide(n) {
        currentSlide = n;
        updateCarousel();
    }

    function updateCarousel() {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }

    // Wishlist functionality
    function toggleWishlist(button) {
        button.classList.toggle('active');
        const icon = button.querySelector('i');
        if (button.classList.contains('active')) {
            icon.classList.remove('far');
            icon.classList.add('fas');
        } else {
            icon.classList.add('far');
            icon.classList.remove('fas');
        }
    }

    // Search products
    function filterProducts() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const products = document.querySelectorAll('.product-card');
        
        products.forEach(product => {
            const title = product.querySelector('.product-title').textContent.toLowerCase();
            if (title.includes(searchInput)) {
                product.style.display = '';
            } else {
                product.style.display = 'none';
            }
        });
    }

    // Sort products
    function sortProducts(sortType) {
        const products = Array.from(document.querySelectorAll('.product-card'));
        
        products.sort((a, b) => {
            const priceA = parseInt(a.getAttribute('data-price'));
            const priceB = parseInt(b.getAttribute('data-price'));
            
            if (sortType === 'price-low') {
                return priceA - priceB;
            } else if (sortType === 'price-high') {
                return priceB - priceA;
            }
            return 0;
        });

        const grid = document.getElementById('productsGrid');
        products.forEach(product => grid.appendChild(product));

        // Update button states
        document.querySelectorAll('.sort-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
    }

    // Pagination
    let currentPage = 1;

    function goToPage(page) {
        currentPage = page;
        document.querySelectorAll('.pagination-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
    }

    function nextPage() {
        currentPage++;
    }

    function previousPage() {
        if (currentPage > 1) currentPage--;
    }

  // Option 1: POST with product ID in URL
// Add to Cart functionality
document.querySelectorAll('.btn-add-cart').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        e.preventDefault();
        
        // Get product ID from data attribute
        const productId = btn.getAttribute('data-product-id');
        
        if (!productId) {
            alert('Product ID not found');
            return;
        }
        
        try {
            const response = await fetch('<?= base_url("user/cart/add") ?>/' + productId, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            const data = await response.json();

            if (data.success) {
                document.getElementById('cart-count').textContent = data.cartCount ?? "";
            } else {
                alert(data.message || 'Error adding to cart');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to add product to cart');
        }
    });
});
// Product card click - navigate to product detail page
document.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('click', (e) => {
        // Don't trigger if clicking add-to-cart, wishlist, or their child elements (icons, etc.)
        if (e.target.closest('.btn-add-cart') || e.target.closest('.btn-wishlist')) {
            return;
        }

        const productId = card.getAttribute('data-product-id');
        if (!productId) return;

        window.location.href = '<?= base_url("user/product") ?>/' + productId;
    });
});


document.addEventListener('DOMContentLoaded', function () {

    var cartCountEl = document.getElementById('cart-count');

    // The badge's parent (.nav-link) needs position:relative for the ping
    // ring to anchor correctly. Setting it here via JS so nothing in your
    // PHP/HTML has to change.
    if (cartCountEl && cartCountEl.parentElement) {
        cartCountEl.parentElement.style.position = 'relative';
    }

    document.querySelectorAll('.btn-add-cart').forEach(function (btn) {

        var originalHTML = btn.innerHTML;

        btn.addEventListener('click', function (e) {

            var productId = btn.dataset.productId;

            triggerFeedback(e);

            function triggerFeedback(e) {
                // Ripple burst from click point
                var rect = btn.getBoundingClientRect();
                var ripple = document.createElement('span');
                var size = Math.max(rect.width, rect.height);
                ripple.className = 'ripple';
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                btn.appendChild(ripple);
                setTimeout(function () { ripple.remove(); }, 500);

                // Button state swap
                btn.classList.add('added');
                btn.innerHTML = '<i class="fas fa-check"></i> Added!';

                setTimeout(function () {
                    btn.classList.remove('added');
                    btn.innerHTML = originalHTML;
                }, 1500);

                // Badge bounce
                cartCountEl.classList.remove('bump');
                void cartCountEl.offsetWidth; // force reflow to restart animation
                cartCountEl.classList.add('bump');

                // Ping ring, injected next to the badge, then removed after it plays
                var ping = document.createElement('span');
                ping.className = 'cart-ping';
                cartCountEl.parentElement.appendChild(ping);
                setTimeout(function () { ping.remove(); }, 600);
            }
        });
    });

});

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.search-box input').forEach(function (input) {
        var icon = input.parentElement.querySelector('i');
        if (!icon) return;

        var searchIconClass = icon.className; // remember original (e.g. "fas fa-search")

        input.addEventListener('input', function () {
            if (input.value.length > 0) {
                icon.className = 'fas fa-times';
                icon.style.pointerEvents = 'auto';
                icon.style.cursor = 'pointer';
            } else {
                icon.className = searchIconClass;
                icon.style.pointerEvents = 'none';
                icon.style.cursor = 'default';
            }
        });

        icon.addEventListener('click', function () {
            if (input.value.length > 0) {
                input.value = '';
                input.dispatchEvent(new Event('input')); // resets icon back to search
                input.focus();
            }
        });
    });
});
</script>
<?= $this->endSection() ?>