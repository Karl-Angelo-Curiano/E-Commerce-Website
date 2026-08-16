<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MyShop | Create Your Account</title>

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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
        }

        .navbar-nav .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
            margin-left: 1.5rem;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        /* ========== MAIN CONTENT ========== */
        .register-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .register-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            max-width: 1100px;
            width: 100%;
            align-items: center;
        }

        .register-benefits {
            color: white;
        }

        .register-benefits h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 30px;
            line-height: 1.2;
        }

        .benefit-item {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
            align-items: flex-start;
        }

        .benefit-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
            backdrop-filter: blur(10px);
        }

        .benefit-content h4 {
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 1.1rem;
        }

        .benefit-content p {
            opacity: 0.9;
            font-size: 0.95rem;
            margin: 0;
        }

        /* ========== REGISTER CARD ========== */
        .register-card {
            background: white;
            border: none;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            animation: slideInRight 0.5s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .register-header {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .register-header h3 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .register-header p {
            font-size: 0.95rem;
            opacity: 0.9;
            margin: 0;
        }

        .register-body {
            padding: 40px;
        }

        /* ========== FORM STYLING ========== */
        .form-group {
            margin-bottom: 20px;
        }

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
            font-family: inherit;
        }

        .form-control::placeholder {
            color: #cbd5e1;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .form-control.is-invalid {
            border-color: var(--danger-color);
        }

        .form-control.is-invalid:focus {
            border-color: var(--danger-color);
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .form-control.is-valid {
            border-color: var(--success-color);
        }

        .form-control.is-valid:focus {
            border-color: var(--success-color);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        /* ========== PASSWORD STRENGTH ========== */
        .password-strength-container {
            margin-top: 12px;
            display: none;
        }

        .password-strength-bar {
            height: 6px;
            background: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 8px;
        }

        .password-strength-fill {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 10px;
        }

        .password-strength-fill.weak {
            background: var(--danger-color);
            width: 33%;
        }

        .password-strength-fill.medium {
            background: var(--accent-color);
            width: 66%;
        }

        .password-strength-fill.strong {
            background: var(--success-color);
            width: 100%;
        }

        .password-strength-text {
            font-size: 0.8rem;
            font-weight: 600;
        }

        .password-strength-text.weak {
            color: var(--danger-color);
        }

        .password-strength-text.medium {
            color: var(--accent-color);
        }

        .password-strength-text.strong {
            color: var(--success-color);
        }

        /* ========== CHECKBOX ========== */
        .form-check {
            margin-bottom: 25px;
        }

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
            outline: none;
        }

        .form-check-label {
            color: var(--text-light);
            font-size: 0.9rem;
            cursor: pointer;
            margin-left: 8px;
        }

        .form-check-label a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .form-check-label a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* ========== BUTTONS ========== */
        .btn-register {
            width: 100%;
            padding: 14px 20px;
            font-size: 1rem;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .btn-register:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* ========== LOGIN LINK ========== */
        .login-link-container {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .login-link-container p {
            color: var(--text-light);
            margin-bottom: 0;
            font-size: 0.95rem;
        }

        .login-link-container a {
            color: var(--primary-color);
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 8px;
        }

        .login-link-container a:hover {
            color: var(--primary-dark);
            gap: 5px;
        }

        /* ========== ERROR MESSAGE ========== */
        .alert-error {
            background: #fee2e2;
            color: #7f1d1d;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 16px;
            margin-bottom: 20px;
            display: none;
        }

        .alert-error.show {
            display: block;
            animation: slideDown 0.3s ease-out;
        }

        .alert-error i {
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

        /* ========== FOOTER ========== */
        footer {
            background: var(--text-dark);
            color: #cbd5e1;
            padding: 30px 0 10px;
            margin-top: auto;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .register-container {
                grid-template-columns: 1fr;
            }

            .register-benefits {
                display: none;
            }

            .register-benefits.mobile-visible {
                display: block;
                margin-bottom: 30px;
                text-align: center;
            }

            .register-body {
                padding: 30px 20px;
            }

            .register-header {
                padding: 25px 20px;
            }

            .register-header h3 {
                font-size: 1.5rem;
            }

            .benefit-item {
                flex-direction: column;
                text-align: center;
                margin-bottom: 20px;
            }

            .benefit-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
                margin: 0 auto;
            }

            .register-benefits h2 {
                font-size: 1.8rem;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<!-- ========== NAVBAR ========== -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container-lg">
        <a class="navbar-brand" href="/">
            <i class="fas fa-shopping-bag"></i> MyShop
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/register">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ========== REGISTER SECTION ========== -->
<div class="register-wrapper">
    <div class="container-lg">
        <div class="register-container">
            
            <!-- Benefits Column -->
            <div class="register-benefits">
                <h2>Join Thousands of Happy Shoppers</h2>

                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Quick Setup</h4>
                        <p>Create your account in less than a minute</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Secure & Safe</h4>
                        <p>Your data is encrypted and protected</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Exclusive Offers</h4>
                        <p>Get member-only discounts and deals</p>
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="benefit-content">
                        <h4>Fast Delivery</h4>
                        <p>Free shipping on orders over ₱1,000</p>
                    </div>
                </div>
            </div>

            <!-- Register Form Column -->
            <div>
                <div class="register-card">

                    <div class="register-header">
                        <h3><i class="fas fa-user-plus"></i> Create Account</h3>
                        <p>Join MyShop and start shopping today</p>
                    </div>

                    <div class="register-body">

                        <!-- Error Alert -->
                        <div class="alert-error" id="errorAlert">
                            <i class="fas fa-exclamation-circle"></i>
                            <span id="errorMessage"></span>
                        </div>

                        <form action="/register" method="post" id="registerForm" novalidate>

                            <!-- Full Name -->
                            <div class="form-group">
                                <label class="form-label" for="name">
                                    <i class="fas fa-user"></i> Full Name
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Enter your full name"
                                    required>
                                <div class="invalid-feedback d-block" style="display: none; color: #ef4444; font-size: 0.85rem; margin-top: 6px;">
                                    Please enter your full name (at least 3 characters)
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label class="form-label" for="email">
                                    <i class="fas fa-envelope"></i> Email Address
                                </label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Enter your email address"
                                    required>
                                <div class="invalid-feedback d-block" style="display: none; color: #ef4444; font-size: 0.85rem; margin-top: 6px;">
                                    Please enter a valid email address
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label class="form-label" for="password">
                                    <i class="fas fa-lock"></i> Password
                                </label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Create a strong password"
                                    required>
                                <div class="password-strength-container" id="passwordStrength">
                                    <div class="password-strength-bar">
                                        <div class="password-strength-fill"></div>
                                    </div>
                                    <div class="password-strength-text">Password Strength: <span id="strengthText">Weak</span></div>
                                </div>
                                <div class="invalid-feedback d-block" style="display: none; color: #ef4444; font-size: 0.85rem; margin-top: 6px;">
                                    Password must be at least 8 characters long
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label class="form-label" for="confirmPassword">
                                    <i class="fas fa-check-circle"></i> Confirm Password
                                </label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="confirmPassword"
                                    name="confirm_password"
                                    placeholder="Confirm your password"
                                    required>
                                <div class="invalid-feedback d-block" style="display: none; color: #ef4444; font-size: 0.85rem; margin-top: 6px;">
                                    Passwords do not match
                                </div>
                            </div>

                            <!-- Terms Checkbox -->
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="terms"
                                    name="terms"
                                    required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" target="_blank">Terms & Conditions</a> and <a href="#" target="_blank">Privacy Policy</a>
                                </label>
                            </div>

                            <!-- Register Button -->
                            <button type="submit" class="btn-register">
                                <i class="fas fa-user-plus"></i> Create My Account
                            </button>

                        </form>

                        <!-- Login Link -->
                        <div class="login-link-container">
                            <p>Already have an account?</p>
                            <a href="/login">
                                <i class="fas fa-sign-in-alt"></i> Login here
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- ========== FOOTER ========== -->
<footer>
    <div class="container-lg">
        <p>&copy; <span id="year"></span> MyShop. All Rights Reserved. | Made with <i class="fas fa-heart" style="color: #ef4444;"></i> for our customers</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Set current year
    document.getElementById('year').textContent = new Date().getFullYear();

    // Form validation
    const form = document.getElementById('registerForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const termsInput = document.getElementById('terms');
    const errorAlert = document.getElementById('errorAlert');
    const errorMessage = document.getElementById('errorMessage');

    // Real-time validation
    nameInput.addEventListener('blur', validateName);
    emailInput.addEventListener('blur', validateEmail);
    passwordInput.addEventListener('input', validatePassword);
    confirmPasswordInput.addEventListener('blur', validatePasswordMatch);
    termsInput.addEventListener('change', validateTerms);

    function validateName() {
        const value = nameInput.value.trim();
        if (value.length >= 3) {
            nameInput.classList.remove('is-invalid');
            nameInput.classList.add('is-valid');
            return true;
        } else {
            nameInput.classList.add('is-invalid');
            return false;
        }
    }

    function validateEmail() {
        const value = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailRegex.test(value)) {
            emailInput.classList.remove('is-invalid');
            emailInput.classList.add('is-valid');
            return true;
        } else {
            emailInput.classList.add('is-invalid');
            return false;
        }
    }

    function validatePassword() {
        const value = passwordInput.value;
        const strengthContainer = document.getElementById('passwordStrength');
        const strengthFill = strengthContainer.querySelector('.password-strength-fill');
        const strengthText = document.getElementById('strengthText');

        strengthContainer.style.display = value ? 'block' : 'none';

        let strength = 'weak';
        if (value.length >= 12 && /[A-Z]/.test(value) && /[0-9]/.test(value) && /[^A-Za-z0-9]/.test(value)) {
            strength = 'strong';
        } else if (value.length >= 8 && /[A-Z]/.test(value) && /[0-9]/.test(value)) {
            strength = 'medium';
        }

        strengthFill.className = 'password-strength-fill ' + strength;
        strengthText.textContent = strength.charAt(0).toUpperCase() + strength.slice(1);
        strengthText.className = strength;

        if (value.length >= 8) {
            passwordInput.classList.remove('is-invalid');
            return true;
        } else if (value.length > 0) {
            passwordInput.classList.add('is-invalid');
            return false;
        }
        return false;
    }

    function validatePasswordMatch() {
        if (passwordInput.value === confirmPasswordInput.value && passwordInput.value.length >= 8) {
            confirmPasswordInput.classList.remove('is-invalid');
            confirmPasswordInput.classList.add('is-valid');
            return true;
        } else if (confirmPasswordInput.value) {
            confirmPasswordInput.classList.add('is-invalid');
            return false;
        }
        return false;
    }

    function validateTerms() {
        return termsInput.checked;
    }

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Validate all fields
        const isNameValid = validateName();
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();
        const isPasswordMatchValid = validatePasswordMatch();
        const isTermsValid = validateTerms();

        if (!isTermsValid) {
            errorAlert.classList.add('show');
            errorMessage.textContent = 'Please accept the Terms & Conditions';
            return;
        }

        if (isNameValid && isEmailValid && isPasswordValid && isPasswordMatchValid && isTermsValid) {
            errorAlert.classList.remove('show');
            // Form will submit to the server
            form.submit();
        } else {
            errorAlert.classList.add('show');
            errorMessage.textContent = 'Please fill in all fields correctly';
        }
    });

    // Show benefits on mobile
    if (window.innerWidth <= 768) {
        document.querySelector('.register-benefits').classList.add('mobile-visible');
    }
</script>

</body>
</html>