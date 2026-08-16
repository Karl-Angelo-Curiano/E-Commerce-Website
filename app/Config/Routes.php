<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('chatbot', 'Chatbot::index');
$routes->post('chatbot/send', 'Chatbot::send');
$routes->post('chatbot/reset', 'Chatbot::reset');

$routes->get('/', 'Home::index');


service('auth')->routes($routes);

$routes->group('user', ['filter' => ['session', 'group:user']], function ($routes) {
// Products
    $routes->get('/', 'Customer\Cart::index');

    $routes->post('cart/add/(:num)', 'Customer\Cart::addToCart/$1');
    $routes->get('product/(:num)', 'Customer\Cart::product/$1');

    // Orders
    $routes->get('orders', 'Customer\Cart::checkout');
    $routes->post('orders/delete/(:num)', 'Customer\Cart::delete/$1');
    $routes->post('orders/update/(:num)', 'Customer\Cart::updateQuantity/$1');

});

// Admin Dashboard
//$routes->group('admin', ['filter' => 'group:admin'], function ($routes) {
$routes->group('admin', ['filter' => ['session', 'group:admin']], function ($routes) {
    $routes->get('/', 'Admin::index');

    // Products
    $routes->get('products', 'Admin::products');
    $routes->post('products/store', 'Admin::store');
    $routes->post('products/update/(:num)', 'Admin::update/$1');
    $routes->get('products/delete/(:num)', 'Admin::delete/$1');

    // Categories
    $routes->get('categories', 'Admin::categories');
    $routes->post('categories/store', 'Admin::storeCategory');
    $routes->post('categories/update/(:num)', 'Admin::updateCategory/$1');
    $routes->get('categories/delete/(:num)', 'Admin::deleteCategory/$1');

    // Orders
    $routes->get('orders', 'Admin::orders');
    $routes->post('orders/update/(:num)', 'Admin::updateOrder/$1');
    $routes->get('orders/delete/(:num)', 'Admin::deleteOrder/$1');

    // Payments
    $routes->get('payments', 'Admin::payments');
    $routes->post('payments/update/(:num)', 'Admin::updatePayment/$1');
    $routes->get('payments/delete/(:num)', 'Admin::deletePayment/$1');

    $routes->get('users', 'Admin::users');
    $routes->post('users/update/(:num)', 'Admin::updateUser/$1');
    $routes->get('users/delete/(:num)', 'Admin::deleteUser/$1');

});