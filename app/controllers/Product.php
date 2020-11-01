<?php

class Product extends Controller
{
    public function index($id)
    {
        $products = $this->model('Products');
        $this->view('product/index', $products->getOneProduct($id));
    }
}