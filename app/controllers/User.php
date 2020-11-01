<?php

class User extends Controller
{
    public function reg()
    {
        $data = [];
        if (isset($_POST['name'])) {
            $user = $this->model('UserModel');
            $user->setData($_POST['name'], $_POST['email'], $_POST['password'], $_POST['re_password']);

            $isValid = $user->validForm();
            if ($isValid == "Верно")
                $user->addUser();
            else
                $data['message'] = $isValid;
        }

        $this->view('user/reg', $data);
    }

    public function dashboard()
    {
        $user = $this->model('UserModel');
        if (isset($_POST['exit_btn'])) {
            $user->logOut();
            exit();
        }
        $this->view('user/dashboard', $user->getUser());
    }

    public function auth()
    {
        $data=[];
        $user = $this->model('UserModel');
        if (isset($_POST['email'])) {
            $data['message'] = $user->auth($_POST['email'], $_POST['password']);

        }

        $this->view('user/auth', $data);

    }

}