<?php

namespace App\Models;

use CodeIgniter\Model;

class Staff_roles_Model extends Model
{
    protected $table = 'staff_roles';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        's_id',
    	'emp_view',
    	'emp_edit',
    	'emp_delete',
    	'cate_view',
    	'cate_edit',
    	'cate_delete',	
    	'Com_view',
    	'Com_edit',
    	'Com_delete',
    	'plot_view',
    	'plot_edit',
    	'plot_delete',
    	'Site_m_view',
    	'Site_m_edit',
    	'Site_m_delete',
    	'unit_view',
    	'unit_edit',
    	'unit_delete',	
    	'Segment_view',
    	'Segment_edit',
    	'Segment_delete',
    	'Product_c_view',
    	'Product_c_edit',
    	'Product_c_delete',
    	'Materials_view',
    	'Materials_edit',
    	'Materials_delete',
    	'Materials_r_view',
    	'Materials_r_edit',
    	'Materials_r_delete',
    	'Materials_r_approval'
    	
    ];
}
