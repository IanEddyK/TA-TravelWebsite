<?php

namespace App\Models;

use CodeIgniter\Model;

class RecapModel extends Model
{
    protected $table = "book_recap";
    protected $useTimestamps = false;
    protected $allowedFields = ["id_book", "name", "location", "guests", "package_id", "month"];
    
    
}