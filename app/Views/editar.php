<?=$cabecera?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("/alta") ?>">Altas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("/baja") ?>">Bajas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url("/modificacion") ?>">Modificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url("/mostrar") ?>">Mostrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
<?php if ($value==1){?>
<div class="row justify-content-center">
    <form class="col-6" action="editOwner" method="post">
        <input type="hidden" value="<?=$owner['id']?>" name="id">  
        <h3 class="mt-3 mb-3">Editar dueño</h3>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$owner['name']?>">
            <?php echo '<p style="color:red">' . session('errors.name') . '</p>' ?>
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="surname" name="surname" value="<?=$owner['surname']?>">
            <?php echo '<p style="color:red">' . session('errors.surname') . '</p>' ?>
        </div>
        <div class="mb-3">
            <label for="adress" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="adress" name="address" value="<?=$owner['address']?>">
            <?php echo '<p style="color:red">' . session('errors.address') . '</p>' ?>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Teléfono</label>
            <input type="number" class="form-control" id="phone_number" name="phone_number" value="<?=$owner['phone_number']?>">
            <?php echo '<p style="color:red">' . session('errors.phone_number') . '</p>' ?>
        </div>
        <button type="submit" class="btn btn-primary" name="editar" value="<?=$value?>">Actualizar</button>
    </form>
</div>
<?php } 

if ($value==2){ ?>
                <div class="row justify-content-center">
                    <form class="col-6" action="editPet" method="post">
                        <h3 class="mt-3 mb-3">Editar mascota</h3>
                        <div class="mb-3">
                            <input type="hidden" value="<?=$pet['id']?>" name="id">  
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?=$pet['name']?>">
                            <?php echo '<p style="color:red">' . session('errors.name') . '</p>' ?>
                        </div>
                        <div class="mb-3">
                            <label for="race" class="form-label">Raza</label>
                            <input type="text" class="form-control" id="race" name="race" value="<?=$pet['race']?>">
                            <?php echo '<p style="color:red">' . session('errors.race') . '</p>' ?>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Edad</label>
                            <input type="number" class="form-control" id="age" name="age" value="<?=$pet['age']?>">
                            <?php echo '<p style="color:red">' . session('errors.age') . '</p>' ?>
                        </div>
                        <button type="submit" class="btn btn-primary" name="editar" value="<?=$value?>">Actualizar</button>
                    </form>
                </div>
            </div>
<?php } 
if ($value==3){ ?>
                <div class="row justify-content-center">
                    <form class="col-6" action="editVeterinarian" method="post">
                        <h3 class="mt-3 mb-3">Editar veterinario</h3>
                        <div class="mb-3">
                            <input type="hidden" value="<?=$veterinarian['id']?>" name="id">  
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?=$veterinarian['name']?>">
                            <?php echo '<p style="color:red">' . session('errors.name') . '</p>' ?>
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="<?=$veterinarian['surname']?>">
                            <?php echo '<p style="color:red">' . session('errors.surname') . '</p>' ?>
                        </div>
                        <div class="mb-3">
                            <label for="speciality" class="form-label">Especialidad</label>
                            <input type="text" class="form-control" id="speciality" name="speciality" value="<?=$veterinarian['speciality']?>">
                            <?php echo '<p style="color:red">' . session('errors.speciality') . '</p>' ?>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="phone_number" name="phone_number" value="<?=$veterinarian['phone_number']?>">
                            <?php echo '<p style="color:red">' . session('errors.phone_number') . '</p>' ?>
                        </div>
                        <div class="mb-3">
                            <label for="admission_date" class="form-label">Fecha de ingreso</label>
                            <input type="date" class="form-control" id="admission_date" name="admission_date" value="<?=$veterinarian['admission_date']?>">
                            <?php echo '<p style="color:red">' . session('errors.admission_date') . '</p>' ?>
                        </div>
                        <button type="submit" class="btn btn-primary" name="editar" value="<?=$value?>">Actualizar</button>
                    </form>
                </div>
        <?php } ?>   
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>