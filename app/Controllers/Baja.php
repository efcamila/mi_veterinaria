<?php

namespace App\Controllers;

use App\Models\OwnersModel;
use App\Models\OwnersPetsModel;
use App\Models\PetsModel;
use App\Models\VeterinariansModel;


class Baja extends BaseController
{
    public function index()
    {
        $message = session('message');
        $data['message'] = $message;

        $veterinarian = new VeterinariansModel();
        $data['veterinarians'] = $veterinarian->getEgressDate();


        $owner_pet = new OwnersPetsModel();
        $where = 'isnull(date_end_relation) and (isnull(motive_end_relation_id) or motive_end_relation_id=1)';
        $data['owners_pets'] = $owner_pet->join_owner_pet($where);
        $data['motive'] = $owner_pet->get_motive();

        $data['cabecera'] = view('template/cabecera');

        return view('baja', $data);
    }

    public function removeVeterinarian()
    {
        $veterinarian = new VeterinariansModel();
        $date = date("Y-m-d");

        if (isset($_POST['id_veterinarian'])) {
            $id = $this->request->getPost('id_veterinarian');
            var_dump($veterinarian->find($id));
            if ($veterinarian->find($id)) {

                $data = [
                    'egress_date' => $date
                ];

                if ($veterinarian->update($id, $data)) {
                    var_dump($veterinarian->find($id));
                    return redirect()->to(base_url('/baja'))->with('message', '1');
                } else {
                    return redirect()->to(base_url('/baja'))->with('message', '2');
                }
            }
        }
        return redirect()->to(base_url('/baja'));
    }

    public function removeOwnerPet()
    {
        $owner_pet = new OwnersPetsModel();
        $date = date("Y-m-d");

        if (isset($_POST['id-owner-pet'])) {
            $id_owner_pet = $this->request->getPost('id-owner-pet');

            if ($result = $owner_pet->find($id_owner_pet)) {

                $data = [
                    'motive_end_relation_id' => $this->request->getPost('id-motive'),
                    'date_end_relation' => $date
                ];

                if ($owner_pet->update($id_owner_pet, $data)) {
                    if ($data['motive_end_relation_id'] == 2) {
                        $pet = new PetsModel();
                        if ($pet->update($result['pet_id'], ['death_date' => $date])) {
                            return redirect()->to(base_url('/baja'))->with('message', '1');
                        }
                        return redirect()->to(base_url('/baja'))->with('message', '1');
                    }
                    return redirect()->to(base_url('/baja'))->with('message', '1');
                } else {
                    return redirect()->to(base_url('/baja'))->with('message', '2');
                }
            }
        }
        return redirect()->to(base_url('/baja'));
    }
}
