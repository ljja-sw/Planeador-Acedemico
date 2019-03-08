<div class="container">
    <div class="row py-3">
        <div class="col-md-10 mx-auto">
            <form action="/docentes/guardar" method="post">

                <input type="text" name="nombre" placeholder="nombre" id="">
                <input type="text" name="apellido" placeholder="apellido" id="">
                <input type="text" name="correo" placeholder="correo" id="">
                <input type="text" name="codigo" placeholder="codigo" id="" maxlength="7">
                <input type="text" name="documento_identidad" placeholder="documento_identidad" maxlength="10" id="">

                <select name="rol">
                    <?php foreach($datos['roles'] as $rol): ?>
                        <option value="<?= $rol['id']; ?>">
                            <?= $rol['nombre']; ?>
                        </option>
                    <?php endforeach;?>
                </select>
                    
                <select name="programa_dependencia">
                    <?php foreach($datos['programas'] as $rol): ?>
                        <option value="<?= $rol['id']; ?>">
                            <?= "{$rol['nombre']}-{$rol['codigo']}"; ?>
                        </option>
                    <?php endforeach;?>
                </select>

                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</div>