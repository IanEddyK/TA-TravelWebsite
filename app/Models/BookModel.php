<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = "book_form";
    protected $primaryKey = "id_book";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ["id_book", "id_user", "name", "email", "phone", "address", "location", "guests", "arrivals", "leaving", "created_at"];

    public function getBooks($id_user)
    {
        return $this->where(['id_user' => $id_user])->first();
    }

}