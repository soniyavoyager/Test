<?php

namespace App\Models;

use CodeIgniter\Model;

class job_card_model extends Model
{
    protected $table = 'job_card_img_mst';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'jobcard_id',
    	'folder_name',
    	'job_card_date',
   ];
}
