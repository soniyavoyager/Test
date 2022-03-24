<?php

namespace App\Models;

use CodeIgniter\Model;

class Suppliermodel extends Model
{
    protected $table = 'Supplier';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'sup_id',
    	'name',
    	'phone',
    	'email',
    	'Address',
    	
    ];
}
