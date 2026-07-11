<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    // Display all products
    public function index()
    {
        $data['products'] = $this->productModel->findAll();

        return view('products/index', $data);
    }

    // Display one product
    public function show($id)
    {
        $data['product'] = $this->productModel->find($id);

        return view('products/show', $data);
    }

    // Show create product form
    public function create()
    {
        return view('products/create');
    }

    // Save new product
    public function store()
    {
        $this->productModel->insert([
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'image'       => $this->request->getPost('image'),
            'category_id' => $this->request->getPost('category_id'),
        ]);

        return redirect()->to('/products');
    }

    // Show edit form
    public function edit($id)
    {
        $data['product'] = $this->productModel->find($id);

        return view('products/edit', $data);
    }

    // Update product
    public function update($id)
    {
        $this->productModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'image'       => $this->request->getPost('image'),
            'category_id' => $this->request->getPost('category_id'),
        ]);

        return redirect()->to('/products');
    }

    // Delete product
    public function delete($id)
    {
        $this->productModel->delete($id);

        return redirect()->to('/products');
    }
}