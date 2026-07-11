<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\PaymentModel;
use CodeIgniter\Shield\Models\UserModel;

class Admin extends BaseController
{
    protected $products;
    protected $categories;
    protected $orders;
    protected $payments;
    protected $users;
    protected ProductModel $productModel;
    protected CategoryModel $categoryModel;
    protected OrderModel $orderModel;
    protected PaymentModel $paymentModel;
    protected UserModel $userModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->orderModel = new OrderModel();
        $this->paymentModel = new PaymentModel();
        $this->userModel = new UserModel();

        $this->products = $this->productModel->findAll();
        $this->categories = $this->categoryModel->findAll();
        $this->orders = $this->orderModel->findAll();
        $this->payments = $this->paymentModel->findAll();
        $this->users = $this->userModel->findAll();
    }
    /* =========================
     * Dashboard
     * ========================= */

    public function index()
    {
           // Calculate total sales
        $totalSales = $this->paymentModel
            ->selectSum('amount')
            ->first()['amount'] ?? 0;

        $data = [
            'username'        => auth()->user()->username,
            'totalProducts'   => $this->productModel->countAllResults(),
            'totalCategories' => $this->categoryModel->countAllResults(),
            'totalOrders'     => $this->orderModel->countAllResults(),
            'totalCustomers'  => $this->userModel->countAllResults(),
            'totalSales'      => $totalSales,
        ];

        return view('admin/index', $data);
    }

    /* =========================
     * Products
     * ========================= */

    public function products()
    {
        return view('admin/products/index');
    }

    public function create()
    {
        return view('admin/products/create');
    }

    public function store()
    {
        //
    }

    public function edit($id)
    {
        return view('admin/products/edit', [
            'id' => $id
        ]);
    }

    public function update($id)
    {
        //
    }

    public function delete($id)
    {
        //
    }

    /* =========================
     * Categories
     * ========================= */

    public function categories()
    {
        return view('admin/categories/index');
    }

    public function createCategory()
    {
        return view('admin/categories/create');
    }

    public function storeCategory()
    {
        //
    }

    public function editCategory($id)
    {
        return view('admin/categories/edit', [
            'id' => $id
        ]);
    }

    public function updateCategory($id)
    {
        //
    }

    public function deleteCategory($id)
    {
        //
    }

    /* =========================
     * Orders
     * ========================= */

    public function orders()
    {
        return view('admin/orders/index');
    }

    public function showOrder($id)
    {
        return view('admin/orders/show', [
            'id' => $id
        ]);
    }

    public function updateOrder($id)
    {
        //
    }

    public function deleteOrder($id)
    {
        //
    }

    /* =========================
     * Payments
     * ========================= */

    public function payments()
    {
        return view('admin/payments/index');
    }

    public function showPayment($id)
    {
        return view('admin/payments/show', [
            'id' => $id
        ]);
    }

    public function updatePayment($id)
    {
        //
    }

    public function deletePayment($id)
    {
        //
    }
}