<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staffs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'first_name',
    	'last_name',
    	'email',
    	'phone',
    	'password',
    	'position',
    	'username'
    ];
}
