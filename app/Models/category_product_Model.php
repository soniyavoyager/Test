<?php

namespace App\Models;

use CodeIgniter\Model;

class category_product_Model extends Model
{
    protected $table = 'Product_category';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'product_name',
    ];
}
