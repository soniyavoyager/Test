<?php

namespace App\Models;

use CodeIgniter\Model;

class Materials_request_m_Model extends Model
{
    protected $table = 'meterial_req_master';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'met_id',
		'm_c_date',
		'status',
		
    ];
}
