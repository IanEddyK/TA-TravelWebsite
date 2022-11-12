<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = "admin";
    protected $primaryKey = "id_admin";
    protected $useTimestamps = false;
    protected $allowedFields = ["id_admin", "nama", "no_telp", "email", "password"];

}