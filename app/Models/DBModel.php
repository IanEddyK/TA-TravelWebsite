<?php

namespace App\Models;

use CodeIgniter\Model;

class DBModel extends Model
{
    protected $table = "book_form";
    protected $primaryKey = "id_book";
    protected $useTimestamps = false;
    protected $allowedFields = ["id_book", "name", "email", "phone", "address", "location", "guests", "arrivals", "leaving", "created_at"];

    public function findUser($email)
    {
        return $this->where(['email' => $email])->first();
    }

    public function findID($id_book)
    {
        return $this->where(['id_book' => $id_book])->first();
    }

    public function getTransaction($year)
    {
        return $this->db->table('book_form as bf')
            ->select('MONTH(bf.created_at) month, p.price price')
            ->join('packages p', 'location')
            ->where('YEAR(bf.created_at)', $year)
            ->orderBy('MONTH(bf.created_at)')
            ->get()->getResultArray();
    }
}
