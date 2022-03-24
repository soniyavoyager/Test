<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteModel extends Model
{
    protected $table = 'Site';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'name',
		'plot',
		'compny',
    ];
}
