<?php

namespace App\Models;

use CodeIgniter\Model;

class Jobcard_masterModel extends Model
{
    protected $table = 'jobcard_master';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'job_id',
    	 'card_date',
		  'comp_or_resi',
		  'plot',
		   'site',
		    'location',
			 'work_description',
			 'status',
			 'job_completed_date',
    	'staff_id',
    ];
}
