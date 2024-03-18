<?php include '../Layouts/app.php'; ?>

<div class="row">
	<div class="col text-start">
		<h2 class="table-title">Contactos</h2>
	</div>
</div>

<table class="styled-table">
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th class="col-auto">Ver</th>
		<th class="col-auto">Actualizar</th>
		<th class="col-auto">Borrar</th>
	</tr>

    <?php foreach ($contacts as $contact) : ?>
	<tr>
		<td><?= $contact->idContacto; ?></td>
		<td><?= $contact->nombre; ?></td>
		<td><?= $contact->apellido; ?></td>
		<td class="col-auto">
			<button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#selectModal<?= $contact->idContacto; ?>">
				<span class="fa fa-eye"></span>
			</button>
		</td>
		<td class="col-auto">
			<button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal<?= $contact->idContacto; ?>">
				<span class="fa fa-pencil"></span>
			</button>
		</td>
		<td class="col-auto">
			<button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $contact->idContacto; ?>">
				<span class="fa fa-trash"></span>
			</button>
		</td>
	</tr>
	<?php endforeach; ?>
</table>