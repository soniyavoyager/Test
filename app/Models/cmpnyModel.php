<?php

namespace App\Models;

use CodeIgniter\Model;

class cmpnyModel extends Model
{
    protected $table = 'cmpny';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'cmpny_name',
    ];
}
