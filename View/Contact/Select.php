<?php include '../../Model/Contact/contactos.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Contactos</title>
        <link rel="stylesheet" href="../Css/Tabla.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container mt-4 mb-4">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <form action="../../Controller/Contact/ContactController.php" method="post">
                        <button type="submit" class="btn btn-danger" name=" ">LogOut</button>
                    </form>
                </div>
                <div class="col-auto">
                    <form action="../../Controller/Contact/ContactController.php" method="post">
                        <button type="submit" class="btn btn-primary" name="Añadir">Añadir Contacto</button>
                    </form>
                </div>
            </div>
        </div>
        
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Número de Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th class="col-auto">Ver</th>
                    <th class="col-auto">Actualizar</th>
                    <th class="col-auto">Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactos as $contacto): ?>
                    <tr>
                        <td><?= $contacto->idContacto; ?></td>
                        <td><?= $contacto->nombre; ?></td>
                        <td><?= $contacto->apellido; ?></td>
                        <td><?= $contacto->numeroTelefono; ?></td>
                        <td><?= $contacto->correoElectronico; ?></td>
                        <td class="col-auto"><button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#selectModal<?= $contacto->idContacto; ?>"><span class="fa fa-user-circle"></span></button></td>
                        <td class="col-auto"><button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal<?= $contacto->idContacto; ?>"><span class="fa fa-pencil"></span></button></td>
                        <td class="col-auto"><button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $contacto->idContacto; ?>"><span class="fa fa-trash"></span></button></td>
                    </tr>    
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>