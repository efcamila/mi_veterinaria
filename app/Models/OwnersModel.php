<?php

namespace App\Models;

use CodeIgniter\Model;

class OwnersModel extends Model
{
    protected $table      = 'owners';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'surname','address','phone_number',
    'creation_date'];
}