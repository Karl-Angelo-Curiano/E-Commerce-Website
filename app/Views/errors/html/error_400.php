<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: white;
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ========== MAIN CONTENT ========== */
        main {
            margin: 0;
            padding: 0;
            padding-top: 0 !important;
            overflow: visible;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-page {
            min-height: 100vh;
            display: flex;
            justify-content: center; /* Horizontal */
            align-items: center;     /* Vertical */
        }

        .wrap {
            font-size: 1.8rem;
            font-weight: 800;
            text-align: center;
            max-width: 600px;
            padding: 2rem;
        }

        .wrap h1 {
            font-size: 5rem;
            margin-bottom: 1rem;
        }

        .wrap p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        /* ========== NAVBAR ========== */
        .navbar {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
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
        }

        .navbar-brand i {
            font-size: 2rem;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar-nav .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
            margin-left: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
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
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transition: width 0.3s ease;
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        .navbar-nav .nav-link i {
            font-size: 1.1rem;
        }

        /* ========== ERROR CONTAINER ========== */
        .error-container {
            max-width: 700px;
            margin: 60px auto;
            padding: 40px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            text-align: center;
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

        .error-icon {
            font-size: 5rem;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .error-code {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--danger-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        .error-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .error-description {
            font-size: 1rem;
            color: var(--text-light);
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .error-details {
            background: #f8fafc;
            border-left: 4px solid var(--danger-color);
            padding: 20px;
            border-radius: 8px;
            margin: 30px 0;
            text-align: left;
            font-size: 0.9rem;
            color: var(--text-dark);
        }

        .error-details strong {
            color: var(--text-dark);
            display: block;
            margin-bottom: 8px;
        }

        .error-details code {
            background: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            color: var(--danger-color);
        }

        /* ========== BUTTONS ========== */
        .error-actions {
            display: flex;
            gap: 15px;
            margin-top: 35px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-primary-custom {
            padding: 12px 30px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border: none;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
            background: linear-gradient(135deg, var(--primary-dark), #1e3a8a);
            color: white;
            text-decoration: none;
        }

        .btn-primary-custom:active {
            transform: translateY(0);
        }

        .btn-secondary-custom {
            padding: 12px 30px;
            font-weight: 700;
            background: #e2e8f0;
            border: 2px solid #cbd5e1;
            border-radius: 10px;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-secondary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            background: #cbd5e1;
            text-decoration: none;
            color: var(--text-dark);
        }

        .btn-secondary-custom:active {
            transform: translateY(0);
        }

        /* ========== FOOTER ========== */
        footer {
            background: var(--text-dark);
            color: #cbd5e1;
            padding: 60px 0 20px;
            margin-top: auto;
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

            .error-container {
                margin: 30px auto;
                padding: 30px 20px;
            }

            .error-code {
                font-size: 3rem;
            }

            .error-title {
                font-size: 1.5rem;
            }

            .error-icon {
                font-size: 4rem;
            }

            .error-actions {
                flex-direction: column;
                gap: 10px;
            }

            .btn-primary-custom,
            .btn-secondary-custom {
                width: 100%;
                justify-content: center;
            }
        }

        /* ========== DARK MODE SUPPORT ========== */
        @media (prefers-color-scheme: dark) {
            body {
                background: #1f2937;
            }

            .error-container {
                background: #2d3748;
                color: white;
            }

            .error-title {
                color: white;
            }

            .error-details {
                background: #374151;
                color: #e5e7eb;
            }

            .error-details strong {
                color: white;
            }

            .error-details code {
                background: #2d3748;
                color: #fca5a5;
            }

            .btn-secondary-custom {
                background: #4b5563;
                border-color: #6b7280;
                color: white;
            }

            .btn-secondary-custom:hover {
                background: #6b7280;
                color: white;
            }
        }
    </style>

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

            </ul>

        </div>

    </div>
</nav>
<!-- ========== MAIN CONTENT ========== -->
<main class="container-lg">
<div class="wrap">
    <h1>400</h1>

    <p>
        <?php if (ENVIRONMENT !== 'production') : ?>
            <?= nl2br(esc($message)) ?>
        <?php else : ?>
            <?= lang('Errors.sorryBadRequest') ?>
        <?php endif; ?>
    </p>
</div>
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
</script>


</body>
</html>

