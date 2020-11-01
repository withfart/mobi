<?php
require 'DB.php';

class UserModel
{
    private $name;
    private $email;
    private $password;
    private $re_password;

    private $_db = null;

    public function __construct()
    {
        $this->_db = DB::getInstance();

    }

    public function setData($name, $email, $password, $re_password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->re_password = $re_password;
    }

    public function validForm()
    {
        if (strlen($this->name) < 3)
            return "Имя слишком короткое";
        else if (strlen($this->email) < 3)
            return "Email слишком короткий";
        else if (strlen($this->password) < 3)
            return "Пароль слишком короткий";
        else if ($this->password != $this->re_password)
            return "Пароли не совпадают";
        else
            return "Верно";
    }

    public function addUser()
    {
        $sql = 'INSERT INTO users(name,email,password) VALUE (:name, :email,:password)';
        $query = $this->_db->prepare($sql);
        $password = password_hash($this->password, PASSWORD_DEFAULT);
        $query->execute(['name' => $this->name, 'email' => $this->email, 'password' => $password]);
        $this->setAuth($this->email);

    }

    public function getUser()
    {
        $email = $_COOKIE['login'];
        $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function logOut()
    {

        setcookie('login', $this->email, time() - 3600, '/');
        unset($_COOKIE['login']);
        header('location:/user/auth');

    }

    public function auth($email, $password)
    {
        $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if ($user['email'] == '') {
            return 'Такого пользователя не существует';
        } else if (password_verify($password, $user['password']))
            $this->setAuth($email);

        else
            return 'Пароли не совпали!';
    }

    public function setAuth($email)
    {
        setcookie('login', $email, time() + 3600, '/');
        header('location:/user/dashboard');
    }

}