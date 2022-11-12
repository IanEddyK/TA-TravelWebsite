<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Register extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Register | Travel.com',
        ];
        $user = [];
        return view('/pages/register', $data);
    }
    public function auth()
    {
        $rules = [
                'email' => [
                    'rules' => 'required|is_unique[users.email]|valid_email',
                    'errors' => [
                        'required' => 'Please input your email',
                        'is_unique' => 'Email used',
                        'valid_email' => 'Please input your email',
                    ]
                    ],
                'phone' => [
                    'rules' => 'required|is_unique[users.no_telp]',
                    'errors' => [
                        'required' => 'Please input your phone number',
                        'is_unique' => 'Phone number used'
                    ]
                ],
                'name' => [
                    'rules' => 'required|is_unique[users.nama]',
                    'errors' => [
                        'required' => 'Please input your name',
                        'is_unique' => 'Name registered'
                        ]
                ]
                ];
        
        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $user = [
                'nama' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'no_telp' => $this->request->getVar('phone'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => '2',
                'created_at' => Time::now()
            ];
            $userModel->save($user);
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Register | Travel.com',
                'validation' => $this->validator
            ];
            echo view('pages/register', $data);
        }
    }
}
