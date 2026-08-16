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

        // $this->products = $this->productModel->findAll();
        // $this->categories = $this->categoryModel->findAll();
        // $this->orders = $this->orderModel->findAll();
        // $this->payments = $this->paymentModel->findAll();
        // $this->users = $this->userModel->findAll();
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
        $data = [
            'products'   => $this->productModel->findAll(),
            'categories' => $this->categoryModel->findAll(),
        ];

        return view('admin/products', $data);
    }

   

    public function store()
    {
        $rules = [
            'name'        => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty',
            'price'       => 'required|decimal',
            'stock'       => 'required|integer',
            'category_id' => 'required|integer',
            'image'       => 'permit_empty|is_image[image]|max_size[image,2048]|ext_in[image,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Handle image upload
        $image = $this->request->getFile('image');
        $imageName = null;

        if ($image && $image->isValid() && ! $image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(FCPATH . 'uploads/products', $imageName);
        }

        $this->productModel->insert([
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'category_id' => $this->request->getPost('category_id'),
            'image'       => $imageName,
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Product added successfully.');
    }


    public function update($id)
    {
        $product = $this->productModel->find($id);

        if (! $product) {
            return redirect()->to('/admin/products')
                ->with('error', 'Product not found.');
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'name'        => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty',
            'price'       => 'required|decimal',
            'stock'       => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        if (! $validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $this->productModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'category_id' => $this->request->getPost('category_id'),
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = $this->productModel->find($id);

        if (! $product) {
            return redirect()->to('/admin/products')
                ->with('error', 'Product not found.');
        }

        // Delete image if you store uploaded images
        if (! empty($product['image']) && file_exists(FCPATH . 'uploads/products/' . $product['image'])) {
            unlink(FCPATH . 'uploads/products/' . $product['image']);
        }

        $this->productModel->delete($id);

        return redirect()->to('/admin/products')
            ->with('success', 'Product deleted successfully.');
    }

    /* =========================
     * Categories
     * ========================= */

    public function categories()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('admin/categories', $data);
    }

    public function createCategory()
    {
        return view('admin/categories/create');
    }

    public function storeCategory()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[100]|is_unique[categories.name]',
        ]);

        if (! $validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $this->categoryModel->insert([
            'name' => $this->request->getPost('name'),
        ]);

        return redirect()->to('/admin/categories')
            ->with('success', 'Category created successfully.');
    }

    public function updateCategory($id)
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => "required|min_length[3]|max_length[100]|is_unique[categories.name,id,{$id}]",
        ]);

        if (! $validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $this->categoryModel->update($id, [
            'name' => $this->request->getPost('name'),
        ]);

        return redirect()->to('/admin/categories')
            ->with('success', 'Category updated successfully.');
    }

    public function deleteCategory($id)
    {
        $category = $this->categoryModel->find($id);

        if (! $category) {
            return redirect()->to('/admin/categories')
                ->with('error', 'Category not found.');
        }

        $this->categoryModel->delete($id);

        return redirect()->to('/admin/categories')
            ->with('success', 'Category deleted successfully.');
    }

    /* =========================
     * Orders
     * ========================= */

    public function orders()
    {
        return view('admin/orders', [
            'orders' => $this->orderModel->findAll(),
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
        return view('admin/payments', [
            'payments' => $this->paymentModel->findAll(),
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

    public function users()
    {
                // 1. Get Shield's User Provider model
        $userProvider = auth()->getProvider();

        // 2. Fetch users (with pagination or findAll)
        $data['users'] = $userProvider->findAll(); 

        // 3. Load the admin view layout
        return view('admin/users', $data);
    }

    public function updateUser($id)
    {
        $user = $this->userModel->findById($id);

        if (! $user) {
            return redirect()->to('/admin/users')
                ->with('error', 'User not found.');
        }

        $user->fill([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ]);

        $this->userModel->save($user);

        // Update group
        $user->removeGroup('admin');
        $user->removeGroup('user');

        $user->addGroup($this->request->getPost('role'));

        return redirect()->to('/admin/users')
            ->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        $user = $this->userModel->findById($id);

        if (! $user) {
            return redirect()->to('/admin/users')
                ->with('error', 'User not found.');
        }

        // Prevent deleting yourself
        if ($user->id == auth()->id()) {
            return redirect()->to('/admin/users')
                ->with('error', 'You cannot delete your own account.');
        }

        $this->userModel->delete($id);

        return redirect()->to('/admin/users')
            ->with('success', 'User deleted successfully.');
    }
}