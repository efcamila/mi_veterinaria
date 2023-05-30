<?=$cabecera?>
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Altas</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url("/baja") ?>">Bajas</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url("/modificacion") ?>">Modificaciones</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url("/mostrar") ?>">Mostrar</a>
</li>
</ul>
</div>
</div>
</nav>

<div class="container">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if (session('errorsOwner')) {
                                        echo 'active';
                                    } ?>" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dueños</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if (session('errorsPet')) {
                                        echo 'active';
                                    } ?>" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Mascotas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if (session('errorsVeterinarian')) {
                                        echo 'active';
                                    } ?>" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Veterinarios</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if (session('errorsOwnerPet')) {
                                        echo 'active';
                                    } ?>" id="pills-ownerpet-tab" data-bs-toggle="pill" data-bs-target="#pills-ownerpet" type="button" role="tab" aria-controls="pills-ownerpet" aria-selected="false">Dueños y mascotas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if (session('errorsVeterinarianPet')) {
                                        echo 'active';
                                    } ?>" id="pills-veterinarianpet-tab" data-bs-toggle="pill" data-bs-target="#pills-veterinarianpet" type="button" role="tab" aria-controls="pills-veterinarianpet" aria-selected="false">Veterinarios y mascotas</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade <?php if (session('errorsOwner')) {
                                        echo 'show active';
                                    } ?>" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <div class="row justify-content-center">
                <form class="col-6" action="validateOwner" method="post" name="formOwner">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="nameOwner" value="<?php echo old('nameOwner') ?>">
                        <?php echo '<p style="color:red">' . session('errorsOwner.nameOwner') . '</p>' ?>
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="<?php echo old('surname') ?>">
                        <?php echo '<p style="color:red">' . session('errorsOwner.surname') . '</p>' ?>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo old('address') ?>">
                        <?php echo '<p style="color:red">' . session('errorsOwner.address') . '</p>' ?>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Teléfono</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number" value="<?php echo old('phone_number') ?>">
                        <?php echo '<p style="color:red">' . session('errorsOwner.phone_number') . '</p>' ?>
                    </div>
                    <button type="submit" class="btn btn-primary" name="sendOwner">Guardar</button>
                </form>
            </div>
        </div>


        <div class="tab-pane fade <?php if (session('errorsPet')) {
                                        echo 'show active';
                                    } ?>" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="row justify-content-center">
                <form class="col-6" action="validatePet" method="post" name="formPet">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="namePet" value="<?php echo old('namePet') ?>">
                        <?php echo '<p style="color:red">' . session('errorsPet.namePet') . '</p>' ?>
                    </div>
                    <div class="mb-3">
                        <label for="race" class="form-label">Raza</label>
                        <input type="text" class="form-control" id="race" name="race" value="<?php echo old('race') ?>">
                        <?php echo '<p style="color:red">' . session('errorsPet.race') . '</p>' ?>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="age" name="age" value="<?php echo old('age') ?>">
                        <?php echo '<p style="color:red">' . session('errorsPet.age') . '</p>' ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>

        <div class="tab-pane fade <?php if (session('errorsVeterinarian')) {
                                        echo 'show active';
                                    } ?>" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <div class="row justify-content-center">
                <form class="col-6" action="validateVeterinarian" method="post" name="formVeterinarian">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="nameVeterinarian" value="<?php echo old('nameVeterinarian') ?>">
                        <?php echo '<p style="color:red">' . session('errorsVeterinarian.nameVeterinarian') . '</p>' ?>
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="surname" name="surnameVeterinarian" value="<?php echo old('surnameVeterinarian') ?>">
                        <?php echo '<p style="color:red">' . session('errorsVeterinarian.surnameVeterinarian') . '</p>' ?>
                    </div>
                    <div class="mb-3">
                        <label for="speciality" class="form-label">Especialidad</label>
                        <input type="text" class="form-control" id="speciality" name="speciality" value="<?php echo old('speciality') ?>">
                        <?php echo '<p style="color:red">' . session('errorsVeterinarian.speciality') . '</p>' ?>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Teléfono</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_numberVeterinarian" value="<?php echo old('phone_numberVeterinarian') ?>">
                        <?php echo '<p style="color:red">' . session('errorsVeterinarian.phone_numberVeterinarian') . '</p>' ?>
                    </div>
                    <div class="mb-3">
                        <label for="admission_date" class="form-label">Fecha de ingreso</label>
                        <input type="date" class="form-control" id="admission_date" name="admission_date" value="<?php echo old('admission_date') ?>">
                        <?php echo '<p style="color:red">' . session('errorsVeterinarian.admission_date') . '</p>' ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>

        <div class="tab-pane fade <?php if (session('errorsOwnerPet')) {
                                        echo 'show active';
                                    } ?>" id="pills-ownerpet" role="tabpanel" aria-labelledby="pills-ownerpet-tab" tabindex="0">
            <div class="row justify-content-center">
                <form class="col-6" action="validateOwnerPet" method="post" name="formOwnerPet">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre y apellido del dueño</label>
                        <select class="form-select" name="owner_id">
                            <?php foreach ($owners as $owner) { ?>
                                <option name='id' value="<?= $owner['id'] ?>"><?= $owner['name'] . ' ' . $owner['surname'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre de la mascota</label>
                        <select class="form-select" name="pet_id">
                            <?php foreach ($pets as $pet) { ?>
                                <option name='id' value="<?= $pet['id'] ?>"><?= $pet['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="btn-owner-pet">Guardar</button>
                </form>
            </div>
        </div>

        <div class="tab-pane fade <?php if (session('errorsVeterinarianPet')) {
                                        echo 'show active';
                                    } ?>" id="pills-veterinarianpet" role="tabpanel" aria-labelledby="pills-veterinarianpet-tab" tabindex="0">
            <div class="row justify-content-center">
                <form class="col-6" action="validateVeterinarianPet" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre y apellido del veterinario</label>
                        <select class="form-select" name="veterinarian_id">
                            <?php foreach ($veterinarians as $veterinarian) { ?>
                                <option name='id' value="<?= $veterinarian['id'] ?>"><?= $veterinarian['name'] . ' ' . $veterinarian['surname'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre de la mascota</label>
                        <select class="form-select" name="pet_id">
                            <?php foreach ($pets as $pet) { ?>
                                <option name='id' value="<?= $pet['id'] ?>"><?= $pet['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="btn-veterinarian-pet">Guardar</button>
                </form>
            </div>
        </div>




    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    let message = "<?php echo $message ?>";


    if (message==1){
        swal('', "Agregado con éxito", 'success');
    };

    if (message==2){
        swal('', "No pudo ser agregado", 'error');
    };

    if (message==3){
        swal('', "Esta mascota ya tiene dueño", 'error');
    };

    if (message==4){
        swal('', "Esta mascota ha fallecido", 'error');
    }
</script>
</body>

</html>