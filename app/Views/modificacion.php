<?=$cabecera?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("/alta") ?>">Altas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("/baja") ?>">Bajas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Modificaciones</a>
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
                <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dueños</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Mascotas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Veterinarios</button>
            </li>
        </ul>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <div class="row justify-content-center">
                <form class="col-6" method="post" action='editar' name="editar">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Elige una persona</label>
                        <select class="form-select" name="id">
                        <?php foreach($owners as $owner) {?>
                            <option name='id' value="<?=$owner['id']?>"><?=$owner['name'].' '.$owner['surname']?></option>
                        <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" value="1" name="editar">Editar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="row justify-content-center">
                <form class="col-6" method="post" action='editar' name="editar">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Elige una mascota</label>
                        <select class="form-select" name="id">
                            <?php foreach($pets as $pet) {?>
                            <option name='id' value="<?=$pet['id']?>"><?=$pet['name']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" value="2" name="editar">Editar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <div class="row justify-content-center">
                <form class="col-6" method="post" action='editar' name="editar">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Elige un veterinario</label>
                        <select class="form-select" name="id">
                        <?php foreach($veterinarians as $veterinarian) {?>
                            <option name='id' value="<?=$veterinarian['id']?>"><?=$veterinarian['name'].' '.$veterinarian['surname']?></option>
                        <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" value="3" name="editar">Editar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        let message = "<?php echo $message ?>";

        if (message == 1) {
            swal('', "Actualizado con exito", 'success');
        } 
        
        if (message == 2) {
            swal('', "No se pudo actualizar", 'error');
        } 
    </script>

</body>

</html>