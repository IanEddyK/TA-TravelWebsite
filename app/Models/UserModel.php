<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $useTimestamps = false;
    protected $allowedFields = ["id", "nama", "no_telp", "email", "password", "role", "created_at"];

    public function getCustomer($year)
    {
        return $this->db->table('users')
        ->select("MONTH(created_at) month, COUNT(*) total")
        ->where('YEAR(created_at)', $year)
        ->groupBy('created_at')
        ->orderBy('MONTH(created_at)')
        ->get()->getResultArray();
    }
}