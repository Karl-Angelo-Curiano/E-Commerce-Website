<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

$routes->group('', ['filter' => 'auth'], function ($routes) {
// Products
    $routes->get('/products', 'Product::index');
    $routes->get('/products/create', 'Product::create');
    $routes->post('/products/store', 'Product::store');
    $routes->get('/products/edit/(:num)', 'Product::edit/$1');
    $routes->post('/products/update/(:num)', 'Product::update/$1');
    $routes->get('/products/delete/(:num)', 'Product::delete/$1');
    $routes->get('/products/(:num)', 'Product::show/$1');

    // Categories
    $routes->get('/categories', 'Category::index');
    $routes->get('/categories/create', 'Category::create');
    $routes->post('/categories/store', 'Category::store');
    $routes->get('/categories/edit/(:num)', 'Category::edit/$1');
    $routes->post('/categories/update/(:num)', 'Category::update/$1');
    $routes->get('/categories/delete/(:num)', 'Category::delete/$1');

    // Cart
    $routes->get('/cart', 'Cart::index');
    $routes->post('/cart/add', 'Cart::add');
    $routes->post('/cart/update', 'Cart::update');
    $routes->get('/cart/remove/(:num)', 'Cart::remove/$1');
    $routes->get('/cart/checkout', 'Cart::checkout');

    // Orders
    $routes->get('/orders', 'Order::index');
    $routes->get('/orders/(:num)', 'Order::show/$1');
    $routes->post('/orders/place', 'Order::place');

    // Payments
    $routes->get('/payments', 'Payment::index');
    $routes->post('/payments/process', 'Payment::process');

    // User Profile
    $routes->get('/profile', 'User::profile');
    $routes->post('/profile/update', 'User::update');

});

// Admin Dashboard
$routes->group('admin', ['filter' => 'group:admin'], function ($routes) {

    $routes->get('/', 'Admin::index');

    // Products
    $routes->get('products', 'Admin::products');
    $routes->get('products/create', 'Admin::create');
    $routes->post('products/store', 'Admin::store');
    $routes->get('products/edit/(:num)', 'Admin::edit/$1');
    $routes->post('products/update/(:num)', 'Admin::update/$1');
    $routes->get('products/delete/(:num)', 'Admin::delete/$1');

    // Categories
    $routes->get('categories', 'Admin::categories');
    $routes->get('categories/create', 'Admin::createCategory');
    $routes->post('categories/store', 'Admin::storeCategory');
    $routes->get('categories/edit/(:num)', 'Admin::editCategory/$1');
    $routes->post('categories/update/(:num)', 'Admin::updateCategory/$1');
    $routes->get('categories/delete/(:num)', 'Admin::deleteCategory/$1');

    // Orders
    $routes->get('orders', 'Admin::orders');
    $routes->get('orders/(:num)', 'Admin::showOrder/$1');
    $routes->post('orders/update/(:num)', 'Admin::updateOrder/$1');
    $routes->get('orders/delete/(:num)', 'Admin::deleteOrder/$1');

    // Payments
    $routes->get('payments', 'Admin::payments');
    $routes->get('payments/(:num)', 'Admin::showPayment/$1');
    $routes->post('payments/update/(:num)', 'Admin::updatePayment/$1');
    $routes->get('payments/delete/(:num)', 'Admin::deletePayment/$1');

});