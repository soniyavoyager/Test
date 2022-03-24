<?php

namespace App\Models;

use CodeIgniter\Model;

class JobModel extends Model
{
    protected $table = 'job_types';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'name',
    ];
}
