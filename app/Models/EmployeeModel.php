<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'Emp_id',
    	'name',
    	'phone',
    	'email',
    	'designation',
    	'rate',
    	'ot1',
    	'ot2',
    ];
}
