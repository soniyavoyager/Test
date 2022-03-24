<?php

namespace App\Models;

use CodeIgniter\Model;

class MaterialModel extends Model
{
    protected $table = 'materials';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'name',
    	'unit',
    	'rate',
    	'category',
    	'Segment',
    	'code',
    	'Quantity',
    ];
}
