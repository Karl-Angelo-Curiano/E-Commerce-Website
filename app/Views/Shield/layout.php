<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->renderSection('title') ?> KACC SHOP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #3b82f6;
            --primary-dark: #1e40af;
            --secondary-color: #8b5cf6;
            --accent-color: #f59e0b;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --bg-light: #f8fafc;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #007efd;
            color: var(--text-dark);
        }

 /* ========== MAIN CONTENT ========== */
        main {
            margin: 0;
            padding: 0;
            padding-top: 0 !important;
            overflow: visible;
        }

        /* ========== HERO SECTION ========== */
        /* ========== HERO SECTION ========== */
            .hero,
        .features-section,
        .stats-section,
        .products-section,
        .cta-section,
        .newsletter-section {
            width: 100vw;
            margin-left: calc(-50vw + 50%);
            padding-left: 0;
            padding-right: 0;
        }
        /* ========== STATS SECTION ========== */
        .stats-section {
            width: 100vw !important;
            margin-left: calc(-50vw + 50%) !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            margin-top: 60px;
            margin-bottom: 60px;
        }
       /* ========== NAVBAR ========== */
        .navbar {
            background: rgba(15, 23, 42, 0.55) !important;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: none;
            padding: 1rem 0;
            transition: background 0.35s ease, box-shadow 0.35s ease, padding 0.35s ease;
        }

        /* Solidifies slightly once the page is scrolled, so it stays legible
        over any content instead of just floating transparently forever.
        Requires the tiny scroll listener below — nothing else changes. */
        .navbar.scrolled {
            background: rgba(15, 23, 42, 0.85) !important;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.25);
            padding: 0.65rem 0;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.03);
        }

        .navbar-brand i {
            font-size: 2rem;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 0 8px rgba(139, 92, 246, 0.35));
        }

        .navbar-nav .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
            margin-left: 1.5rem;
            padding: 0.4rem 0.1rem !important;
            transition: color 0.3s ease, transform 0.2s ease;
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
            transform: translateY(-1px);
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            border-radius: 2px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transition: width 0.3s ease;
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 100%;
        }

        .navbar-nav .nav-link i {
            font-size: 1.1rem;
        }

        /* ========== MAIN CONTAINER ========== */
        main {
            min-height: 70vh;
            padding: 40px 0;
        }

        /* ========== LOGIN/AUTH CARDS ========== */
        .login-card {
            max-width: 500px;
            margin: 50px auto;
            border: none;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            animation: slideInUp 0.5s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: white;
            text-align: center;
            padding: 30px;
            border-radius: 16px 16px 0 0;
        }

        .login-header h3 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .login-header p {
            font-size: 0.95rem;
            opacity: 0.9;
            margin: 0;
        }

        .login-card .card-body {
            padding: 40px;
        }

        /* ========== FORM STYLING ========== */
        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: var(--primary-color);
            font-size: 1.1rem;
            width: 20px;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: #cbd5e1;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        /* ========== CHECKBOX ========== */
        .form-check-input {
            width: 20px;
            height: 20px;
            border: 2px solid #e2e8f0;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .form-check-label {
            color: var(--text-light);
            font-size: 0.9rem;
            cursor: pointer;
            margin-left: 8px;
        }

        /* ========== BUTTONS ========== */
        .btn-dark {
            width: 100%;
            padding: 12px 20px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-dark:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
            background: linear-gradient(135deg, var(--primary-dark), #1e3a8a);
            color: white;
            text-decoration: none;
        }

        .btn-dark:active {
            transform: translateY(0);
        }

        /* ========== ALERTS ========== */
        .alert {
            border: none;
            border-radius: 10px;
            border-left: 4px solid;
            animation: slideDown 0.3s ease-out;
        }

        .alert-danger {
            background: #fee2e2;
            color: #7f1d1d;
            border-left-color: var(--danger-color);
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-left-color: var(--success-color);
        }

        .alert-danger i,
        .alert-success i {
            margin-right: 8px;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ========== LINKS ========== */
        .login-card .text-center {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .login-card .text-center a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .login-card .text-center a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .login-card .text-center p {
            margin-bottom: 8px;
            color: var(--text-light);
            font-size: 0.95rem;
        }

   /* ========== FOOTER ========== */
        footer {
            background: var(--text-dark);
            color: #cbd5e1;
            padding: 60px 0 20px;
            margin-top: 80px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section a {
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--primary-color);
            padding-left: 5px;
        }

        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 1rem;
        }

        .social-icon:hover {
            background: var(--primary-color);
            transform: translateY(-5px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-bottom p {
            margin: 0;
        }
        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }

            .navbar-nav .nav-link {
                margin-left: 0;
                padding: 0.5rem 0;
            }

            main {
                padding: 20px 0;
            }

            .login-card {
                margin: 30px auto;
            }

            .login-card .card-body {
                padding: 30px 20px;
            }

            .login-header {
                padding: 25px 20px;
            }

            .login-header h3 {
                font-size: 1.3rem;
            }
        }

        /* ========== DARK MODE SUPPORT ========== */
        @media (prefers-color-scheme: dark) {
            body {
                background: #1f2937;
            }

            .login-card {
                background: #2d3748;
                color: white;
            }

            .form-control,
            .form-select {
                background: #374151;
                border-color: #4b5563;
                color: white;
            }

            .form-control::placeholder {
                color: #9ca3af;
            }
        }

        /* ===== Cart badge ===== */
        #cart-count {
            transition: transform .2s ease;
        }

        #cart-count.bump {
            animation: cartBump .45s cubic-bezier(.36, 1.5, .5, 1);
        }

        @keyframes cartBump {
            0%   { transform: scale(1) translate(-50%, -50%); }
            35%  { transform: scale(1.6) translate(-31%, -31%); }
            60%  { transform: scale(0.85) translate(-58%, -58%); }
            100% { transform: scale(1) translate(-50%, -50%); }
        }

        /* ping ring, added dynamically via JS as a sibling of #cart-count */
        .cart-ping {
            position: absolute;
            top: 0;
            left: 100%;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: rgba(220, 53, 69, 0.6);
            transform: translate(-50%, -50%) scale(0.6);
            pointer-events: none;
            animation: pingRing .6s ease-out forwards;
        }

        @keyframes pingRing {
            0%   { transform: translate(-50%, -50%) scale(0.6); opacity: 0.7; }
            100% { transform: translate(-50%, -50%) scale(2.2); opacity: 0; }
        }

        .navbar-nav .nav-link {
            position: relative; /* anchors the badge's position-absolute correctly */
        }
    </style>

    <?= $this->renderSection('pageStyles') ?>
</head>

<body>

<!-- ========== NAVBAR ========== -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container-lg">

        <a class="navbar-brand" href="<?= base_url() ?>">
            <i class="fas fa-shopping-bag"></i>
            <span>KACC SHOP</span>
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>

                <?php if (auth()->loggedIn()) : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/orders') ?>">
                            <i class="fas fa-shopping-cart"></i>
                            Cart
                            <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?= $cartCount ?? "" ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('logout') ?>">
                            <i class="fas fa-sign-out-alt"></i> Profile
                        </a>
                    </li>

                <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= url_to('login') ?>">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>

                    <?php if (setting('Auth.allowRegistration')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url_to('register') ?>">
                                <i class="fas fa-user-plus"></i> Register
                            </a>
                        </li>
                    <?php endif; ?>

                <?php endif; ?>

            </ul>

        </div>

    </div>
</nav>

<!-- ========== MAIN CONTENT ========== -->
<main class="container-lg">
    <?= $this->renderSection('main') ?>
</main>

<!-- ========== FOOTER ========== -->
<footer>
    <div class="container-lg">
        <div class="footer-content">
            <div class="footer-section">
                <h5><i class="fas fa-shopping-bag"></i> KACC SHOP</h5>
                <p style="color: #cbd5e1; margin-bottom: 20px;">Your trusted online shopping destination for quality products and great deals.</p>
                <div class="footer-social">
                    <a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="social-icon" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="social-icon" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="footer-section">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h5>Customer Service</h5>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Shipping Info</a></li>
                    <li><a href="#">Returns & Refunds</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h5>Legal</h5>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                    <li><a href="#">Sitemap</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <span id="year"></span> KACC SHOP. All Rights Reserved. | Crafted with <i class="fas fa-heart" style="color: #ef4444;"></i> by Karl Angelo Curiano</p>
            <div style="display: flex; gap: 15px; align-items: center;">
                <span><i class="fas fa-lock"></i> Secure Checkout</span>
                <span><i class="fas fa-shield-alt"></i> Trusted Since 2024</span>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Set current year
    document.getElementById('year').textContent = new Date().getFullYear();

    // Auto-dismiss alerts after 5 seconds
    document.querySelectorAll('.alert').forEach(alert => {
        if (alert.classList.contains('alert-success')) {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 5000);
        }
    });
</script>

<?= $this->renderSection('pageScripts') ?>

</body>
</html>