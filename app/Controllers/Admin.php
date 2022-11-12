<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\DBModel;
use App\Models\PackageModel;
use App\Models\RecapModel;
use App\Models\UserModel;
use CodeIgniter\Cookie\Cookie;
use CodeIgniter\Database\Config;
use CodeIgniter\HTTP\RedirectResponse;

class Admin extends BaseController
{
    protected $adminModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel;
        $this->packageModel = new PackageModel;
        $this->bookModel = new DBModel;
        $this->userModel = new UserModel;
        $this->recapModel = new RecapModel;
    }

    public function index(){
        session();
        $data = [
            'title' => 'Admin | Travel.com',
            'packages' => $this->packageModel->findAll(),
            'PTotal' => $this->packageModel->countAllResults(),
            'ITotal' => $this->bookModel->countAllResults(),
            'UTotal' => $this->userModel->countAllResults()
        ];
        return view('/admin/dashboard', $data);
    }
    
    public function users()
    {
        $data = [
            'title' => 'Admin | Travel.com',
            'users' => $this->userModel->findAll(),
        ];
        return view('/admin/users', $data);
    }
    
    public function invoices()
    {
        $data = [
            'title' => 'Admin | Travel.com',
            'invoices' => $this->bookModel->findAll(),
        ];
        return view('/admin/invoices', $data);
    }

    public function deleteInvoice($id)
    {
        $this->bookModel->delete($id);
        $data = [
            'title' => 'Admin | Travel.com',
            'packages' => $this->packageModel->findAll(),
            'PTotal' => $this->packageModel->countAllResults(),
            'ITotal' => $this->bookModel->countAllResults(),
            'UTotal' => $this->userModel->countAllResults()
        ];
        session()->setFlashdata('msg', 'Invoice deleted success');
        return view('/admin/dashboard', $data);
    }

    public function EditPackage($id)
    {
        $data = [
            'title' => "Edit Package | Travel.com",
            'package' => $this->packageModel->getPackages($id),
            'validation' => \Config\Services::validation()
        ];
        return view('/admin/edit', $data);
    }

    public function CreatePackage()
    {
        $data = [
            'title' => "Edit Package | Travel.com",
            'package' => $this->packageModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('/admin/create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'title' => [
                'rules' => 'is_unique[packages.title]',
                'errors' => [
                    'is_unique' => '{field} Title used'
                ]
                ],
                'image' => [
                'rules' => 'max_size[image,10240]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'File too big',
                    'is_image' => 'Please upload image file',
                    'mime_in' => 'Please upload image file',
                ]
            ]
        ])){
            return redirect()->to('/admin/createpackage/')->withInput();
        }

        $imageFile = $this->request->getFile('image');
        $imageName = $imageFile->getRandomName();
        $imageFile->move('img', $imageName);

        $data =[
            'title' => $this->request->getVar('title'),
            'location' => $this->request->getVar('location'),
            'image' => $imageName,
            'price' => $this->request->getVar('price'),
        ];

        $this->packageModel->save($data);

        session()->setFlashdata('msg', 'Insert data success');
        return redirect()->to(base_url('/admin'));
    }

    public function UpdatePackage($package_id)
    {
        $OldPackage = $this->packageModel->getPackages($package_id);
        if ($OldPackage['title'] == $this->request->getVar('title')) {
            $title_rule = 'required';
        } else {
            $title_rule = 'required|is_unique[packages.title]';
        }

        if (!$this->validate([
            'title' => [
                'rules' => $title_rule,
                'errors' => [
                    'required' => '{field} Please insert the package',
                    'is_unique' => '{field} Title used'
                ]
                ],
                'image' => [
                'rules' => 'max_size[image,10240]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'File too big',
                    'is_image' => 'Please upload image file',
                    'mime_in' => 'Please upload image file',
                ]
            ]
        ])){
            return redirect()->to('/admin/editpackage/'.$this->request->getVar('package_id'))->withInput();
        }

        $imageFile = $this->request->getFile('image');

        if ($imageFile->getError() == 4) {
            $imageName = $this->request->getVar('OldImage');
        } else {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('img', $imageName);
            unlink('img/'.$this->request->getVar('OldImage'));
        }
        
        $data = [
            'package_id' => $package_id,
            'title' => $this->request->getVar('title'),
            'location' => $this->request->getVar('location'),
            'price' => $this->request->getVar('price'),
            'image' => $imageName
        ];
        
        $this->packageModel->update($package_id, $data);

        session()->setFlashdata('msg', 'Data Updated');

        return redirect()->to(base_url('/admin'));

    }

    public function deletepackage($id)
    {
        $package = $this->packageModel->getPackages($id);

        unlink('img/'.$package['image']);

        $this->packageModel->delete($id);
        session()->setFlashdata('msg', 'Package deleted');
        return redirect()->to(base_url('/admin'));
    }

    public function showBooksChart()
    {
        $year = $this->request->getVar('year');
        $data = $this->bookModel->getTransaction($year);
        
        $response = [
            'status' => true,
            'data' => $data
        ];
        echo json_encode($response);
    }

    public function showCustomerChart()
    {
        $year = $this->request->getVar('year');
        $customer = $this->userModel->getCustomer($year);

        $response = [
            'status' => true,
            'data' => $customer
        ];
        echo json_encode($response);
    }
}