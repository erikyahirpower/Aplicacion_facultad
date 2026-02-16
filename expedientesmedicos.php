<?php
// expedientesmedicos.php
if (isset($_GET['id'])) {
    $xml = simplexml_load_file('xmlgeneral.xml');
    $expediente = $xml->xpath("//expedientesmedicos/expediente[@matricula='" . $_GET['id'] . "']");
    $expedienteData = $expediente[0];
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Expediente Médico</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/external/jquery/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>
<body class="fondo-main">
    <br><br>
    
    <!-- Botón de regreso al menú principal -->
    <div class="container">
        <a href="index.php" class="btn btn-secondary mb-3">
            <i class="fas fa-home"></i> Menú Principal
        </a>
    </div>
    
    <h2 align="center" class="titulo">Expediente Médico y Salud</h2>
    
    <form role="form" id="formulario" name="formulario" action="javascript:guardar()">
        <div class="container" style="margin-top:50px">
            <div class="card">
                <h5 class="card-header d-flex justify-content-center">Datos Médicos</h5>
                <div class="card-body">
                    <div class="container" style="width:80rem; margin-top:20px; margin-bottom:20px">
                        
                        <!-- Matrícula del Alumno (Relación 1:1) -->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Matrícula del Alumno <span class="text-danger">*</span></label>
                                <input type="text" name="matricula" id="matricula" class="form-control" required 
                                    value="<?php if(isset($_GET['id'])) echo $expedienteData['matricula']; ?>" 
                                    <?php if(isset($_GET['id'])) echo 'disabled'; ?>>
                                <input type="hidden" name="id" id="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                                <input type="hidden" name="acc" id="acc" value="<?php echo isset($_GET['id']) ? '2' : '1'; ?>">
                                <input type="hidden" name="tipo" id="tipo" value="7">
                            </div>
                        </div>

                        <!-- Tipo de Sangre -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tipo de Sangre</label>
                                <select class="custom-select" name="tiposangre" required>
                                    <option value="">Selecciona...</option>
                                    <option value="A+" <?php if(isset($expedienteData)) if($expedienteData->tiposangre == 'A+') echo 'selected'; ?>>A+</option>
                                    <option value="A-" <?php if(isset($expedienteData)) if($expedienteData->tiposangre == 'A-') echo 'selected'; ?>>A-</option>
                                    <option value="B+" <?php if(isset($expedienteData)) if($expedienteData->tiposangre == 'B+') echo 'selected'; ?>>B+</option>
                                    <option value="B-" <?php if(isset($expedienteData)) if($expedienteData->tiposangre == 'B-') echo 'selected'; ?>>B-</option>
                                    <option value="AB+" <?php if(isset($expedienteData)) if($expedienteData->tiposangre == 'AB+') echo 'selected'; ?>>AB+</option>
                                    <option value="AB-" <?php if(isset($expedienteData)) if($expedienteData->tiposangre == 'AB-') echo 'selected'; ?>>AB-</option>
                                    <option value="O+" <?php if(isset($expedienteData)) if($expedienteData->tiposangre == 'O+') echo 'selected'; ?>>O+</option>
                                    <option value="O-" <?php if(isset($expedienteData)) if($expedienteData->tiposangre == 'O-') echo 'selected'; ?>>O-</option>
                                </select>
                            </div>

                            <!-- Número de Seguridad Social (NSS) -->
                            <div class="form-group col-md-6">
                                <label>Número de Seguridad Social (NSS)</label>
                                <input type="number" name="nss" class="form-control" required 
                                    value="<?php if(isset($expedienteData)) echo $expedienteData->nss; ?>"
                                    title="Solo números">
                            </div>
                        </div>

                        <!-- Institución de Salud -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Institución de Salud</label>
                                <select class="custom-select" name="institucion" required>
                                    <option value="">Selecciona...</option>
                                    <option value="IMSS" <?php if(isset($expedienteData)) if($expedienteData->institucion == 'IMSS') echo 'selected'; ?>>IMSS</option>
                                    <option value="ISSSTE" <?php if(isset($expedienteData)) if($expedienteData->institucion == 'ISSSTE') echo 'selected'; ?>>ISSSTE</option>
                                    <option value="Seguro Universitario" <?php if(isset($expedienteData)) if($expedienteData->institucion == 'Seguro Universitario') echo 'selected'; ?>>Seguro Universitario</option>
                                </select>
                            </div>

                            <!-- Alergias -->
                            <div class="form-group col-md-6">
                                <label>Alergias</label>
                                <input type="text" name="alergias" class="form-control" 
                                    value="<?php if(isset($expedienteData)) echo $expedienteData->alergias; else echo 'Ninguna'; ?>"
                                    placeholder="Ninguna">
                            </div>
                        </div>

                        <!-- Padecimientos Crónicos -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Padecimientos Crónicos</label>
                                <input type="text" name="padecimientoscronicos" class="form-control" 
                                    value="<?php if(isset($expedienteData)) echo $expedienteData->padecimientoscronicos; else echo 'Ninguno'; ?>"
                                    placeholder="Diabetes, Hipertensión, Asma, Ninguno">
                            </div>

                            <!-- Fecha Último Chequeo -->
                            <div class="form-group col-md-6">
                                <label>Fecha Último Chequeo Médico</label>
                                <input type="date" name="fechachequeo" class="form-control" required 
                                    value="<?php if(isset($expedienteData)) echo $expedienteData->fechachequeo; ?>">
                            </div>
                        </div>

                        <!-- Contacto Emergencia -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nombre Contacto Emergencia <span class="text-danger">*</span></label>
                                <input type="text" name="nombrecontacto" class="form-control" required 
                                    value="<?php if(isset($expedienteData)) echo $expedienteData->nombrecontacto; ?>">
                            </div>

                            <!-- Parentesco -->
                            <div class="form-group col-md-6">
                                <label>Parentesco del Contacto</label>
                                <select class="custom-select" name="parentesco" required>
                                    <option value="">Selecciona...</option>
                                    <option value="Padre" <?php if(isset($expedienteData)) if($expedienteData->parentesco == 'Padre') echo 'selected'; ?>>Padre</option>
                                    <option value="Madre" <?php if(isset($expedienteData)) if($expedienteData->parentesco == 'Madre') echo 'selected'; ?>>Madre</option>
                                    <option value="Cónyuge" <?php if(isset($expedienteData)) if($expedienteData->parentesco == 'Cónyuge') echo 'selected'; ?>>Cónyuge</option>
                                    <option value="Hermano" <?php if(isset($expedienteData)) if($expedienteData->parentesco == 'Hermano') echo 'selected'; ?>>Hermano</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                        </div>

                        <!-- Teléfono Emergencia (10 dígitos) -->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Teléfono Emergencia <span class="text-danger">*</span> (10 dígitos)</label>
                                <input type="tel" name="telefonoe" class="form-control" required 
                                    pattern="[0-9]{10}" title="Debe tener exactamente 10 dígitos numéricos"
                                    value="<?php if(isset($expedienteData)) echo $expedienteData->telefonoe; ?>">
                                <small class="form-text text-muted">Ejemplo: 1234567890</small>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <br>
        <?php if (!isset($_GET['id'])): ?>
            <div align="center" style="margin-bottom: 20px">
                <button type="submit" class="btn btn-primary botonguardar" style="width:350px">Guardar</button>
            </div>
        <?php else: ?>
            <div align="center" style="margin-bottom: 20px">
                <button type="submit" class="btn btn-primary botoneditar" style="width:350px">Editar</button>
            </div>
        <?php endif; ?>
    </form>
</body>

<script type="text/javascript">
function guardar() {
    $.ajax({
        url: 'include/funciones.php',
        type: 'post',
        data: $('#formulario').serialize(),
        success: function(response) {
            console.log(response);
            if (response == 0) {
                // Error: Matrícula ya existe o inválida
                $('<div>La matrícula no existe o expediente ya registrado. Verifique teléfono (10 dígitos) y NSS (numérico).</div>')
                    .dialog({
                        title: 'Error',
                        resizable: false,
                        height: 'auto',
                        width: 400,
                        modal: true,
                        buttons: {
                            'Entendido': function() {
                                $(this).dialog('close');
                            }
                        }
                    });
            } else {
                $('<div>Acción Completada.</div>')
                    .dialog({
                        title: 'Acción Completada',
                        resizable: false,
                        height: 'auto',
                        width: 400,
                        modal: true,
                        buttons: {
                            'Entendido': function() {
                                $(this).dialog('close');
                                document.location = 'listar_expedientes.php';
                            }
                        }
                    });
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert('Error ' + xhr.status + ': No se pudo conectar con el servidor');
        }
    });
}
</script>
</html>