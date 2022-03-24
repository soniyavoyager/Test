<?php

namespace App\Models;

use CodeIgniter\Model;

class ToolModel extends Model
{
    protected $table = 'Tools_master';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'name',
    	'qty',
    	'rate',
    ];
}
