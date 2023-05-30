<?php

namespace App\Models;

use CodeIgniter\Model;

class OwnersPetsModel extends Model
{
    protected $table      = 'owners_pets';
    protected $primaryKey = 'id';

    protected $allowedFields = ['owner_id','pet_id','motive_end_relation_id',
    'date_end_relation'];


    public function owner_pet($pet_id){
        $db      = \Config\Database::connect();
        $builder = $db->table('owners_pets');
        $where = 'pet_id='.$pet_id;
        $builder->select('*')->where($where)->orderBy('id','DESC');
        
        $data = $builder->get()->getResultArray();
        //var_dump($data);
        return $data;
    }

    public function join_owner_pet($where){

        $db      = \Config\Database::connect();
        $builder = $db->table('owners_pets op');
        $builder->select('op.id,o.name as nameO,o.surname,p.name as nameP,p.race,op.*')
        ->join('owners o','o.id=op.owner_id')
        ->join('pets p','p.id=op.pet_id')
        ->where($where);
        
        $data = $builder->get()->getResultArray();
        return $data;
    }

    public function get_motive(){
        $db      = \Config\Database::connect();
        $builder = $db->table('motive_end_relation');
        $builder->select('*');
        $data = $builder->get()->getResultArray();

        return $data;
    }

}