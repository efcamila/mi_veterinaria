<?=$cabecera?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("/alta") ?>">Altas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("/baja") ?>">Bajas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("/modificacion") ?>">Modificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Mostrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-pets" type="button" role="tab" aria-controls="pills-pets" aria-selected="true">Mascotas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-owners" type="button" role="tab" aria-controls="pills-owners" aria-selected="false">Dueños</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-veterinarian" type="button" role="tab" aria-controls="pills-veterinarian" aria-selected="false">Veterinarios</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php if (isset($pet_owner)){echo 'active';}?> id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-for-pet" type="button" role="tab" aria-controls="pills-for-pet" aria-selected="false">Por mascotas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php if (isset($owner_pet)){echo 'active';}?>" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-for-owner" type="button" role="tab" aria-controls="pills-for-owner" aria-selected="false">Por dueños</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php if (isset($veterinarian_pet)){echo 'active';}?>" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-for-veterinarian" type="button" role="tab" aria-controls="pills-for-veterinarian" aria-selected="false">Por veterinarios</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-pets" role="tabpanel" aria-labelledby="pills-pets-tab" tabindex="0">
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Raza</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">Fecha de muerte</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pets as $pet) { ?>
                                <tr>
                                    <td scope="row"><?= $pet['name'] ?></th>
                                    <td><?= $pet['race'] ?></td>
                                    <td><?= $pet['age'] ?></td>
                                    <td><?php $date = date("d-m-Y", strtotime($pet['creation_date']));
                                        echo $date; ?></td>
                                    <td><?php if ($pet['death_date'] != NULL) {
                                            $date = date("d-m-Y", strtotime($pet['death_date']));
                                            echo $date;
                                        } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="tab-pane fade" id="pills-owners" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Fecha de registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($owners as $owner) { ?>
                                <tr>
                                    <td scope="row"><?= $owner['name'] ?></th>
                                    <td><?= $owner['surname'] ?></td>
                                    <td><?= $owner['address'] ?></td>
                                    <td><?= $owner['phone_number'] ?></td>
                                    <td><?php if ($owner['creation_date'] != NULL) {
                                            $date = date("d-m-Y", strtotime($owner['creation_date']));
                                            echo $date;
                                        } ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-veterinarian" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Especialidad</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Fecha de ingreso</th>
                                <th scope="col">Fecha de salida</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($veterinarians as $veterinarian) { ?>
                                <tr>
                                    <td scope="row"><?= $veterinarian['name'] ?></th>
                                    <td><?= $veterinarian['surname'] ?></td>
                                    <td><?= $veterinarian['speciality'] ?></td>
                                    <td><?= $veterinarian['phone_number'] ?></td>
                                    <td><?php if ($veterinarian['admission_date'] != NULL) {
                                            $date = date("d-m-Y", strtotime($veterinarian['admission_date']));
                                            echo $date;
                                        } ?></td>
                                    <td><?php if ($veterinarian['egress_date'] != NULL) {
                                            $date = date("d-m-Y", strtotime($veterinarian['egress_date']));
                                            echo $date;
                                        } ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade <?php if (isset($pet_owner)){echo 'active show';}?>" id="pills-for-pet" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                <div class="row justify-content-center">
                    <form class="col-6" action="searchPet" method="post">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Mascota</label>
                            <select class="form-select" name="pet_id">
                                    <?php foreach ($pets as $pet) { ?>
                                        <option name='id' value="<?= $pet['id'] ?>"><?= $pet['name']?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3" name="search_pet">Buscar</button>
                        <?php if(isset($pet_owner) && $pet_owner==0) {
                                    echo '<p style="color:red">No se encontraron resultados</p>';
                            }?>
                    </form>
                    <?php if(isset($pet_name) && !empty($pet_name)){?><h5 class="mb-3">Resultados sobre <?=$pet_name['name']?></h5><?php }?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Raza</th>
                                <th scope="col">Dueño</th>
                                <th scope="col">Fecha fin de relación</th>
                                <th scope="col">Motivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($pet_owner) && $pet_owner!=0){ 
                                foreach($pet_owner as $po){?>
                                <tr>
                                    <td scope="row"><?= $po['nameP'] ?></th>
                                    <td><?= $po['race'] ?></td>
                                    <td><?= $po['nameO'].' '.$po['surname'] ?></td>
                                    <td><?php if ($po['date_end_relation'] != NULL) {
                                            $date = date("d-m-Y", strtotime($po['date_end_relation']));
                                            echo $date;
                                        } ?></td>
                                    <td><?php switch ($po['motive_end_relation_id']) {
                                                case NULL:
                                                    break;
                                                case 1:
                                                    echo 'Venta';
                                                    break;
                                                case 2: 
                                                    echo 'Muerte de la mascota';
                                                    break;
                                                default:
                                                    break;

                                        } ?></td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade <?php if (isset($owner_pet)){echo 'active show';}?>" id="pills-for-owner" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                <div class="row justify-content-center">
                <form class="col-6" action="searchOwner" method="post">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Dueño</label>
                            <select class="form-select" name="owner_id">
                                    <?php foreach ($owners as $owner) { ?>
                                        <option name='id' value="<?= $owner['id'] ?>"><?= $owner['name'].' '.$owner['surname']?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3" name="search_owner">Buscar</button>
                        <?php if(isset($owner_pet) && $owner_pet==0) {
                                    echo '<p style="color:red">No se encontraron resultados</p>';
                        }?>
                    </form>
                    <?php if(isset($owner_name) && !empty($owner_name)){?><h5 class="mb-3">Resultados sobre <?=$owner_name['name'].' '.$owner_name['surname'] ?></h5><?php }?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Dueño</th>
                                <th scope="col">Nombre de la mascota</th>
                                <th scope="col">Raza</th>
                                <th scope="col">Fecha fin de relación</th>
                                <th scope="col">Motivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($owner_pet) && $owner_pet!=0){ 
                                foreach($owner_pet as $op){?>
                                <tr>
                                    <td scope="row"><?= $op['nameO'].' '.$op['surname'] ?></td>
                                    <td><?= $op['nameP'] ?></th>
                                    <td><?= $op['race'] ?></td>
                                    <td><?php if ($op['date_end_relation'] != NULL) {
                                            $date = date("d-m-Y", strtotime($op['date_end_relation']));
                                            echo $date;
                                        } ?></td>
                                    <td><?php switch ($op['motive_end_relation_id']) {
                                                case NULL:
                                                    break;
                                                case 1:
                                                    echo 'Venta';
                                                    break;
                                                case 2: 
                                                    echo 'Muerte de la mascota';
                                                    break;
                                                default:
                                                    break;

                                        } ?></td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade <?php if (isset($veterinarian_pet)){echo 'active show';}?>" id="pills-for-veterinarian" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                <div class="row justify-content-center">
                <form class="col-6" action="searchVeterinarian" method="post">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Veterinario</label>
                            <select class="form-select" name="veterinarian_id">
                                    <?php foreach ($veterinarians as $veterinarian) { ?>
                                        <option name='id' value="<?= $veterinarian['id'] ?>"><?= $veterinarian['name'].' '.$veterinarian['surname']?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3" name="search_veterinarian">Buscar</button>
                        <?php if(isset($veterinarian_pet) && $veterinarian_pet==0) {
                                    echo '<p style="color:red">No se encontraron resultados</p>';
                        }?>
                    </form>
                    <?php if(isset($veterinarian_name) && !empty($veterinarian_name)){?><h5 class="mb-3">Resultados sobre <?=$veterinarian_name['name'].' '.$veterinarian_name['surname'] ?></h5><?php }?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Veterinario</th>
                                <th scope="col">Especialidad</th>
                                <th scope="col">Mascotas que atiende</th>
                                <th scope="col">Raza</th>
                                <th scope="col">Fecha de consulta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($veterinarian_pet) && $veterinarian_pet!=0){ 
                                foreach($veterinarian_pet as $vp){?>
                                <tr>
                                    <td scope="row"><?= $vp['nameV'].' '.$vp['surname'] ?></td>
                                    <td><?= $vp['speciality'] ?></th>
                                    <td><?= $vp['nameP'] ?></th>
                                    <td><?= $vp['race'] ?></td>
                                    <td><?php if ($vp['consultation_date'] != NULL) {
                                            $date = date("d-m-Y", strtotime($vp['consultation_date']));
                                            echo $date;
                                        } ?></td>
                                    
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>