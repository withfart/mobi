<?php

class Categories extends Controller
{
    public function index()
    {
        $products = $this->model('Products');
        $data = ['products' => $products->getProducts(), 'title' => 'Все товары на сайте'];
        $this->view('categories/index', $data);
    }

    public function power_bank()
    {
        $products = $this->model('Products');
        $data = ['products' => $products->getProductsCategories('power_bank'), 'title' => 'Power Bank'];
        $this->view('categories/index', $data);
    }

    public function case()
    {
        $products = $this->model('Products');
        $data = ['products' => $products->getProductsCategories('case'), 'title' => 'Чехлы для телефона'];
        $this->view('categories/index', $data);
    }

    public function auto()
    {
        $products = $this->model('Products');
        $data = ['products' => $products->getProductsCategories('auto'), 'title' => 'Автотовары'];
        $this->view('categories/index', $data);
    }

    public function szu()
    {
        $products = $this->model('Products');
        $data = ['products' => $products->getProductsCategories('szu'), 'title' => 'Зарядные устройства'];
        $this->view('categories/index', $data);
    }

}