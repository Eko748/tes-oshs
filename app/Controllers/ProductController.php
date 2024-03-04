<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;

class ProductController extends BaseController
{
    public function index()
    {
        $product = new Product();
        $data['products'] = $product->findAll();

        return view('pages/product/index', $data);
    }

    public function create()
    {
        return view('product/create');
    }

    public function store()
    {
        $product = new Product();

        $data = [
            'product_name' => $this->request->getVar('product_name'),
            'category' => $this->request->getVar('category'),
            'stock' => $this->request->getVar('stock'),
            'price' => $this->request->getVar('price'),
        ];

        $product->insert($data);

        return redirect()->to('/product')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = new Product();
        $data['product'] = $product->find($id);

        return view('pages/product/edit', $data);
    }

    public function update()
    {
        $product = new Product();

        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'category' => $this->request->getPost('category'),
            'stock' => $this->request->getPost('stock'),
            'price' => $this->request->getPost('price'),
        ];

        $product->update($this->request->getPost('id'), $data);

        return redirect()->to('/product')->with('success', 'Product updated successfully');
    }

    public function delete($id)
    {
        $product = new Product();
        $product->delete($id);

        return redirect()->to('/product')->with('success', 'Product deleted successfully');
    }
}
