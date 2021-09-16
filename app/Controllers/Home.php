<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Email;
use Exception;

class Home extends BaseController
{
    public $user;
    public $session;
    public function __construct()
    {
        $this->session = session();
        $this->user = new UserModel();
    }
    public function index()
    {
        return view('home');
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
        $msg = "";
        $name = $this->request->getPost('name');
        $password = $this->request->getPost('password');
        $rows = $this->is_UserExist($name, $password);
        if ($rows > 0) {
            $this->session->set('user', $name);
            // $msg = "Login Successfully Welcome " . $this->session->get('user');
            $this->session->setFlashdata("msg", "User Login Successfully");
            return redirect()->to('Home/');
        } else {
            $msg = "Invalid Login";
            $this->session->setFlashdata("msg", $msg);
            return redirect()->to('Home/login');
        }
        // echo "<h3><center>$msg</center></h3>";
        // Your URL/Home/Set PAssword/nakjfga6adyasdj34jgeljvadaa897dasdnasdnv34n3vvoifuafbadasbdnb3mn4bmn324bvndvfadv98jhfa = 1
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
            $this->session->setFlashdata("msg", "<h1>Inserted successfully</h1>");
        } else {
            $this->session->setFlashdata("msg", "<h1>Username or email address already taken.</h1>");
        }
        return redirect()->to('/register');
    }
    // ============= Sign up Over ===============

    public function Logout()
    {

        if ($this->session->has('user')) {
            $this->session->remove('user');
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





    public function Update()
    {

        // $db = \Config\Database::connect();
        // $us = $db->table('users');
        if ($this->session->has('user')) {
            $rs = $this->user->where('name', $this->session->get('user'))->get();
            $data['rs'] = $rs;
            echo view('update', $data);
        } else {
            return redirect()->to('Home/login');
        }
    }
    public function UpdateData()
    {
        $userdata = ['name' => $this->request->getPost('name'), 'email' => $this->request->getPost('email'), 'password' => $this->request->getPost('password')];
        // print_r($userdata);
        $res = $this->user->where('name', $this->session->get('user'))->set($userdata)->update();
        if ($res) {
            $this->session->setFlashdata("msg", "Updated");
            $this->session->set("user", $this->request->getPost('name'));
        } else {
            $this->session->setFlashdata("msg", "Can't");
        }
        return redirect()->to('/');
    }



    // ======================== Email =========================
    public function SendMail($emailad)
    {
        $email = \Config\Services::email();
        $msg = "Dear Mustakim<br>";
        $msg .= "Thanks for contact.<br>To reset your password <a href='#'>Click Here</a>";
        $msg .= '<br>Please Update your password.';
        $msg .= '<br>Thanks & Regards';
        $msg .= '<br>MK Software';
        // try {
        $email->setTo($emailad);
        $email->setFrom("mustakimdeveloper79@gmail.com", "Mk Soft");
        $email->setSubject("Reset Password");
        $email->setMessage($msg);
        /*} catch (Exception $e) {
            echo $e;
        } */
        if ($email->send()) {
            return true;
        } else {
            // echo "<script>alert('Not send mail')</script>";
            $data = $email->printDebugger(['headers']);
            print_r($data);
            return false;
        }
    }
    public function Forgotpass()
    {
        $emailad = $this->request->getPost('email');
        $res = $this->user->where('email', $emailad)->get();
        if ($res->getNumRows() == 1) {
            // echo "if hello";
            $sendemail = $this->SendMail($emailad);
            if ($sendemail) {
                $this->session->setFlashdata('msg', "Password has been sent to your email");
            } else {
                $this->session->setFlashdata('msg', "Not sent email, Something went wrong");
            }
        } else {
            echo "<br>else Hello";
            $this->session->setFlashdata("msg", "Email is not registered");
        }
        // echo "<br>hgello";
        return redirect()->to("Home/resetpass");
        // ijharkureshi12@gmail.com
    }
    public function resetpass()
    {
        return view('forgotpassword');
    }





    // ====================== Email Over ======================
}