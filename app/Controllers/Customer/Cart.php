<?php
namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\ProductImageModel;

class Cart extends BaseController
{
    protected $data = [];
    protected $productModel;
    protected $cartModel;
    protected $cartCount = 0;
    protected $productImageModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->cartModel = new CartModel();
        $this->productImageModel = new ProductImageModel();
    }

    // Show list of products (customer-facing)
    public function index()
    {
        $user = auth()->user();

        $this->cartCount = 0;

        if ($user) {
            $this->cartCount = $this->cartModel
                ->selectSum('quantity')
                ->where('user_id', $user->id)
                ->first()['quantity'] ?? "";
        }

        $this->data['cartCount'] = $this->cartCount;
        $this->data['products'] = $this->productModel->findAll();

        return view('customer/index', $this->data);
    }

    public function addToCart($productId = null)
    {
        if ($productId === null) {
            $productId = $this->request->getPost('product_id');
        }

        if (!$productId) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Product ID is required'
            ]);
        }

        $product = $this->productModel->find($productId);

        if (!$product) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Product not found'
            ]);
        }

        // Make sure the user is logged in
        $user = auth()->user();

        if (!$user) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Please log in first.'
            ]);
        }

        $userId = $user->id;

        // Check if the product is already in the cart
        $cartItem = $this->cartModel
            ->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $this->cartModel->update($cartItem['id'], [
                'quantity' => $cartItem['quantity'] + 1
            ]);
        } else {
            $this->cartModel->insert([
                'user_id'    => $userId,
                'product_id' => $productId,
                'quantity'   => 1,
            ]);
        }

        // Get updated cart count
        $this->cartCount = $this->cartModel
            ->selectSum('quantity')
            ->where('user_id', $userId)
            ->first()['quantity'] ?? "";

        return $this->response->setJSON([
            'success'   => true,
            'message'   => 'Product added to cart.',
            'cartCount' => $this->cartCount
        ]);
    }

    public function product($productId)
    {
        dd($productId);
        $user = auth()->user();

        $this->cartCount = 0;

        if ($user) {
            $this->cartCount = $this->cartModel
                ->selectSum('quantity')
                ->where('user_id', $user->id)
                ->first()['quantity'] ?? "";
        }

        $this->data['cartCount'] = $this->cartCount;
        $this->data['products'] = $this->productModel->orderBy('RAND()')->findAll();
        $this->data['product'] = $this->productModel->find($productId);
        $this->data['productImages'] = $this->productImageModel
            ->where('product_id', $productId)
            ->findAll();

        return view('customer/product', $this->data);
    }

    public function checkout()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->to('/login');
        }

        $this->cartCount = $this->cartModel
            ->selectSum('quantity')
            ->where('user_id', $user->id)
            ->first()['quantity'] ?? "";

        $this->data['cartCount'] = $this->cartCount;
        $this->data['cartItems'] = $this->cartModel
            ->where('user_id', $user->id)
            ->findAll();

        return view('customer/cart', $this->data);
    }

    // CartController.php
    public function delete($id)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->to('/login');
        }

        $item = $this->cartModel->find($id);

        if (!$item || $item['user_id'] != $user->id) {
            return redirect()->to('user/orders')->with('error', 'Item not found or not authorized.');
        }

        $this->cartModel->delete($id);

        return redirect()->to('user/orders')->with('message', 'Item removed from your cart.');
    }

    
    public function updateQuantity($id)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->to('/login');
        }

        $item = $this->cartModel->find($id);

        if (!$item || $item['user_id'] != $user->id) {
            return redirect()->to('user/orders')->with('error', 'Item not found or not authorized.');
        }

        $quantity = (int) $this->request->getPost('quantity');
        if ($quantity < 1) $quantity = 1;

        $this->cartModel->update($id, ['quantity' => $quantity]);

        return redirect()->to('user/orders')->with('message', 'Cart updated.');
    }
}
