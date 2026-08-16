<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('main') ?>

<?php
// form_open()/form_close() come from CodeIgniter's Form helper, which isn't
// autoloaded by default. Load it here so it's guaranteed to be available
// regardless of whether the controller loaded it.
helper('form');
?>

<style>
    .cart-item-card {
        position: relative;
        display: flex;
        gap: 20px;
        align-items: center;
        background: white;
        border: 1px solid #edf2f7;
        border-radius: 16px;
        padding: 18px;
        margin-bottom: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        transition: all 0.25s ease;
    }

    .cart-item-card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }

    .cart-item-image {
        flex: 0 0 90px;
        width: 90px;
        height: 90px;
        border-radius: 12px;
        overflow: hidden;
        background: #f9fafb;
    }

    .cart-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .cart-item-info {
        flex: 1;
        min-width: 0;
    }

    .cart-item-info h5 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0 0 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .cart-item-info small {
        display: block;
        color: var(--text-light, #6b7280);
        font-size: 0.82rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .cart-item-price {
        flex: 0 0 90px;
        font-weight: 600;
        color: var(--text-dark);
        font-size: 0.95rem;
    }

    /* Quantity control — matches product detail page's pill style */
    .cart-qty-controls {
        flex: 0 0 auto;
        display: inline-flex;
        align-items: stretch;
        background: #f3f4f6;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        overflow: hidden;
        height: 36px;
    }

    .cart-qty-controls button {
        width: 32px;
        border: none;
        background: #fff;
        font-size: 15px;
        font-weight: 600;
        color: #374151;
        cursor: pointer;
        transition: background 0.15s ease, color 0.15s ease;
    }

    .cart-qty-controls button:first-child {
        border-right: 1px solid #d1d5db;
    }

    .cart-qty-controls button:last-child {
        border-left: 1px solid #d1d5db;
    }

    .cart-qty-controls button:hover {
        background: #eef2ff;
        color: #2563eb;
    }

    .cart-qty-controls input {
        width: 44px;
        border: none;
        outline: none;
        text-align: center;
        font-weight: 600;
        font-size: 13.5px;
        color: #111827;
        -moz-appearance: textfield;
    }

    .cart-qty-controls input::-webkit-outer-spin-button,
    .cart-qty-controls input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .cart-item-subtotal {
        flex: 0 0 100px;
        text-align: right;
        font-weight: 800;
        font-size: 1.02rem;
        color: var(--primary-color);
    }

    .delete-item-btn {
        flex: 0 0 auto;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        color: #9ca3af;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .delete-item-btn:hover {
        background: #fef2f2;
        border-color: #fecaca;
        color: #dc2626;
        transform: scale(1.08);
    }

    @media (max-width: 700px) {
        .cart-item-card { flex-wrap: wrap; }
        .cart-item-subtotal { flex: 1 1 100%; text-align: left; margin-top: 8px; }
    }
</style>

<div class="container mt-5 mb-5">

    <h2 class="mb-4 text-white">
        <i class="fas fa-shopping-cart"></i>
        Shopping Cart
    </h2>   

    <?php if (empty($cartItems)): ?>

        <div class="alert alert-info">
            Your cart is empty.
        </div>

    <?php else: ?>

        <?php
        // Calculate grand total up front, since cart items now live in their
        // own separate forms (not nested inside the checkout form below).
        $grandTotal = 0;
        ?>

        <div class="row">

            <!-- ============================= -->
            <!-- LEFT COLUMN: cart items, notes, payment -->
            <!-- ============================= -->
            <div class="col-lg-7">

                <!--
                    ===== Cart Items =====
                    Each item is its OWN form, entirely separate from the
                    checkout form below. This lets quantity updates and
                    deletes submit independently without touching checkout,
                    and avoids ever nesting a <form> inside another <form>
                    (which is invalid HTML and silently breaks in browsers).
                -->
                <?php foreach ($cartItems as $item): ?>

                    <?php
                    $product = model('App\Models\ProductModel')->find($item['product_id']);
                    if (!$product) continue;

                    $subtotal = $product['price'] * $item['quantity'];
                    $grandTotal += $subtotal;
                    $maxStock = array_key_exists('stock', $product) ? (int) $product['stock'] : null;
                    ?>

                    <?= form_open('user/orders/update/' . $item['id']) ?>

                    <div class="cart-item-card">

                        <div class="cart-item-image">
                            <img src="<?= base_url($product['image']) ?>" alt="<?= esc($product['name']) ?>">
                        </div>

                        <div class="cart-item-info">
                            <h5><?= esc($product['name']) ?></h5>
                            <small><?= esc($product['description']) ?></small>
                        </div>

                        <div class="cart-item-price">
                            ₱<?= number_format($product['price'], 2) ?>
                        </div>

                        <div class="cart-qty-controls">
                            <button type="button" class="qty-minus">−</button>
                            <input type="number"
                                name="quantity"
                                class="qty-input"
                                value="<?= $item['quantity'] ?>"
                                min="1"
                                <?= $maxStock ? 'max="' . $maxStock . '"' : '' ?>>
                            <button type="button" class="qty-plus">+</button>
                        </div>

                        <div class="cart-item-subtotal">
                            ₱<?= number_format($subtotal, 2) ?>
                        </div>

                        <button type="submit"
                                class="delete-item-btn"
                                formaction="<?= base_url('user/orders/delete/' . $item['id']) ?>"
                                formnovalidate
                                onclick="return confirm('Remove this item from your cart?');"
                                title="Remove item">
                            <i class="fas fa-times"></i>
                        </button>

                    </div>

                    <?= form_close() ?>

                <?php endforeach; ?>

                <!-- ===== Order Notes / Comments ===== -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">

                        <h5 class="mb-3">
                            <i class="fas fa-comment-dots"></i>
                            Order Notes <span class="text-muted small">(optional)</span>
                        </h5>

                        <textarea
                            name="comments"
                            id="comments"
                            class="form-control"
                            rows="3"
                            maxlength="500"
                            placeholder="e.g. Leave at the guard house, call upon arrival, gift wrap this order..."></textarea>

                        <small class="text-muted">Max 500 characters.</small>

                    </div>
                </div>

            </div>

            <!-- ============================= -->
            <!-- RIGHT COLUMN: order summary -->
            <!-- ============================= -->
            <div class="col-lg-5">

                <!--
                    Everything below (address, notes-that-live-inside-form,
                    payment) is wrapped in a single form so it all submits
                    together to the checkout controller. form_open()
                    auto-injects the CSRF hidden field for you if CSRF
                    protection is enabled in app/Config/Filters.php.
                -->
                <?= form_open('checkout/process', ['id' => 'checkoutForm']) ?>

                    <!-- ===== Delivery Address + Map ===== -->

                <div class="card mb-4 shadow-sm">
                    <div class="card-body">

                        <h5 class="mb-3">
                            <i class="fas fa-map-marker-alt text-danger"></i>
                            Delivery Address
                        </h5>

                        <div class="mb-3">
                            <label for="address" class="form-label small text-muted">
                                Complete Address
                            </label>
                            <input
                                type="text"
                                name="address"
                                id="address"
                                class="form-control"
                                placeholder="House No., Street, Barangay, City"
                                required>
                        </div>

                        <!-- Interactive map: user drags the pin (or clicks) to set the exact drop-off point -->
                        <div id="deliveryMap"></div>

                        <small class="text-muted d-block mt-2">
                            <i class="fas fa-info-circle"></i>
                            Drag the pin or click anywhere on the map to set your exact delivery location.
                        </small>

                        <!-- These hidden fields are what actually get submitted with the form -->
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">

                    </div>
                </div>

                    <!-- ===== Mode of Payment ===== -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">

                        <h5 class="mb-3">
                            <i class="fas fa-credit-card"></i>
                            Mode of Payment
                        </h5>

                        <div class="row g-3 payment-options">

                            <div class="col-md-4 col-6">
                                <input type="radio" class="btn-check payment-radio" name="payment_method"
                                    id="pay_cod" value="cod" autocomplete="off" checked required>
                                <label class="payment-label" for="pay_cod">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <span>Cash on Delivery</span>
                                </label>
                            </div>

                            <div class="col-md-4 col-6">
                                <input type="radio" class="btn-check payment-radio" name="payment_method"
                                    id="pay_gcash" value="gcash" autocomplete="off">
                                <label class="payment-label" for="pay_gcash">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>GCash</span>
                                </label>
                            </div>

                            <div class="col-md-4 col-6">
                                <input type="radio" class="btn-check payment-radio" name="payment_method"
                                    id="pay_maya" value="maya" autocomplete="off">
                                <label class="payment-label" for="pay_maya">
                                    <i class="fas fa-wallet"></i>
                                    <span>Maya</span>
                                </label>
                            </div>

                            <div class="col-md-4 col-6">
                                <input type="radio" class="btn-check payment-radio" name="payment_method"
                                    id="pay_card" value="card" autocomplete="off">
                                <label class="payment-label" for="pay_card">
                                    <i class="fas fa-credit-card"></i>
                                    <span>Credit / Debit Card</span>
                                </label>
                            </div>

                            <div class="col-md-4 col-6">
                                <input type="radio" class="btn-check payment-radio" name="payment_method"
                                    id="pay_bank" value="bank_transfer" autocomplete="off">
                                <label class="payment-label" for="pay_bank">
                                    <i class="fas fa-university"></i>
                                    <span>Bank Transfer</span>
                                </label>
                            </div>

                        </div>

                        <!-- Extra inputs shown only when "Credit / Debit Card" is selected -->
                        <div id="cardFields" class="row g-2 mt-3 d-none">

                            <div class="col-md-12">
                                <label class="form-label small text-muted">Card Number</label>
                                <input type="text" name="card_number" class="form-control"
                                    placeholder="1234 5678 9012 3456" maxlength="19" inputmode="numeric">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small text-muted">Expiry (MM/YY)</label>
                                <input type="text" name="card_expiry" class="form-control"
                                    placeholder="MM/YY" maxlength="5">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small text-muted">CVV</label>
                                <input type="password" name="card_cvv" class="form-control"
                                    placeholder="•••" maxlength="4" inputmode="numeric">
                            </div>

                        </div>

                        <!-- Note shown for e-wallet options (GCash / Maya) -->
                        <div id="ewalletNote" class="alert alert-light border mt-3 d-none mb-0">
                            <i class="fas fa-info-circle"></i>
                            You'll be redirected to complete payment after placing your order.
                        </div>

                        <!-- Note shown for bank transfer -->
                        <div id="bankNote" class="alert alert-light border mt-3 d-none mb-0">
                            <i class="fas fa-info-circle"></i>
                            Bank account details will be sent to your email once the order is placed.
                        </div>

                    </div>
                </div>

                <div class="card shadow-sm sticky-top order-summary-sticky">

                    <div class="card-body">

                        <h4>Order Summary</h4>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <span>Items</span>
                            <span><?= $cartCount ?? "" ?></span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <h5>Total</h5>
                            <h5>₱<?= number_format($grandTotal, 2) ?></h5>
                        </div>

                        <button type="submit" class="btn btn-success w-100 mt-4">
                            Proceed to Checkout
                        </button>

                    </div>

                </div>

                <?= form_close() ?>

            </div>

        </div>

    <?php endif; ?>

</div>

<!--
    Leaflet (open-source map library, no API key required) — CSS + JS.
    Ideally these <link>/<script> tags live once in your layout's <head>/footer
    instead of inside a page section, so they aren't reloaded on every page
    that reuses this layout. Left here so this view works standalone.
-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<style>
    #deliveryMap {
        height: 300px;
        border-radius: 8px;
        z-index: 0; /* keep Leaflet's panes below navbars/modals */
    }

    /* Payment method cards */
    .payment-options .payment-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 16px 8px;
        border: 2px solid #dee2e6;
        border-radius: 10px;
        cursor: pointer;
        height: 100%;
        text-align: center;
        font-size: 0.9rem;
        transition: border-color .15s ease, background-color .15s ease;
    }

    .payment-options .payment-label i {
        font-size: 1.4rem;
    }

    .payment-options .payment-radio:checked + .payment-label {
        border-color: #198754;
        background-color: rgba(25, 135, 84, 0.08);
        color: #198754;
    }

    .order-summary-sticky {
        top: 100px;       /* match your navbar's real rendered height */
        z-index: 1015;   /* keep it below the navbar's own z-index */
    }

    /* optional: don't stick at all on stacked/mobile layout */
    @media (max-width: 991.98px) {
        .order-summary-sticky {
            position: static;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* =========================================================
       1) DELIVERY MAP
       ========================================================= */
    // Default center: Metro Manila. Adjust to your store's usual delivery area.
    var defaultLat = 14.5995;
    var defaultLng = 120.9842;

    var map = L.map('deliveryMap').setView([defaultLat, defaultLng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
        maxZoom: 19
    }).addTo(map);

    var marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

    var latInput = document.getElementById('latitude');
    var lngInput = document.getElementById('longitude');
    var addressInput = document.getElementById('address');

    function setCoords(lat, lng) {
        latInput.value = lat.toFixed(6);
        lngInput.value = lng.toFixed(6);
    }

    // Reverse-geocode a lat/lng into a readable address using Nominatim
    // (OpenStreetMap's free geocoder). Fine for occasional lookups; if you
    // expect real traffic, use a paid geocoding service or self-hosted Nominatim
    // to respect usage limits.
    function reverseGeocode(lat, lng) {
        fetch('https://nominatim.openstreetmap.org/reverse?format=json&lat=' + lat + '&lon=' + lng)
            .then(function (res) { return res.json(); })
            .then(function (data) {
                if (data && data.display_name && !addressInput.value) {
                    addressInput.value = data.display_name;
                }
            })
            .catch(function () { /* silently ignore geocoding errors */ });
    }

    setCoords(defaultLat, defaultLng);

    marker.on('dragend', function (e) {
        var pos = marker.getLatLng();
        setCoords(pos.lat, pos.lng);
        reverseGeocode(pos.lat, pos.lng);
    });

    map.on('click', function (e) {
        marker.setLatLng(e.latlng);
        setCoords(e.latlng.lat, e.latlng.lng);
        reverseGeocode(e.latlng.lat, e.latlng.lng);
    });

    // Try to center on the user's actual location if they allow it
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (pos) {
            var lat = pos.coords.latitude;
            var lng = pos.coords.longitude;
            map.setView([lat, lng], 15);
            marker.setLatLng([lat, lng]);
            setCoords(lat, lng);
            reverseGeocode(lat, lng);
        }, function () { /* user denied or unavailable — keep default center */ });
    }

    /* =========================================================
       2) PAYMENT METHOD TOGGLES
       ========================================================= */
    var cardFields = document.getElementById('cardFields');
    var ewalletNote = document.getElementById('ewalletNote');
    var bankNote = document.getElementById('bankNote');
    var radios = document.querySelectorAll('.payment-radio');

    function updatePaymentUI() {
        var selected = document.querySelector('.payment-radio:checked').value;

        cardFields.classList.toggle('d-none', selected !== 'card');
        ewalletNote.classList.toggle('d-none', !(selected === 'gcash' || selected === 'maya'));
        bankNote.classList.toggle('d-none', selected !== 'bank_transfer');
    }

    radios.forEach(function (radio) {
        radio.addEventListener('change', updatePaymentUI);
    });

    updatePaymentUI(); // set initial state on page load
});

/* =========================================================
   3) CART QUANTITY CONTROLS
   Each cart item has its own <form> (see the loop above), so
   form.submit() here always targets that item's own update
   route — never the checkout form.
   ========================================================= */
document.querySelectorAll('.cart-qty-controls').forEach(function (control) {
    var input = control.querySelector('.qty-input');
    var minus = control.querySelector('.qty-minus');
    var plus  = control.querySelector('.qty-plus');
    var max   = input.getAttribute('max');
    var form  = control.closest('form');

    minus.addEventListener('click', function () {
        var val = parseInt(input.value) || 1;
        if (val > 1) {
            input.value = val - 1;
            form.submit();
        }
    });

    plus.addEventListener('click', function () {
        var val = parseInt(input.value) || 1;
        if (!max || val < parseInt(max)) {
            input.value = val + 1;
            form.submit();
        }
    });

    // If the user types a number directly and clicks elsewhere, submit too
    input.addEventListener('change', function () {
        var val = parseInt(input.value) || 1;
        if (val < 1) val = 1;
        if (max && val > parseInt(max)) val = parseInt(max);
        input.value = val;
        form.submit();
    });
});
</script>

<?= $this->endSection() ?>