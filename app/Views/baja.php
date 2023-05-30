<?=$cabecera?>
<li class="nav-item">
    <a class="nav-link" aria-current="page" href="<?php echo base_url("/alta") ?>">Altas</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="#">Bajas</a>
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
            <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dueños y Mascotas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Veterinarios</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <div class="row justify-content-center">
                <form class="col-6" action="removeOwnerPet" method="post">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Dueño y mascota</label>
                        <select class="form-select" name="id-owner-pet">
                            <?php foreach ($owners_pets as $owner_pet) { ?>
                                <option value="<?= $owner_pet['id'] ?>"><?= $owner_pet['nameO'] . ' ' . $owner_pet['surname'] . ': ' . $owner_pet['nameP'] . ' ' . $owner_pet['race']  ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text">Motivo</label>
                        <select class="form-select" name="id-motive">
                            <option value="<?= $motive[0]['id'] ?>">Venta</option>
                            <option value="<?= $motive[1]['id'] ?>">Muerte</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn-owner-pet">Dar de baja</button>
                </form>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <div class="row justify-content-center">
                <form class="col-6" action="removeVeterinarian" method="post">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Veterinario</label>
                        <select class="form-select" name="id_veterinarian">
                            <?php
                            foreach ($veterinarians as $veterinarian) {
                                echo '<option value=' . $veterinarian['id'] . '>' . $veterinarian['name'] . ' ' . $veterinarian['surname'] .
                                    '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn-veterinarian">Dar de baja</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    let message = "<?php echo $message ?>";

    if (message==1){
        swal('', "Dado de baja con éxito", 'success');
    }

    if (message==2){
        swal('', "No pudo ser dado de baja", 'error');
    }

</script>

</body>

</html>