<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('main') ?>

    <style>
        /* ========== HERO SECTION ========== */
        .hero {
            height: 80vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin-top: 0;
            margin-bottom: 0;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,144C960,149,1056,139,1152,128C1248,117,1344,107,1392,101.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
            opacity: 0.1;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1rem;
            letter-spacing: -1px;
            text-shadow: 2px 2px 20px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            text-shadow: 1px 1px 10px rgba(0, 0, 0, 0.2);
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-hero {
            padding: 14px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-hero-primary {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.4);
            color: white;
            text-decoration: none;
        }

        .btn-hero-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: white;
            transform: translateY(-3px);
            color: white;
            text-decoration: none;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        /* ========== FEATURES SECTION ========== */
        .features-section {
            padding: 80px 0;
            background: var(--bg-light);
        }

        .feature-card {
            text-align: center;
            padding: 40px 30px;
            border-radius: 12px;
            background: white;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
            border-color: var(--primary-color);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-card h4 {
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .feature-card p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        /* ========== PRODUCTS SECTION ========== */

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        .products-section {
            padding: 10px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .section-title p {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
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
            margin-bottom: 15px;
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
            padding: 10px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-add-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
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

        /* ========== STATS SECTION ========== */
        .stats-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            margin: 60px 0;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* ========== CTA SECTION ========== */
        .cta-section {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .cta-content h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .cta-content p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        /* ========== NEWSLETTER SECTION ========== */
        .newsletter-section {
            padding: 80px 0;
            background: var(--bg-light);
        }

        .newsletter-box {
            background: white;
            border-radius: 12px;
            padding: 50px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .newsletter-box h3 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .newsletter-box p {
            color: var(--text-light);
            margin-bottom: 2rem;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
        }

        .newsletter-form input {
            flex: 1;
            padding: 14px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .newsletter-form input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .newsletter-form button {
            padding: 14px 30px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .newsletter-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

     

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .hero-buttons {
                gap: 0.5rem;
            }

            .btn-hero {
                padding: 10px 25px;
                font-size: 0.95rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .newsletter-form {
                flex-direction: column;
            }

         

            .stat-number {
                font-size: 2rem;
            }

            .cta-content h2 {
                font-size: 1.8rem;
            }
        }

     
 
    </style>


<!-- ========== NAVBAR ========== -->


<!-- ========== HERO SECTION ========== -->
<section class="hero">
    <div class="hero-content">
        <h1>Welcome to KACC SHOP</h1>
        <p>Discover premium products at unbeatable prices</p>
        <div class="hero-buttons">
            <a href="/login" class="btn btn-hero btn-hero-primary">
                <i class="fas fa-shopping-cart"></i> Start Shopping
            </a>
            <a href="<?= url_to('register') ?>" class="btn btn-hero btn-hero-secondary">
                <i class="fas fa-user-plus"></i> Create Account
            </a>
        </div>
    </div>
</section>

<!-- ========== FEATURES SECTION ========== -->
<section class="features-section">
    <div class="container-lg">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h4>Fast Shipping</h4>
                    <p>Get your orders delivered quickly to your doorstep</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h4>Secure Payment</h4>
                    <p>Shop with confidence using our secure checkout</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-undo"></i>
                    </div>
                    <h4>Easy Returns</h4>
                    <p>Hassle-free returns within 30 days</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>24/7 Support</h4>
                    <p>Our customer service team is always here to help</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== STATS SECTION ========== -->
<section class="stats-section">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-3 stat-item">
                <div class="stat-number">10K+</div>
                <div class="stat-label">Happy Customers</div>
            </div>
            <div class="col-md-3 stat-item">
                <div class="stat-number">5K+</div>
                <div class="stat-label">Quality Products</div>
            </div>
            <div class="col-md-3 stat-item">
                <div class="stat-number">50+</div>
                <div class="stat-label">Trusted Brands</div>
            </div>
            <div class="col-md-3 stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Satisfaction Rate</div>
            </div>
        </div>
    </div>
</section>

<!-- ========== FEATURED PRODUCTS ========== -->
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
            <div class="product-card" data-price="<?= $product['price'] ?>">
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
                            <button class="btn-add-cart" onclick="addToCart(<?= $product['id'] ?>)">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                        <?php else: ?>
                            <button class="btn-add-cart" onclick="window.location.href='<?= site_url('login') ?>'">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
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

<!-- ========== CTA SECTION ========== -->
<section class="cta-section">
    <div class="container-lg">
        <div class="cta-content">
            <h2>Ready to Start Shopping?</h2>
            <p>Join thousands of satisfied customers and enjoy premium products at great prices</p>
            <a href="<?= url_to('register') ?>" class="btn btn-hero btn-hero-primary">
                <i class="fas fa-user-plus"></i> Create Your Account
            </a>
        </div>
    </div>
</section>

<!-- ========== NEWSLETTER SECTION ========== -->
<section class="newsletter-section">
    <div class="container-lg">
        <div class="newsletter-box">
            <h3>Subscribe to Our Newsletter</h3>
            <p>Get exclusive deals, early access to new products, and special offers delivered to your inbox</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit">
                    <i class="fas fa-paper-plane"></i> Subscribe
                </button>
            </form>
        </div>
    </div>
</section>

<!-- ========== FOOTER ========== -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Set current year in footer
    document.getElementById('year').textContent = new Date().getFullYear();

    // Add to cart button (placeholder functionality)
    document.querySelectorAll('.btn-add-cart').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (this.href === '/login') {
                return; // Allow navigation to login
            }
            e.preventDefault();
            alert('Product added to cart!');
        });
    });

    // Wishlist button functionality
    document.querySelectorAll('.btn-wishlist').forEach(btn => {
        btn.addEventListener('click', function() {
            this.classList.toggle('active');
            const icon = this.querySelector('i');
            if (this.classList.contains('active')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                this.style.background = '#ef4444';
                this.style.color = 'white';
            } else {
                icon.classList.add('far');
                icon.classList.remove('fas');
                this.style.background = '#f1f5f9';
                this.style.color = 'var(--primary-color)';
            }
        });
    });

    // Newsletter form
    document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Thank you for subscribing! Check your email for updates.');
        this.reset();
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
</script>


<?= $this->endSection() ?>