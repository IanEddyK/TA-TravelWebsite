<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Cookie\Cookie;

class Login extends BaseController
{
    
    public function index(){
        session();
        $data = [
            'title' => 'Login | Travel.com',
            'validation' => \Config\Services::validation()
        ];
        return view('/pages/login', $data);
    }

    public function auth()
    {
        helper('text');
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $userModel->where('email', $email)->first();
        
        if ($user) {
            $role = $user['role'];
            if ($role == 1) {
                $pass = $user['password'];
                $passAuth = password_verify($password, $pass);
                if ($passAuth) {
                    $sess_data = [
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'email' => $user['email'],
                        'phone' => $user['no_telp'],
                        'role' => $user['role'],
                        'LoggedIn' => true,
                    ];
                    $session->set($sess_data);
                    return redirect()->to(base_url('/admin'))->with('logged', 'Logged In');
                } else {
                    $session->setFlashdata('msg', 'Password incorrect');
                    return redirect()->to('/login');
                }
            }
            if ($role == 2) {
                $pass = $user['password'];
                $passAuth = password_verify($password, $pass);
                if ($passAuth) {
                    $sess_data = [
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'email' => $user['email'],
                        'phone' => $user['no_telp'],
                        'role' => $user['role'],
                        'LoggedIn' => true,
                    ];
                    $session->set($sess_data);
                    return redirect()->to(base_url())->with('logged', 'Logged In');
                } else {
                    $session->setFlashdata('msg', 'Password incorrect');
                    return redirect()->to('/login');
                }
            }
        } else {
            $session->setFlashdata('msg', "Email doesn't exist");
                return redirect()->to('/login');
        }
    }
}