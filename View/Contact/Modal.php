<!-- Modal de Ver Contacto -->
<div class="modal fade" id="selectModal<?= $contacto->idContacto; ?>" tabindex="-1" aria-labelledby="selectModalLabel<?= $contacto->idContacto; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectModalLabel<?= $contacto->idContacto; ?>">Ver Detalles del Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>ID: <?= $contacto->idContacto; ?></p>
                <p>Nombre: <?= $contacto->nombre; ?></p>
                <p>Apellido: <?= $contacto->apellido; ?></p>
                <p>Número de Teléfono: <?= $contacto->numeroTelefono; ?></p>
                <p>Correo Electrónico: <?= $contacto->correoElectronico; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal de Actualizar Contacto -->
<div class="modal fade" id="updateModal<?= $contacto->idContacto; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Actualizar Información del Contacto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../Controller/Contact/ContactController.php" method="POST">
                    <input type="hidden" name="idContacto1" value="<?= $contacto->idContacto; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $contacto->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $contacto->apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Número de Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $contacto->numeroTelefono; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="<?= $contacto->correoElectronico; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="actualizarContacto" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal de Borrar Contacto -->
<div class="modal fade" id="deleteModal<?= $contacto->idContacto; ?>" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModal">Confirmar Borrado del Contacto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas borrar este contacto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="../../Controller/Contact/ContactController.php" method="POST">
                    <input type="hidden" name="idContacto" value="<?= $contacto->idContacto; ?>">
                    <button type="submit" name="borrarContacto" class="btn btn-danger">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

            