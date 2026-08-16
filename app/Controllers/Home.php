<?php

namespace App\Controllers;
use App\Models\ProductModel;

class Home extends BaseController
{
    protected $data = [];
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $this->data['products'] = $this->productModel->limit(8)->findAll();
        if (auth()->loggedIn()) {
            return redirect()->to('/user');
        }
        return view('home', $this->data);
    }
}
