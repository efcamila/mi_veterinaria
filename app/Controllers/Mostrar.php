<?php

namespace App\Controllers;

use App\Models\OwnersModel;
use App\Models\PetsModel;
use App\Models\VeterinariansModel;
use App\Models\OwnersPetsModel;
use App\Models\VeterinariansPetsModel;

class Mostrar extends BaseController
{
    public function index()
    {
        $data['cabecera'] = view('template/cabecera');

        $owner = new OwnersModel();
        $data['owners'] = $owner->findAll();

        $pet = new PetsModel();
        $data['pets'] = $pet->findAll();

        $veterinarian = new VeterinariansModel();
        $data['veterinarians'] = $veterinarian->findAll();

        if (isset($_POST['search_pet'])) {
            $id = $this->request->getPost('pet_id');
            $data['pet_owner'] = $this->searchPet($id);
        }

        if (isset($_POST['search_owner'])) {
            $id = $this->request->getPost('owner_id');
            $data['owner_pet'] = $this->searchOwner($id);
        }

        if (isset($_POST['search_veterinarian'])) {
            $id = $this->request->getPost('veterinarian_id');
            $data['veterinarian_pet'] = $this->searchVeterinarian($id);
        }

        return view('mostrar', $data);
    }

    public function searchPet($id)
    {
        $pet = new OwnersPetsModel();
        $where = 'pet_id=' . $id;
        if ($result_pet = $pet->join_owner_pet($where)) {
            return $result_pet;
        }
    }

    public function searchOwner($id)
    {
        $owner = new OwnersPetsModel();
        $where = 'owner_id=' . $id;
        if ($result_owner = $owner->join_owner_pet($where)) {
            return $result_owner;
        }
    }

    public function searchVeterinarian($id)
    {
        $veterinarian = new VeterinariansPetsModel();
        $where = 'veterinarian_id=' . $id;
        if ($result_veterinarian = $veterinarian->join_veterinarian_pet($where)) {
            return $result_veterinarian;
        }
    }
}
