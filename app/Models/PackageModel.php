<?php

namespace App\Models;

use CodeIgniter\Model;

class PackageModel extends Model
{
    protected $table = "packages";
    protected $primaryKey = "package_id";
    protected $useTimestamps = false;
    protected $allowedFields = ["package_id", "title", "location", "image", "price"];

    public function getPackages($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['package_id' => $id])->first();
    }

    public function getPrice($location)
    {
        return $this->where(['location' => $location])->first();
    }

    public function getTotal()
    {
        return $this->selectCount('title');
    }

}