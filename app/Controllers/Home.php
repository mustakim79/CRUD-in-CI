<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public $user;
    public function __construct()
    {
        $this->user = new UserModel();
    }
    public function index()
    {
        return view('welcome_message');
    }
    public function login()
    {
        echo view('login');
    }
    //=============== Login Start ================
    public function is_UserExist($name, $password)
    {
        $field = ['name' => $name, 'password' => $password];
        $data = $this->user->where($field)->get();
        // echo $data;
        return $data->getNumRows();
    }
    public function Check_Login()
    {
        $session = session();
        $msg = "";
        $name = $this->request->getPost('name');
        $password = $this->request->getPost('password');
        $rows = $this->is_UserExist($name, $password);
        if ($rows > 0) {
            $session->set('user', $name);
            $msg = "Login Successfully Welcome " . $session->get('user');
            $session->setFlashdata("msg", "User Login Successfully");
        } else {
            $msg = "Invalid Login";
        }
        // echo "<h3><center>$msg</center></h3>";
        return redirect()->to('Home/login');
    }
    //=============== Login Over ================









    // ============= Sign up Start ===============
    public function IdentifyUser($name, $email)
    {
        $field = "name='$name' OR email='$email'";
        $data = $this->user->where($field)->get();
        // echo $data;
        return $data->getNumRows();
    }
    public function SignUp()
    {
        $rows = $this->IdentifyUser($this->request->getPost('name'), $this->request->getPost('email'));
        if ($rows == 0) {
            $data = ['name' => $this->request->getPost('name'), 'email' => $this->request->getPost('email'), 'password' => $this->request->getPost('password')];
            // print_r($data);
            $this->user->save($data);
            echo "<h1>Inserted successfully</h1>";
        } else {
            echo "<h1>Username or email address already taken.</h1>";
        }
    }
    // ============= Sign up Over ===============

    public function home()
    {
        $sesion = session();
    }
    public function Logout()
    {
        $session = session();
        if ($session->has('user')) {
            $session->remove('user');
        }
        return redirect()->to('Home/login');
    }

    public function Getdata()
    {
        // $db = \Config\Database::connect();
        // $db = new UserModel();
        // $qr = $db->query("select * from user where name='mustakim'");
        // echo $qr->getNumRows();
        // return redirect()->to(site_url('localhost:80/logincodei/login'));
        echo "<h2>hello</h2>";
    }
}