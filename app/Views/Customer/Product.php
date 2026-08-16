<?= $this->extend(config('Auth')->views['layout']) ?>
<?= $this->section('pageStyles') ?>
<style>
    /* ========== BREADCRUMB ========== */
    .breadcrumb-section {
        padding: 20px 0;
        font-size: 0.9rem;
        color: var(--text-light);
    }

    .breadcrumb-section a {
        color: var(--text-light);
        text-decoration: none;
    }

    .breadcrumb-section a:hover {
        color: var(--primary-color);
    }

    /* ============================================================
    Product Detail — modernized
    ============================================================ */

    .product-detail-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        max-width: 1100px;
        margin: 0 auto;
        padding: 32px 16px 64px;
        align-items: start;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        color: white;
    }

    /* ---------- Image column ---------- */
    .product-detail-image {
        position: relative;
        background: #f9fafb;
        border-radius: 16px;
        padding: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
    }

    #mainProductImage {
        width: 100%;
        max-height: 380px;
        object-fit: cover;
        border-radius: 12px;
        display: block;
        background: #fff;
        box-shadow: 0 8px 24px rgba(255, 255, 255, 0.7), 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .product-detail-badge {
        position: absolute;
        top: 24px;
        right: 24px;
        background: linear-gradient(135deg, #f59e0b, #f97316);
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.03em;
        text-transform: uppercase;
        padding: 6px 12px;
        border-radius: 999px;
        box-shadow: 0 2px 6px rgba(249, 115, 22, 0.35);
    }

    .product-thumbnails {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin-top: 12px;
    }

    .product-thumbnails .thumbnail {
        width: 100%;
        height: 70px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid transparent;
        cursor: pointer;
        opacity: 0.7;
        transition: opacity 0.15s ease, border-color 0.15s ease, transform 0.15s ease;
    }

    .product-thumbnails .thumbnail:hover {
        opacity: 1;
        transform: translateY(-2px);
    }

    .product-thumbnails .thumbnail.active {
        border-color: #2563eb;
        opacity: 1;
    }

    /* ---------- Info column ---------- */
    .product-detail-info {
        min-width: 0;
    }

    .product-detail-info h1 {
        font-size: 26px;
        font-weight: 700;
        line-height: 1.3;
        margin: 0 0 12px;
        color: white;
    }

    /* Rating */
    .product-detail-rating {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 18px;
    }

    .product-detail-rating .star { color: #e5e7eb; font-size: 15px; }
    .product-detail-rating .star.filled { color: #f59e0b; }
    .product-detail-rating span:last-child { margin-left: 6px; }

    /* Price */
    .product-detail-price {
        display: flex;
        align-items: baseline;
        gap: 10px;
        margin-bottom: 16px;
    }

    .current-price {
        font-size: 30px;
        font-weight: 800;
        color: white;
    }

    .original-price {
        font-size: 16px;
        color: #9ca3af;
        text-decoration: line-through;
    }

    .discount-tag {
        background: #fef2f2;
        color: #dc2626;
        font-size: 12px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 6px;
    }

    /* Stock */
    .product-detail-stock {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 999px;
        margin-bottom: 20px;
    }

    .stock-in {
        background: #ecfdf5;
        color: #059669;
    }

    .stock-low {
        background: #fffbeb;
        color: #d97706;
    }

    .stock-out {
        background: #fef2f2;
        color: #dc2626;
    }

    /* Description */
    .product-detail-description {
        font-size: 14.5px;
        line-height: 1.7;
        color: #4b5563;
        margin: 0 0 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e5e7eb;
    }

    /* Quantity */
    .quantity-selector {
        margin-bottom: 22px;
    }

    .quantity-selector label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    .quantity-controls {
        display: inline-flex;
        align-items: stretch;
        background: #f3f4f6;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        overflow: hidden;
        box-sizing: border-box;
        height: 42px;
    }

    .quantity-controls button {
        box-sizing: border-box;
        width: 40px;
        height: 100%;
        margin: 0;
        padding: 0;
        background: #fff;
        border: none;
        outline: none;
        font-family: inherit;
        font-size: 18px;
        line-height: 1;
        font-weight: 600;
        color: #374151;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        -webkit-appearance: none;
        appearance: none;
        transition: background 0.15s ease, color 0.15s ease;
    }

    .quantity-controls button:first-child {
        border-right: 1px solid #d1d5db;
    }

    .quantity-controls button:last-child {
        border-left: 1px solid #d1d5db;
    }

    .quantity-controls button:hover {
        background: #eef2ff;
        color: #2563eb;
    }

    .quantity-controls input {
        box-sizing: border-box;
        width: 52px;
        height: 100%;
        margin: 0;
        padding: 0;
        border: none;
        outline: none;
        background: #fff;
        text-align: center;
        font-family: inherit;
        font-size: 14px;
        line-height: 1;
        font-weight: 600;
        color: #111827;
        -moz-appearance: textfield;
        appearance: textfield;
    }

    .quantity-controls input::-webkit-outer-spin-button,
    .quantity-controls input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Actions */
    .product-detail-actions {
        display: flex;
        gap: 12px;
        margin-bottom: 12px;
    }

    .btn-detail-add-cart,
    .btn-detail-buy-now {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 14px 20px;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        border: none;
        transition: transform 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
    }

    .btn-detail-add-cart {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #fff;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.28);
    }

    .btn-detail-add-cart:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.35);
    }

    .btn-detail-buy-now {
        background: #eef2ff;
        color: #2563eb;
        border: 1px solid #dbeafe;
    }

    .btn-detail-buy-now:hover {
        background: #dbeafe;
        transform: translateY(-1px);
    }

    .btn-detail-add-cart:disabled,
    .btn-detail-buy-now:disabled {
        background: #e5e7eb;
        color: #9ca3af;
        box-shadow: none;
        cursor: not-allowed;
        transform: none;
    }

    .btn-detail-wishlist-link {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        width: 100%;
        background: none;
        border: none;
        color: #6b7280;
        font-size: 13.5px;
        font-weight: 500;
        cursor: pointer;
        padding: 8px;
        margin-bottom: 8px;
        transition: color 0.15s ease;
    }

    .btn-detail-wishlist-link:hover {
        color: #ef4444;
    }

    /* Trust badges */
    .trust-badges {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-top: 24px;
        padding-top: 22px;
        border-top: 1px solid #e5e7eb;
    }

    .trust-badge {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 8px;
        font-size: 11.5px;
        font-weight: 500;
        color: #6b7280;
        padding: 12px 6px;
        background: #f9fafb;
        border-radius: 10px;
    }

    .trust-badge i {
        font-size: 16px;
        color: #2563eb;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 768px) {
        .product-detail-container {
            grid-template-columns: 1fr;
            gap: 24px;
            padding: 20px 16px 40px;
        }
        #mainProductImage {
            max-height: 300px;
        }
        .product-detail-info h1 {
            font-size: 22px;
        }
        .current-price {
            font-size: 26px;
        }
    }

    /* ========== RELATED PRODUCTS (MODERNIZED) ========== */
    .related-section {
        padding: 70px 0;
    }

    .related-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 35px;
        gap: 20px;
    }

    .related-eyebrow {
        display: inline-block;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--primary-color);
        margin-bottom: 8px;
    }

    .related-header h2 {
        font-size: 1.9rem;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0;
    }

    .related-nav {
        display: flex;
        gap: 10px;
        flex-shrink: 0;
    }

    .related-nav-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 2px solid #e2e8f0;
        background: white;
        color: var(--text-dark);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.25s ease;
        font-size: 0.9rem;
    }

    .related-nav-btn:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }

    .related-scroll-wrapper {
        overflow: hidden;
    }

    .related-track {
        display: flex;
        gap: 22px;
        overflow-x: auto;
        scroll-behavior: smooth;
        scrollbar-width: none;
        padding-bottom: 5px;
    }

    .related-track::-webkit-scrollbar {
        display: none;
    }

    .related-card {
        flex: 0 0 auto;
        width: 250px;
        border-radius: 16px;
        overflow: hidden;
        background: white;
        text-decoration: none;
        color: inherit;
        border: 1px solid #edf2f7;
        transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .related-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px rgba(59, 130, 246, 0.15);
        text-decoration: none;
        color: inherit;
        border-color: transparent;
    }

    .related-card-image {
        position: relative;
        height: 200px;
        overflow: hidden;
        background: #f1f5f9;
    }

    .related-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .related-card:hover .related-card-image img {
        transform: scale(1.08);
    }

    .related-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .related-badge.low {
        background: #fef3c7;
        color: #d97706;
    }

    .related-card-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.55), transparent 55%);
        display: flex;
        align-items: flex-end;
        justify-content: center;
        padding-bottom: 15px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .related-card:hover .related-card-overlay {
        opacity: 1;
    }

    .related-view-btn {
        background: white;
        color: var(--text-dark);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 6px;
        transform: translateY(10px);
        transition: transform 0.3s ease;
    }

    .related-card:hover .related-view-btn {
        transform: translateY(0);
    }

    .related-card-body {
        padding: 16px;
    }

    .related-card-body h6 {
        font-weight: 700;
        font-size: 0.95rem;
        margin-bottom: 10px;
        color: var(--text-dark);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .related-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .related-price {
        font-weight: 800;
        color: var(--primary-color);
        font-size: 1.15rem;
    }

    .related-arrow {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--bg-light);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 0.75rem;
        transition: all 0.3s ease;
    }

    .related-card:hover .related-arrow {
        background: var(--primary-color);
        color: white;
        transform: translateX(3px);
    }


    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
        .related-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .related-header h2 {
            font-size: 1.5rem;
        }

        .related-card {
            width: 200px;
        }

        .related-card-image {
            height: 160px;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="container-lg">

    <!-- ========== BREADCRUMB ========== -->
    <div class="breadcrumb-section">
        <a href="<?= base_url('/') ?>">Home</a>
        <span> / </span>
        <a href="<?= base_url('user') ?>">Products</a>
        <span> / </span>
        <span><?= esc($product['name'] ?? '') ?></span>
    </div>

    <?php if (empty($product)): ?>
        <div class="no-products" style="padding: 80px 20px; text-align: center;">
            <div class="no-products-icon"><i class="fas fa-box-open"></i></div>
            <h3>Product Not Found</h3>
            <p>Sorry, this product doesn't exist or may have been removed.</p>
            <a href="<?= base_url('user') ?>" class="btn btn-hero btn-hero-primary" style="margin-top: 15px; display: inline-block;">
                Back to Products
            </a>
        </div>
    <?php else: ?>

duct detail · PHP
<!-- ========== PRODUCT DETAIL ========== -->
<div class="product-detail-container">
 
<div class="product-detail-image">
 
    <?php
        $mainImage = $product['image'] ?? 'logobusiness.png';
 
        if (!empty($productImages)) {
            $mainImage = $productImages[0]['image'];
        }
    ?>
 
    <img id="mainProductImage"
        src="<?= base_url($mainImage) ?>"
        alt="<?= esc($product['name']) ?>">
 
    <?php
        $created  = strtotime($product['created_at'] ?? date('Y-m-d H:i:s'));
        $daysOld  = (time() - $created) / (60 * 60 * 24);
        $hasStock = array_key_exists('stock', $product);
        $stock    = $hasStock ? (int) $product['stock'] : null;
 
        if ($hasStock && $stock < 10) {
            $badge = 'Low Stock';
        } elseif ($daysOld < 7) {
            $badge = 'New Arrival';
        } elseif ($hasStock && $stock > 50) {
            $badge = 'Best Seller';
        } else {
            $badge = 'Trending';
        }
    ?>
 
    <span class="product-detail-badge"><?= $badge ?></span>
 
    <?php if (!empty($productImages)): ?>
        <div class="product-thumbnails">
            <?php foreach ($productImages as $index => $image): ?>
                <img
                    src="<?= base_url($image['image']) ?>"
                    class="thumbnail <?= $index === 0 ? 'active' : '' ?>"
                    onclick="changeProductImage(this)"
                    alt="">
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
 
</div>
 
<!-- Info -->
<div class="product-detail-info">
    <h1><?= esc($product['name']) ?></h1>
 
    <div class="product-detail-rating">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <span class="star filled"><i class="fas fa-star"></i></span>
        <?php endfor; ?>
        <span>(<?= rand(50, 500) ?> reviews)</span>
    </div>
 
    <div class="product-detail-price">
        <span class="current-price">₱<?= number_format($product['price'], 2) ?></span>
        <span class="original-price">₱<?= number_format($product['price'] * 1.3, 2) ?></span>
        <span class="discount-tag">-23%</span>
    </div>
 
    <?php if ($hasStock): ?>
        <?php if ($stock <= 0): ?>
            <div class="product-detail-stock stock-out">
                <i class="fas fa-times-circle"></i> Out of Stock
            </div>
        <?php elseif ($stock < 10): ?>
            <div class="product-detail-stock stock-low">
                <i class="fas fa-exclamation-circle"></i> Only <?= $stock ?> left in stock
            </div>
        <?php else: ?>
            <div class="product-detail-stock stock-in">
                <i class="fas fa-check-circle"></i> In Stock (<?= $stock ?> available)
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="product-detail-stock stock-in">
            <i class="fas fa-check-circle"></i> In Stock
        </div>
    <?php endif; ?>
 
    <p class="product-detail-description">
        <?= esc($product['description'] ?? 'No description available for this product yet.') ?>
    </p>
 
    <?php if (auth()->loggedIn()): ?>
        <div class="quantity-selector">
            <label>Quantity:</label>
            <div class="quantity-controls">
                <button type="button" id="qtyMinus">−</button>
                <input type="number" id="qtyInput" value="1" min="1" <?= $hasStock ? 'max="' . $stock . '"' : '' ?>>
                <button type="button" id="qtyPlus">+</button>
            </div>
        </div>
 
        <div class="product-detail-actions">
            <button class="btn-detail-add-cart"
                    id="addToCartBtn"
                    data-product-id="<?= $product['id'] ?>"
                    <?= ($hasStock && $stock <= 0) ? 'disabled' : '' ?>>
                <i class="fas fa-cart-plus"></i>
                <?= ($hasStock && $stock <= 0) ? 'Out of Stock' : 'Add to Cart' ?>
            </button>
            <button class="btn-detail-buy-now"
                    id="buyNowBtn"
                    data-product-id="<?= $product['id'] ?>"
                    <?= ($hasStock && $stock <= 0) ? 'disabled' : '' ?>>
                Buy Now
            </button>
        </div>
 
        <button class="btn-detail-wishlist-link" id="wishlistBtn">
            <i class="far fa-heart"></i> Add to wishlist
        </button>
    <?php else: ?>
        <div class="product-detail-actions">
            <a href="<?= site_url('login') ?>" class="btn-detail-add-cart">
                <i class="fas fa-cart-plus"></i> Login to Add to Cart
            </a>
        </div>
    <?php endif; ?>
 
    <div class="trust-badges">
        <div class="trust-badge">
            <i class="fas fa-globe"></i>
            <span>Worldwide shipping</span>
        </div>
        <div class="trust-badge">
            <i class="fas fa-lock"></i>
            <span>Secure payment</span>
        </div>
        <div class="trust-badge">
            <i class="fas fa-shield-alt"></i>
            <span>2 years full warranty</span>
        </div>
    </div>
</div>
 
</div>

</div>

        <!-- ========== RELATED PRODUCTS ========== -->
        <?php
            $related = array_filter($products ?? [], function ($p) use ($product) {
                return $p['id'] != $product['id'];
            });
            $related = array_slice($related, 0, 8);
        ?>

        <?php if (!empty($related)): ?>
            <section class="related-section">
                <div class="container-lg">
                    <div class="related-header">
                        <div>
                            <span class="related-eyebrow">Discover More</span>
                            <h2>You Might Also Like</h2>
                        </div>
                        <div class="related-nav">
                            <button class="related-nav-btn" id="relatedPrev" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="related-nav-btn" id="relatedNext" aria-label="Next">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                    <div class="related-scroll-wrapper">
                        <div class="related-track" id="relatedTrack">
                            <?php foreach ($related as $rp): ?>
                                <a href="<?= base_url('user/product/' . $rp['id']) ?>" class="related-card">
                                    <div class="related-card-image">
                                        <img src="<?= base_url($rp['image'] ?? 'logobusiness.png') ?>" 
                                            alt="<?= esc($rp['name']) ?>" 
                                            loading="lazy">
                                        <?php if ($rp['stock'] < 10): ?>
                                            <span class="related-badge low">Low Stock</span>
                                        <?php endif; ?>
                                        <div class="related-card-overlay">
                                            <span class="related-view-btn">
                                                <i class="fas fa-eye"></i> Quick View
                                            </span>
                                        </div>
                                    </div>
                                    <div class="related-card-body">
                                        <h6><?= esc($rp['name']) ?></h6>
                                        <div class="related-card-footer">
                                            <span class="related-price">₱<?= number_format($rp['price'], 2) ?></span>
                                            <span class="related-arrow"><i class="fas fa-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    <?php endif; ?>

</div>

<?= $this->endSection() ?>

<?= $this->section('pageScripts') ?>
<script>
    // Quantity selector
    const qtyInput = document.getElementById('qtyInput');
    const qtyMinus = document.getElementById('qtyMinus');
    const qtyPlus = document.getElementById('qtyPlus');

    if (qtyMinus && qtyPlus && qtyInput) {
        qtyMinus.addEventListener('click', () => {
            let val = parseInt(qtyInput.value);
            if (val > 1) qtyInput.value = val - 1;
        });

        qtyPlus.addEventListener('click', () => {
            let val = parseInt(qtyInput.value);
            const max = parseInt(qtyInput.getAttribute('max'));
            if (val < max) qtyInput.value = val + 1;
        });
    }

    // Add to cart
    const addToCartBtn = document.getElementById('addToCartBtn');
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', async () => {
            const productId = addToCartBtn.getAttribute('data-product-id');
            const quantity = qtyInput ? parseInt(qtyInput.value) : 1;

            try {
                const response = await fetch('<?= base_url("user/cart/add") ?>/' + productId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ quantity })
                });

                const data = await response.json();

                if (data.success) {
                    const cartCountEl = document.getElementById('cart-count');
                    if (cartCountEl) {
                        cartCountEl.textContent = data.cartCount ?? '';
                    }
                    alert('Product added to cart!');
                } else {
                    alert(data.message || 'Error adding to cart');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Failed to add product to cart');
            }
        });
    }

    // Wishlist toggle
    const wishlistBtn = document.getElementById('wishlistBtn');
    if (wishlistBtn) {
        wishlistBtn.addEventListener('click', () => {
            wishlistBtn.classList.toggle('active');
            const icon = wishlistBtn.querySelector('i');
            icon.classList.toggle('far');
            icon.classList.toggle('fas');
        });
    }

    // Related products horizontal scroll
const relatedTrack = document.getElementById('relatedTrack');
const relatedPrev = document.getElementById('relatedPrev');
const relatedNext = document.getElementById('relatedNext');

if (relatedTrack && relatedPrev && relatedNext) {
    const scrollAmount = 280;

    relatedNext.addEventListener('click', () => {
        relatedTrack.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });

    relatedPrev.addEventListener('click', () => {
        relatedTrack.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });
}

function changeProductImage(el) {
    const mainImage = document.getElementById('mainProductImage');
    if (!mainImage) return;
 
    // Swap the big image to the clicked thumbnail's image
    mainImage.src = el.src;
 
    // Move the "active" highlight to the clicked thumbnail
    document.querySelectorAll('.product-thumbnails .thumbnail')
        .forEach(thumb => thumb.classList.remove('active'));
    el.classList.add('active');
}
</script>
<?= $this->endSection() ?>