<?php

namespace App\Models;

use CodeIgniter\Model;

class SegmentModel extends Model
{
    protected $table = 'Segment';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'seg_name',
    ];
}
