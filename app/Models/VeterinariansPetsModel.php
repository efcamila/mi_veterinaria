<?php

namespace App\Models;

use CodeIgniter\Model;

class VeterinariansPetsModel extends Model
{
    protected $table      = 'veterinarians_pets';
    protected $primaryKey = 'id';

    protected $allowedFields = ['veterinarian_id', 'pet_id',
    'speciality','consultation_date'];
    
    public function join_veterinarian_pet($where){

        $db      = \Config\Database::connect();
        $builder = $db->table('veterinarians_pets vp');
        $builder->select('vp.id,v.name as nameV,v.surname,v.speciality,p.name as nameP,p.race,vp.*')
        ->join('veterinarians v','v.id=vp.veterinarian_id')
        ->join('pets p','p.id=vp.pet_id')
        ->where($where);
        
        $data = $builder->get()->getResultArray();
        return $data;
    }
}
?>