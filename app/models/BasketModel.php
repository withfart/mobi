<?php
session_start();

class BasketModel
{
    private $session_name = 'cart';

    public function isSetSession()
    {
        return isset($_SESSION[$this->session_name]);
    }

    public function deletSession()
    {
        unset($_SESSION[$this->session_name]);

    }

    public function getSession()
    {

        return $_SESSION[$this->session_name];
    }

    public function addToCart($itemID)
    {

        if (!$this->isSetSession())
            $_SESSION[$this->session_name] = $itemID;
        else {
            $itemsExist = false;
            $items = explode(",", $_SESSION[$this->session_name]);
            foreach ($items as $el) {
                if ($el == $itemID)
                    $itemsExist = true;
            }

            if (!$itemsExist)
                $_SESSION[$this->session_name] = $_SESSION[$this->session_name] . ',' . $itemID;
        }

    }

    public function countItems()
    {
        if (!$this->isSetSession())
            return 0;
        else {
            $items = explode(",", $_SESSION[$this->session_name]);
            return count($items);
        }

    }

}