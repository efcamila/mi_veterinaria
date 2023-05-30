<?php

namespace App\Models;

use CodeIgniter\Model;

class PetsModel extends Model
{
    protected $table      = 'pets';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'race','age','creation_date',
    'death_date'];

    public function getPetsNotDeath(){
        $db      = \Config\Database::connect();
        $builder = $db->table('pets');
        $where = 'death_date IS NULL';
        $builder->select('*')->where($where);
        
        $data = $builder->get()->getResultArray();
  
        return $data;
    }


}