<?php

namespace App\Controllers;

use App\Models\OwnersModel;
use App\Models\PetsModel;
use App\Models\VeterinariansModel;

class Modificar extends BaseController
{
    public function index()
    {
        $message = session('message');
        $data['message'] = $message;
        $data['cabecera'] = view('template/cabecera');
        $owner = new OwnersModel();
        $data['owners'] = $owner->findAll();

        $pet = new PetsModel();
        $data['pets'] = $pet->findAll();

        $veterinarian = new veterinariansModel();
        $data['veterinarians'] = $veterinarian->findAll();

        return view('modificacion', $data);
    }

    public function editar()
    {
        $data['cabecera'] = view('template/cabecera');
        if (isset($_POST['id']) || session('id')) {

            if (isset($_POST['id'])) {
                $value = $this->request->getPost('editar');
                $id = $this->request->getPost('id');
            } else if (session('value')) {
                $value = session('value');
                $id = session('id');
            }

            switch ($value) {
                case 1:
                    $owner = new OwnersModel();
                    $data['owner'] = $owner->find($id);
                    $data['value'] = 1;
                    break;
                case 2:
                    $pet = new PetsModel();
                    $data['pet'] = $pet->find($id);
                    $data['value'] = 2;
                    break;
                case 3:
                    $veterinarian = new VeterinariansModel();
                    $data['veterinarian'] = $veterinarian->find($id);
                    $data['value'] = 3;
                    break;
                default:
                    return view('modificar');
            }

            return view('editar', $data);
        } else {
            return $this->index();
        }
    }

    public function editOwner()
    {

        if (isset($_POST['id'])) {
            $value = $this->request->getPost('editar');
            $id_owner = $this->request->getPost('id');

            $owner = new OwnersModel();
            $validation = service('validation');
            $validation->setRules(
                [
                    'name' => 'required|min_length[3]|max_length[20]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ]*$/u]',
                    'surname' => 'required|min_length[3]|max_length[30]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ]*$/u]',
                    'address' => 'required|min_length[3]|max_length[30]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ 0-9]*$/u]',
                    'phone_number' => 'required|min_length[8]|max_length[15]|numeric',
                    'id' => 'required|numeric'
                ],
                [
                    'name' => [
                        'required' => 'El campo nombre es obligatorio',
                        'min_length' => 'La longitud minima es 3',
                        'max_length' => 'La longitud maxima es 20',
                        'regex_match' => 'Solo puede ser caracteres alfabéticos y el espacio'
                    ],
                    'surname' => [
                        'required' => 'El campo apellido es obligatorio',
                        'min_length' => 'La longitud minima es 3',
                        'max_length' => 'La longitud maxima es 30',
                        'regex_match' => 'Solo puede ser caracteres alfabéticos y el espacio'
                    ],
                    'address' => [
                        'required' => 'El campo dirección es obligatorio',
                        'min_length' => 'La longitud minima es 3',
                        'max_length' => 'La longitud maxima es 30',
                        'regex_match' => 'Solo puede ser caracteres alfanúmericos y el espacio'
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
                return redirect()->back()->withInput()
                    ->with('errors', $validation->getErrors())->with('id', $id_owner)->with('value', $value);
            }

            $data = array(
                'name' => $this->request->getPost('name'),
                'surname' => $this->request->getPost('surname'),
                'address' => $this->request->getPost('address'),
                'phone_number' => $this->request->getPost('phone_number'),
            );

            if ($owner->update($id_owner, $data)) {
                return redirect()->to(base_url('/modificacion'))->with('message', '1');
            } else {
                return redirect()->to(base_url('/modificacion'))->with('message', '2');
            }
        }
    }

    public function editPet()
    {

        if (isset($_POST['id'])) {
            $value = $this->request->getPost('editar');
            $id_pet = $this->request->getPost('id');

            $pet = new PetsModel();
            $validation = service('validation');
            $validation->setRules(
                [
                    'name' => 'required|min_length[3]|max_length[20]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ]*$/u]',
                    'race' => 'required|min_length[3]|max_length[30]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ]*$/u]',
                    'age' => 'required|min_length[1]|max_length[2]|numeric',
                ],
                [
                    'name' => [
                        'required' => 'El campo nombre es obligatorio',
                        'min_length' => 'La longitud minima es 3',
                        'max_length' => 'La longitud maxima es 20',
                        'regex_match' => 'Solo puede ser caracteres alfabéticos y el espacio'
                    ],
                    'race' => [
                        'required' => 'El campo raza es obligatorio',
                        'min_length' => 'La longitud minima es 3',
                        'max_length' => 'La longitud maxima es 30',
                        'regex_match' => 'Solo puede ser caracteres alfabéticos y el espacio'
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
                return redirect()->back()->withInput()
                    ->with('errors', $validation->getErrors())->with('id', $id_pet)->with('value', $value);
            }

            $data = array(
                'name' => $this->request->getPost('name'),
                'race' => $this->request->getPost('race'),
                'age' => $this->request->getPost('age'),
            );

            if ($pet->update($id_pet, $data)) {
                return redirect()->to(base_url('/modificacion'))->with('message', '1');
            } else {
                return redirect()->to(base_url('/modificacion'))->with('message', '2');
            }
        }
    }

    public function editVeterinarian()
    {
        if (isset($_POST['id'])) {
            $value = $this->request->getPost('editar');
            $id_veterinarian = $this->request->getPost('id');

            $veterinarian = new VeterinariansModel();
            $validation = service('validation');
            $validation->setRules(
                [
                    'name' => 'required|min_length[3]|max_length[20]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ]*$/u]',
                    'surname' => 'required|min_length[3]|max_length[30]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ]*$/u]',
                    'speciality' => 'required|min_length[3]|max_length[30]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ]*$/u]',
                    'phone_number' => 'required|min_length[8]|max_length[15]|numeric',
                    'admission_date' => 'required',
                ],
                [
                    'name' => [
                        'required' => 'El campo nombre es obligatorio',
                        'min_length' => 'La longitud minima es 3',
                        'max_length' => 'La longitud maxima es 20',
                        'regex_match' => 'Solo puede ser caracteres alfabéticos y el espacio'
                    ],

                    'surname' => [
                        'required' => 'El campo apellido es obligatorio',
                        'min_length' => 'La longitud minima es 3',
                        'max_length' => 'La longitud maxima es 30',
                        'regex_match' => 'Solo puede ser caracteres alfabéticos y el espacio'
                    ],
                    'speciality' => [
                        'required' => 'El campo especialidad es obligatorio',
                        'min_length' => 'La longitud minima es 3',
                        'max_length' => 'La longitud maxima es 30',
                        'regex_match' => 'Solo puede ser caracteres alfabéticos y el espacio'
                    ],
                    'phone_number' => [
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
                return redirect()->back()->withInput()
                    ->with('errors', $validation->getErrors())->with('id', $id_veterinarian)->with('value', $value);
            }

            $data = array(
                'name' => $this->request->getPost('name'),
                'surname' => $this->request->getPost('surname'),
                'speciality' => $this->request->getPost('speciality'),
                'phone_number' => $this->request->getPost('phone_number'),
                'admission_date' => $this->request->getPost('admission_date'),
            );

            if ($veterinarian->update($id_veterinarian, $data)) {
                return redirect()->to(base_url('/modificacion'))->with('message', '1');
            } else {
                return redirect()->to(base_url('/modificacion'))->with('message', '2');
            }
        }
    }
}
