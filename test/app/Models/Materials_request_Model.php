<?php

namespace App\Models;

use CodeIgniter\Model;

class Materials_request_Model extends Model
{
    protected $table = 'meterial_req_details';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'met_d_id',
		'meterial',
		'unit',
		'qty',
		'met_rate',
		
    ];
}
