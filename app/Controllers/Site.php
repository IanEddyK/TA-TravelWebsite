<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\DBModel;
use App\Models\PackageModel;
use CodeIgniter\I18n\Time;

class Site extends BaseController
{
    public function __construct()
    {
        $this->DBModel = new DBModel();
        $this->packageModel = new PackageModel();
        $this->bookModel = new BookModel(); 
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome | Travel.com',
            'packages' => $this->packageModel->findAll(),
            'TP' => $this->packageModel->findAll(3)
        ];
        return view('/pages/home', $data);
    }
    
    public function home()
    {
        $user = $this->DBModel->findUser($_SESSION['email']);
        $data = [
            'title' => 'Home | Travel.com',
            'packages' => $this->packageModel->findAll(),
            'TP' => $this->packageModel->findAll(3)
        ];
        return view('/pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | Travel.com'
        ];
        return view('/pages/about', $data);
    }
    
    public function package()
    {
        $data = [
            'title' => 'Package | Travel.com',
            'packages' => $this->packageModel->findAll()
        ];
        return view('/pages/package', $data);
    }

    public function bookPackage($id)
    {
        $package = $this->packageModel->getPackages($id);
        $data = [
            'title' => 'Book | Travel.com',
            'packages' => $this->packageModel->findAll(),
            'selected' => $this->packageModel->getPackages($id)
        ];
        return view('/pages/bookpackage', $data);
    }

    public function book()
    {
        $data = [
            'title' => 'Book | Travel.com',
            'packages' => $this->packageModel->findAll()
        ];
        return view('/pages/book', $data);
    }

    public function logout()
    {
        $data = [
            'title' => 'Welcome | Travel.com',
            'packages' => $this->packageModel->findAll(),
            'TP' => $this->packageModel->findAll(3)
        ];
        session_destroy();
        return view('/pages/home', $data);
    }

    public function bookform()
    {
        $location = $this->request->getVar('location');
        
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'address' => $this->request->getVar('address'),
            'location' => $this->request->getVar('location'),
            'guests' => $this->request->getVar('guests'),
            'arrivals' => $this->request->getVar('arrivals'),
            'leaving' => $this->request->getVar('leaving'),
            'price' => $this->packageModel->getPrice($location)
        ];
        return view('/pages/book');

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
    }

    public function details($email){
        $user = $this->DBModel->findUser($email);
        if ($user) {
            if (Time::now()->isAfter($user['arrivals'])) {
                $this->DBModel->delete($user);
            }
            $location = $user['location'];
            $package = $this->packageModel->getPrice($location);
            $price = $package['price'];
            $data = [
                'title' => 'Invoice | Travel.com',
                'details' => $this->DBModel->findUser($email),
                'price' => $price
            ];
            return view('pages/invoice', $data);
        } else {
            $data = [
                'title' => 'Invoice | Travel.com',
                'details' => $this->DBModel->findUser($email)
            ];
            return view('pages/invoice', $data);
        }
    }

    public function savebook($email)
    {
        $bookingReq = Time::now()->addDays(7);
        $arrivals = Time::parse($this->request->getVar('arrivals'));
        $leaving = Time::parse($this->request->getVar('leaving'));
        if ($arrivals->isBefore($bookingReq) || $arrivals->equals($bookingReq)) {
            session()->setFlashdata('error', 'flight date is too near, please insert leaving date up to 7 days');
            return redirect()->back();
        }
        if ($leaving->isBefore($arrivals)) {
            session()->setFlashdata('error', 'please insert the right arrivals and leaving date');
            return redirect()->back();
        }
        $user = $this->DBModel->findUser($email);
        if ($user) {
            $OldDate = Time::parse($user['arrivals']);
            $newDate = Time::parse($this->request->getVar('arrivals'));
            if ($newDate->isBefore($OldDate)) {
                session()->setFlashdata('msg', "You currently having a reservation, please <a href='/site/details/".$email."' onclick='return confirm('Are you sure for canceling your reservation?')'>cancel</a> first");
            } elseif($newDate->isAfter($OldDate)){
                $this->DBModel->delete($email);
                $this->DBModel->save([
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('phone'),
                    'address' => $this->request->getVar('address'),
                    'location' => $this->request->getVar('location'),
                    'package_id' => $this->request->getVar('package_id'),
                    'guests' => $this->request->getVar('guests'),
                    'arrivals' => $this->request->getVar('arrivals'),
                    'leaving' => $this->request->getVar('leaving'),
                    'created_at' => Time::now(),
                ]);
                session()->setFlashdata('msg', "Reservation updated");
                return redirect()->to(base_url('/site/details/'.$email));
            }
        } else {
            $this->DBModel->save([
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'address' => $this->request->getVar('address'),
                'location' => $this->request->getVar('location'),
                'package_id' => $this->request->getVar('package_id'),
                'guests' => $this->request->getVar('guests'),
                'arrivals' => $this->request->getVar('arrivals'),
                'leaving' => $this->request->getVar('leaving'),
                'created_at' => Time::now(),
            ]);
            session()->setFlashdata('msg', "Reservation success");
            return redirect()->to(base_url('/site/details/'.$email));
        }
    }

    public function delete($email = null)
    {

        $data['user'] = $this->DBModel->where('email', $email)->delete();
        echo "<script type='text/javascript'>alert('Reservation canceled')</script>";
        return redirect()->to( base_url() );
    }
}
