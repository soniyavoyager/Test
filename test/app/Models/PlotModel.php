<?php

namespace App\Models;

use CodeIgniter\Model;

class PlotModel extends Model
{
    protected $table = 'Plot';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'name',
    ];
}
