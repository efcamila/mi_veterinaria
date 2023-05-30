<?php

namespace App\Models;

use CodeIgniter\Model;

class VeterinariansModel extends Model
{
    protected $table      = 'veterinarians';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'surname','speciality','phone_number',
    'admission_date','egress_date'];

    public function getEgressDate(){
        $db      = \Config\Database::connect();
        $builder = $db->table('veterinarians');
        $builder->select('*');
        //$where = 'egress_date IS NULL';
        $builder->where('egress_date IS NULL',NULL,FALSE);

        $data = $builder->get()->getResultArray();
        
        return $data;
    }

    /*public function updateVeterinarian($id,$date){
        $db      = \Config\Database::connect();
        $builder = $db->table('veterinarians');
        //$builder->where('id',$id);
        $result = $builder->update($id,['egress_date'=>$date])? true : false;
        var_dump($result);
        //return $result;
    }
    */

}