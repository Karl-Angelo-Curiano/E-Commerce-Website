<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXE — Premium Lifestyle Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<!-- NAV -->
<nav>
    <a href="#" class="nav-logo">LUXE</a>
    <ul class="nav-links">
        <li><a href="#">New Arrivals</a></li>
        <li><a href="#">Collections</a></li>
        <li><a href="#">Sale</a></li>
        <li><a href="#">About</a></li>
    </ul>
    <div class="nav-actions">
        <button class="nav-icon">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        </button>
        <button class="nav-icon">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </button>
        <button class="nav-icon">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
            <span class="cart-badge">3</span>
        </button>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-left">
        <span class="hero-eyebrow">New Collection 2025</span>
        <h1 class="hero-headline">
            Curated for the<br>
            <em>discerning</em><br>
            lifestyle
        </h1>
        <p class="hero-subtext">
            Timeless pieces crafted with intention. Where modern aesthetics meet enduring quality.
        </p>
        <div class="hero-ctas">
            <a href="#products" class="btn-primary">Shop the Collection</a>
            <a href="#categories" class="btn-ghost">
                Explore Categories
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
    <div class="hero-right">
        <div class="hero-right-inner">
            <div class="hero-image-placeholder">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                <span>Featured Product Image</span>
            </div>
            <div class="hero-tag">
                <div class="hero-tag-label">Starting from</div>
                <div class="hero-tag-value">$49.00</div>
            </div>
        </div>
    </div>
</section>

<!-- MARQUEE -->
<div class="marquee-strip">
    <div class="marquee-track">
        <span class="marquee-item">Free Shipping Over $150 <span class="marquee-dot"></span></span>
        <span class="marquee-item">New Arrivals Every Week <span class="marquee-dot"></span></span>
        <span class="marquee-item">30-Day Free Returns <span class="marquee-dot"></span></span>
        <span class="marquee-item">Sustainably Sourced Materials <span class="marquee-dot"></span></span>
        <span class="marquee-item">Exclusive Member Discounts <span class="marquee-dot"></span></span>
        <span class="marquee-item">Free Shipping Over $150 <span class="marquee-dot"></span></span>
        <span class="marquee-item">New Arrivals Every Week <span class="marquee-dot"></span></span>
        <span class="marquee-item">30-Day Free Returns <span class="marquee-dot"></span></span>
        <span class="marquee-item">Sustainably Sourced Materials <span class="marquee-dot"></span></span>
        <span class="marquee-item">Exclusive Member Discounts <span class="marquee-dot"></span></span>
    </div>
</div>

<!-- CATEGORIES -->
<section class="section categories" id="categories">
    <div class="section-header">
        <div>
            <div class="section-eyebrow">Browse By</div>
            <h2 class="section-title">Shop <em>Collections</em></h2>
        </div>
        <a href="#" class="btn-ghost">View All
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
    <div class="categories-grid">
        <div class="cat-card cat-card--featured">
            <div class="cat-bg">
                <svg class="cat-bg-icon" width="220" height="220" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </div>
            <div class="cat-overlay"></div>
            <div class="cat-content">
                <div class="cat-tag">Most Popular</div>
                <div class="cat-name">Women's Fashion</div>
                <div class="cat-count">248 products</div>
                <a href="#" class="cat-arrow">
                    Shop Now
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
        <div class="cat-card cat-card--small">
            <div class="cat-bg">
                <svg class="cat-bg-icon" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </div>
            <div class="cat-overlay"></div>
            <div class="cat-content">
                <div class="cat-tag">Trending</div>
                <div class="cat-name">Home & Living</div>
                <div class="cat-count">134 products</div>
            </div>
        </div>
        <div class="cat-card cat-card--small">
            <div class="cat-bg">
                <svg class="cat-bg-icon" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
            </div>
            <div class="cat-overlay"></div>
            <div class="cat-content">
                <div class="cat-tag">New</div>
                <div class="cat-name">Accessories</div>
                <div class="cat-count">89 products</div>
            </div>
        </div>
        <div class="cat-card cat-card--small">
            <div class="cat-bg">
                <svg class="cat-bg-icon" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
            </div>
            <div class="cat-overlay"></div>
            <div class="cat-content">
                <div class="cat-tag">Sale</div>
                <div class="cat-name">Beauty</div>
                <div class="cat-count">72 products</div>
            </div>
        </div>
        <div class="cat-card cat-card--small">
            <div class="cat-bg">
                <svg class="cat-bg-icon" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
            </div>
            <div class="cat-overlay"></div>
            <div class="cat-content">
                <div class="cat-tag">Curated</div>
                <div class="cat-name">Gift Sets</div>
                <div class="cat-count">41 products</div>
            </div>
        </div>
    </div>
</section>

<!-- PRODUCTS -->
<section class="section products" id="products">
    <div class="section-header">
        <div>
            <div class="section-eyebrow">Hand-picked</div>
            <h2 class="section-title">Featured <em>Products</em></h2>
        </div>
    </div>
    <div class="products-filters">
        <button class="filter-btn active" onclick="setFilter(this)">All</button>
        <button class="filter-btn" onclick="setFilter(this)">New Arrivals</button>
        <button class="filter-btn" onclick="setFilter(this)">Best Sellers</button>
        <button class="filter-btn" onclick="setFilter(this)">On Sale</button>
    </div>
    <div class="products-grid">

        <!-- Product 1 -->
        <div class="product-card">
            <div class="product-image">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                <span class="product-badge">Sale</span>
                <button class="product-wishlist">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </button>
                <button class="product-quick-add">+ Quick Add</button>
            </div>
            <div class="product-meta">
                <div class="product-brand">Maison</div>
                <div class="product-name">Linen Relaxed Blazer</div>
                <div class="product-price-row">
                    <span class="product-price">$89.00</span>
                    <span class="product-price-old">$129.00</span>
                </div>
                <div class="product-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star star-empty">★</span>
                </div>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="product-card">
            <div class="product-image">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                <span class="product-badge product-badge--new">New</span>
                <button class="product-wishlist">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </button>
                <button class="product-quick-add">+ Quick Add</button>
            </div>
            <div class="product-meta">
                <div class="product-brand">Atelier Co.</div>
                <div class="product-name">Ceramic Vase Set of 3</div>
                <div class="product-price-row">
                    <span class="product-price">$64.00</span>
                </div>
                <div class="product-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="product-card">
            <div class="product-image">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                <button class="product-wishlist">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </button>
                <button class="product-quick-add">+ Quick Add</button>
            </div>
            <div class="product-meta">
                <div class="product-brand">Studio Nude</div>
                <div class="product-name">Gold-Plated Hoop Earrings</div>
                <div class="product-price-row">
                    <span class="product-price">$48.00</span>
                </div>
                <div class="product-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star star-empty">★</span>
                </div>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="product-card">
            <div class="product-image">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                <span class="product-badge">Sale</span>
                <button class="product-wishlist">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </button>
                <button class="product-quick-add">+ Quick Add</button>
            </div>
            <div class="product-meta">
                <div class="product-brand">Maison</div>
                <div class="product-name">Merino Cashmere Scarf</div>
                <div class="product-price-row">
                    <span class="product-price">$72.00</span>
                    <span class="product-price-old">$95.00</span>
                </div>
                <div class="product-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
            </div>
        </div>

    </div>
    <div style="text-align: center; margin-top: 3.5rem;">
        <a href="#" class="btn-primary">Load More Products</a>
    </div>
</section>

<!-- BANNER -->
<div class="banner">
    <div class="banner-left">
        <div class="banner-eyebrow">Limited Time</div>
        <h2 class="banner-title">Up to <em>40% off</em><br>Summer Essentials</h2>
        <p class="banner-text">
            Our seasonal sale event is here. Discover curated pieces at exceptional prices — available while stocks last.
        </p>
        <a href="#" class="btn-light">Shop the Sale</a>
    </div>
    <div class="banner-right">
        <div class="banner-stats">
            <div class="banner-stat">
                <div class="banner-stat-num">12K+</div>
                <div class="banner-stat-label">Happy Customers</div>
            </div>
            <div class="banner-stat">
                <div class="banner-stat-num">500+</div>
                <div class="banner-stat-label">Products Listed</div>
            </div>
            <div class="banner-stat">
                <div class="banner-stat-num">4.9</div>
                <div class="banner-stat-label">Average Rating</div>
            </div>
            <div class="banner-stat">
                <div class="banner-stat-num">98%</div>
                <div class="banner-stat-label">Satisfaction Rate</div>
            </div>
        </div>
    </div>
</div>

<!-- TESTIMONIALS -->
<section class="section testimonials">
    <div class="section-header">
        <div>
            <div class="section-eyebrow">Customer Stories</div>
            <h2 class="section-title">What They <em>Say</em></h2>
        </div>
    </div>
    <div class="testimonials-grid">
        <div class="testimonial-card">
            <div class="testimonial-stars">
                <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
            </div>
            <p class="testimonial-text">"The quality exceeded every expectation I had. The linen blazer is now my most-worn piece — it transitions seamlessly from morning meetings to evening events."</p>
            <div class="testimonial-author">
                <div class="testimonial-avatar">SM</div>
                <div>
                    <div class="testimonial-name">Sophie M.</div>
                    <div class="testimonial-location">London, UK</div>
                </div>
            </div>
        </div>
        <div class="testimonial-card">
            <div class="testimonial-stars">
                <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
            </div>
            <p class="testimonial-text">"I've been shopping here for two years. The curation is impeccable — every item I've ordered has been exactly as described, beautifully packaged and delivered fast."</p>
            <div class="testimonial-author">
                <div class="testimonial-avatar">JL</div>
                <div>
                    <div class="testimonial-name">James L.</div>
                    <div class="testimonial-location">New York, USA</div>
                </div>
            </div>
        </div>
        <div class="testimonial-card">
            <div class="testimonial-stars">
                <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
            </div>
            <p class="testimonial-text">"Found the most stunning ceramic set for my home. The attention to detail and the sustainable packaging made this feel like a truly premium purchase."</p>
            <div class="testimonial-author">
                <div class="testimonial-avatar">AK</div>
                <div>
                    <div class="testimonial-name">Amara K.</div>
                    <div class="testimonial-location">Paris, France</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NEWSLETTER -->
<section class="newsletter">
    <div class="newsletter-inner">
        <div class="newsletter-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#B8973C" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <h2 class="newsletter-title">Stay in the <em>loop</em></h2>
        <p class="newsletter-text">
            Join our community for early access to new arrivals, exclusive member discounts, and curated style inspiration delivered to your inbox.
        </p>
        <div class="newsletter-form">
            <input type="email" class="newsletter-input" placeholder="Your email address">
            <button class="newsletter-btn">Subscribe</button>
        </div>
        <p class="newsletter-disclaimer">No spam, ever. Unsubscribe at any time.</p>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-top">
        <div>
            <div class="footer-brand-logo">LUXE</div>
            <p class="footer-brand-text">Curating premium lifestyle products for those who value quality, sustainability, and timeless design since 2019.</p>
            <div class="footer-social">
                <button class="social-btn">ig</button>
                <button class="social-btn">tw</button>
                <button class="social-btn">fb</button>
                <button class="social-btn">pi</button>
            </div>
        </div>
        <div>
            <div class="footer-col-title">Shop</div>
            <ul class="footer-links">
                <li><a href="#">New Arrivals</a></li>
                <li><a href="#">Best Sellers</a></li>
                <li><a href="#">Sale</a></li>
                <li><a href="#">Collections</a></li>
                <li><a href="#">Gift Cards</a></li>
            </ul>
        </div>
        <div>
            <div class="footer-col-title">Help</div>
            <ul class="footer-links">
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Shipping & Returns</a></li>
                <li><a href="#">Size Guide</a></li>
                <li><a href="#">Track Order</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
        <div>
            <div class="footer-col-title">Company</div>
            <ul class="footer-links">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Sustainability</a></li>
                <li><a href="#">Press</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p class="footer-copy">© <?= date('Y') ?> LUXE Store. All rights reserved.</p>
        <div class="footer-payments">
            <span class="payment-badge">Visa</span>
            <span class="payment-badge">Mastercard</span>
            <span class="payment-badge">PayPal</span>
            <span class="payment-badge">GCash</span>
        </div>
    </div>
</footer>

<script>
    function setFilter(btn) {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
    }
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('nav');
        nav.style.boxShadow = window.scrollY > 10 ? '0 2px 24px rgba(28,28,26,0.08)' : '';
    });
</script>
</body>
</html>