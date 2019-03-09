<!-- Central Modal Medium Success -->
<div class="modal fade" id="modal-registrar-docentes" tabindex="-1" role="dialog" aria-labelledby="modal-registrar-docentes"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-primary" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Registrar Docente</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <form action="/docentes/guardar" id="form-registrar-docentes" method="post">
                    <div class="md-form md-outline">
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                        <label for="nombre">Nombre</label>
                    </div>

                    <div class="md-form md-outline">
                        <input type="text" name="apellido" id="apellido" class="form-control" required>
                        <label for="apellido">Apellido</label>
                    </div>

                    <div class="md-form md-outline">
                        <input type="email" name="correo" id="correo" class="form-control" required>
                        <label for="correo">Correo</label>
                    </div>

                    <div class="md-form md-outline">
                        <input type="text" name="codigo" id="codigo" maxlength="7" class="form-control" required>
                        <label for="codigo">Codigo</label>
                    </div>

                    <div class="md-form md-outline">
                        <input type="text" name="documento_identidad" maxlength="10" id="documento_identidad"
                            class="form-control" length="10" required>
                        <label for="documento_identidad">Documento Identidad</label>
                    </div>

                    <div class="form-row">
                        <small class="py-3 mx-auto">
                            Tipo de Usuario
                        </small>
                        <select name="rol" class="custom-select" required disabled>
                            <option value="<?= $datos['roles']['id']; ?>">
                                <?= $datos['roles']['nombre']; ?>
                            </option>
                        </select>
                    </div>

                    <div class="form-row">
                        <small class="py-3 mx-auto">
                            Dependencia
                        </small>
                        <select name="programa_dependencia" class="custom-select" required>
                            <?php foreach($datos['programas'] as $rol): ?>
                            <option value="<?= $rol['id']; ?>">
                                <?= "{$rol['nombre']}-{$rol['codigo']}"; ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </form>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <input type="submit" value="Enviar" class="btn btn-elegant" form="form-registrar-docentes">
                <a type="button" class="btn btn-outline-elegant waves-effect" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Central Modal Medium Success-->