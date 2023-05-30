<?php

namespace App\Controllers;

use App\Models\OwnersModel;
use App\Models\PetsModel;
use App\Models\VeterinariansModel;
use App\Models\OwnersPetsModel;
use App\Models\VeterinariansPetsModel;

class Alta extends BaseController
{

    public function __construct()
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
    }

    public function index()
    {
        $message = session('message');
        $data["message"] = $message;
        $data['cabecera'] = view('template/cabecera');

        $owner = new OwnersModel();
        $data['owners'] = $owner->findAll();

        $pet = new PetsModel();
        $data['pets'] = $pet->getPetsNotDeath();

        $veterinarian = new VeterinariansModel();
        $data['veterinarians'] = $veterinarian->getEgressDate();

        return view('alta', $data);
    }

    public function validateOwner()
    {
        $creation_date = date("Y-m-d");
        $ownerModel = new OwnersModel();
        $validation = service('validation');
        $validation->setRules(
            [
                'nameOwner' => 'required|min_length[3]|max_length[20]|alpha_space',
                'surname' => 'required|min_length[3]|max_length[30]|alpha_space',
                'address' => 'required|min_length[3]|max_length[30]|alpha_numeric_space',
                'phone_number' => 'required|min_length[8]|max_length[15]|numeric',
            ],
            [
                'nameOwner' => [
                    'required' => 'El campo nombre es obligatorio',
                    'min_length' => 'La longitud minima es 3',
                    'max_length' => 'La longitud maxima es 20',
                    'alpha_space' => 'Solo puede ser caracteres alfabéticos y el espacio'
                ],
                'surname' => [
                    'required' => 'El campo apellido es obligatorio',
                    'min_length' => 'La longitud minima es 3',
                    'max_length' => 'La longitud maxima es 30',
                    'alpha_space' => 'Solo puede ser caracteres alfabéticos y el espacio'
                ],
                'address' => [
                    'required' => 'El campo dirección es obligatorio',
                    'min_length' => 'La longitud minima es 3',
                    'max_length' => 'La longitud maxima es 30',
                    'alpha_numeric_space' => 'Solo puede ser caracteres alfanúmericos y el espacio'
                ],
                'phone_number' => [
                    'required' => 'El campo teléfono es obligatorio',
                    'min_length' => 'La longitud minima es 8',
                    'max_length' => 'La longitud maxima es 15',
                    'numeric' => 'Solo puede ser caracteres númericos'
                ]
            ]
        );
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errorsOwner', $validation->getErrors());
        }

        $data = array(
            'name' => $this->request->getPost('nameOwner'),
            'surname' => $this->request->getPost('surname'),
            'address' => $this->request->getPost('address'),
            'phone_number' => $this->request->getPost('phone_number'),
            'creation_date' => $creation_date
        );

        if ($ownerModel->insert($data)) {
            return redirect()->to(base_url('/alta'))->with('message', '1');
        } else {
            return redirect()->to(base_url('/alta'))->with('message', '2');
        }
    }

    public function validatePet()
    {
        $creation_date = date("Y-m-d");
        $petModel = new PetsModel();
        $validation = service('validation');
        $validation->setRules(
            [
                'namePet' => 'required|min_length[3]|max_length[20]|alpha_space',
                'race' => 'required|min_length[3]|max_length[30]|alpha_space',
                'age' => 'required|min_length[1]|max_length[2]|numeric',
            ],
            [
                'namePet' => [
                    'required' => 'El campo nombre es obligatorio',
                    'min_length' => 'La longitud minima es 3',
                    'max_length' => 'La longitud maxima es 20',
                    'alpha_space' => 'Solo puede ser caracteres alfabéticos y el espacio'
                ],
                'race' => [
                    'required' => 'El campo raza es obligatorio',
                    'min_length' => 'La longitud minima es 3',
                    'max_length' => 'La longitud maxima es 30',
                    'alpha_space' => 'Solo puede ser caracteres alfabéticos y el espacio'
                ],
                'age' => [
                    'required' => 'El campo edad es obligatorio',
                    'min_length' => 'La longitud minima es 1',
                    'max_length' => 'La longitud maxima es 2',
                    'numeric' => 'Solo puede ser caracteres númericos'
                ]
            ]
        );
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errorsPet', $validation->getErrors());
        }

        $data = array(
            'name' => $this->request->getPost('namePet'),
            'race' => $this->request->getPost('race'),
            'age' => $this->request->getPost('age'),
            'creation_date' => $creation_date
        );

        if ($petModel->insert($data)) {
            return redirect()->to(base_url('/alta'))->with('message', '1');
        } else {
            return redirect()->to(base_url('/alta'))->with('message', '2');
        }
    }

    public function validateVeterinarian()
    {
        $creation_date = date("Y-m-d");
        $veterinarianModel = new VeterinariansModel();
        $validation = service('validation');
        $validation->setRules(
            [
                'nameVeterinarian' => 'required|min_length[3]|max_length[20]|alpha_space',
                'surnameVeterinarian' => 'required|min_length[3]|max_length[30]|alpha_space',
                'speciality' => 'required|min_length[3]|max_length[30]|alpha_space',
                'phone_numberVeterinarian' => 'required|min_length[8]|max_length[15]|numeric',
                'admission_date' => 'required',
            ],
            [
                'nameVeterinarian' => [
                    'required' => 'El campo nombre es obligatorio',
                    'min_length' => 'La longitud minima es 3',
                    'max_length' => 'La longitud maxima es 20',
                    'alpha_space' => 'Solo puede ser caracteres alfabéticos y el espacio'
                ],

                'surnameVeterinarian' => [
                    'required' => 'El campo apellido es obligatorio',
                    'min_length' => 'La longitud minima es 3',
                    'max_length' => 'La longitud maxima es 30',
                    'alpha_space' => 'Solo puede ser caracteres alfabéticos y el espacio'
                ],
                'speciality' => [
                    'required' => 'El campo dirección es obligatorio',
                    'min_length' => 'La longitud minima es 3',
                    'max_length' => 'La longitud maxima es 30',
                    'alpha_space' => 'Solo puede ser caracteres alfabéticos y el espacio'
                ],
                'phone_numberVeterinarian' => [
                    'required' => 'El campo teléfono es obligatorio',
                    'min_length' => 'La longitud minima es 8',
                    'max_length' => 'La longitud maxima es 15',
                    'numeric' => 'Solo puede ser caracteres númericos'
                ],
                'admission_date' => [
                    'required' => 'El campo fecha es obligatorio'
                ]
            ]
        );
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errorsVeterinarian', $validation->getErrors());
        }

        $data = array(
            'name' => $this->request->getPost('nameVeterinarian'),
            'surname' => $this->request->getPost('surnameVeterinarian'),
            'speciality' => $this->request->getPost('speciality'),
            'phone_number' => $this->request->getPost('phone_numberVeterinarian'),
            'admission_date' => $this->request->getPost('admission_date'),
            'creation_date' => $creation_date,
        );

        if ($veterinarianModel->insert($data)) {
            return redirect()->to(base_url('/alta'))->with('message', '1');
        } else {
            return redirect()->to(base_url('/alta'))->with('message', '2');
        }
    }

    public function validateOwnerPet()
    {
        $owner_pet = new OwnersPetsModel();
        $owner = new OwnersModel();
        $pet = new PetsModel();

        if ((isset($_POST['pet_id'])) && (isset($_POST['owner_id']))) {

            $pet_id = $this->request->getPost('pet_id');
            $owner_id =  $this->request->getPost('owner_id');

            if ($owner->find($owner_id) && $pet->find($pet_id)) {

                $data = [
                    'owner_id' => $owner_id,
                    'pet_id' => $pet_id
                ];

                if ($pet_result = $owner_pet->owner_pet($pet_id)) {
                    switch ($pet_result[0]['motive_end_relation_id']) {
                        case NULL:
                            $url = redirect()->to(base_url('/alta'))->with('message', '3'); // RELACION ACTIVA
                            break;
                        case 1:
                            $owner_pet->insert($data);
                            $url = redirect()->to(base_url('/alta'))->with('message', '1'); // RELACION POR VENTA
                            break;
                        case 2:
                            $url = redirect()->to(base_url('/alta'))->with('message', '4');  // RELACION DONDE EL PERRO FALLECIO
                            break;
                    }
                    return $url;
                } else {
                    $owner_pet->insert($data);
                    return redirect()->to(base_url('/alta'))->with('message', '1');
                }
            }
        }
        return redirect()->to(base_url('/alta'));
    }



    public function validateVeterinarianPet()
    {
        $date = date("Y-m-d");
        $veterinarian = new VeterinariansModel();
        $pet = new PetsModel();
        $veterinarian_pet = new VeterinariansPetsModel();

        if ((isset($_POST['pet_id'])) && (isset($_POST['veterinarian_id']))) {

            $pet_id = $this->request->getPost('pet_id');
            $veterinarian_id =  $this->request->getPost('veterinarian_id');

            if ($veterinarian->find($veterinarian_id) && $pet->find($pet_id)) {

                $data = [
                    'veterinarian_id' => $veterinarian_id,
                    'pet_id' => $pet_id,
                    'consultation_date' => $date
                ];

                if ($veterinarian_pet->insert($data)) {
                    return redirect()->to(base_url('/alta'))->with('message', '1');
                } else {
                    return redirect()->to(base_url('/alta'))->with('message', '2');
                }
            }
        }
        return redirect()->to(base_url('/alta'));
    }
}
