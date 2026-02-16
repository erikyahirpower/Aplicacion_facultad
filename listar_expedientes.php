<?php
$xml = simplexml_load_file('xmlgeneral.xml');
$expedientes = $xml->xpath('//expedientesmedicos/expediente');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Lista Expedientes Médicos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>
<body class="fondo-main">
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titulo text-center mb-4">Expedientes Médicos</h2>
                <a href="expedientesmedicos.php" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i> Nuevo Expediente
                </a>
            </div>
        </div>

        <?php if (empty($expedientes)): ?>
            <div class="alert alert-info text-center">
                No hay expedientes médicos registrados.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Matrícula</th>
                            <th>Tipo Sangre</th>
                            <th>NSS</th>
                            <th>Institución</th>
                            <th>Alergias</th>
                            <th>Contacto Emergencia</th>
                            <th>Tel. Emergencia</th>
                            <th>Último Chequeo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($expedientes as $exp): ?>
                            <tr>
                                <td><strong><?= $exp['matricula'] ?></strong></td>
                                <td><?= $exp->tiposangre ?></td>
                                <td><?= $exp->nss ?></td>
                                <td><?= $exp->institucion ?></td>
                                <td><?= $exp->alergias ?: 'Ninguna' ?></td>
                                <td><?= $exp->nombrecontacto ?> (<?= $exp->parentesco ?>)</td>
                                <td><strong><?= $exp->telefonoe ?></strong></td>
                                <td><?= date('d/m/Y', strtotime($exp->fechachequeo)) ?></td>
                                <td>
                                    <a href="expedientesmedicos.php?id=<?= $exp['matricula'] ?>" class="btn btn-sm btn-primary" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="incluido/funciones.php?tipo=7&accion=eliminar&matricula=<?= $exp['matricula'] ?>" 
                                       class="btn btn-sm btn-danger eliminar-btn" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
    $('.eliminar-btn').click(function(e) {
        e.preventDefault();
        if (confirm('¿Eliminar este expediente médico?')) {
            window.location = $(this).attr('href');
        }
    });
    </script>
</body>
</html>
