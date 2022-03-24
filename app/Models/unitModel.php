<?php

namespace App\Models;

use CodeIgniter\Model;

class unitModel extends Model
{
    protected $table = 'unit';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'name',
    ];
}
