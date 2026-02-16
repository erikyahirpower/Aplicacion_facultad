<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión - Facultad</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Tu archivo CSS existente -->
    <link rel="stylesheet" href="css/estilos.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .container-principal {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }
        
        .header-sistema {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
            text-align: center;
        }
        
        .header-sistema h1 {
            color: #3BAFD2;
            font-weight: bold;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .header-sistema p {
            color: #666;
            font-size: 1.1rem;
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }
        
        .menu-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: inherit;
            display: block;
        }
        
        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            text-decoration: none;
        }
        
        .menu-card i {
            font-size: 3.5rem;
            margin-bottom: 20px;
            display: block;
        }
        
        .menu-card h3 {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        
        .menu-card p {
            color: #666;
            font-size: 0.9rem;
            margin: 0;
        }
        
        /* Colores específicos para cada card */
        .card-estudiantes i { color: #3BAFD2; }
        .card-estudiantes:hover { border-top: 4px solid #3BAFD2; }
        
        .card-profesores i { color: #faa54f; }
        .card-profesores:hover { border-top: 4px solid #faa54f; }
        
        .card-materias i { color: #5cb85c; }
        .card-materias:hover { border-top: 4px solid #5cb85c; }
        
        .card-expedientes i { color: #d9534f; }
        .card-expedientes:hover { border-top: 4px solid #d9534f; }
        
        .card-listar i { color: #9b59b6; }
        .card-listar:hover { border-top: 4px solid #9b59b6; }
        
        .footer-info {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .footer-info p {
            margin: 0;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container-principal">
        <!-- Header -->
        <div class="header-sistema">
            <h1>
                <i class="fas fa-university"></i>
                Sistema de Gestión de Facultad
            </h1>
            <p>Bienvenido al sistema integral de administración académica</p>
        </div>
        
        <!-- Menú de opciones -->
        <div class="menu-grid">
            <!-- Estudiantes -->
            <a href="estudiantes.php" class="menu-card card-estudiantes">
                <i class="fas fa-user-graduate"></i>
                <h3>Estudiantes</h3>
                <p>Gestionar información de alumnos, matrículas y datos académicos</p>
            </a>
            
            <!-- Profesores -->
            <a href="profesores.php" class="menu-card card-profesores">
                <i class="fas fa-chalkboard-teacher"></i>
                <h3>Profesores</h3>
                <p>Administrar personal docente, publicaciones y asignaciones</p>
            </a>
            
            <!-- Materias -->
            <a href="materias.php" class="menu-card card-materias">
                <i class="fas fa-book"></i>
                <h3>Materias</h3>
                <p>Control de asignaturas, horarios y créditos</p>
            </a>
            
            <!-- Expedientes Médicos -->
            <a href="expedientesmedicos.php" class="menu-card card-expedientes">
                <i class="fas fa-file-medical"></i>
                <h3>Expedientes Médicos</h3>
                <p>Crear y actualizar expedientes médicos de estudiantes</p>
            </a>
            
            <!-- Listar Expedientes -->
            <a href="listar_expedientes.php" class="menu-card card-listar">
                <i class="fas fa-list-alt"></i>
                <h3>Consultar Expedientes</h3>
                <p>Visualizar y buscar expedientes médicos registrados</p>
            </a>
        </div>
        
        <!-- Footer informativo -->
        <div class="footer-info">
            <p>
                <i class="fas fa-info-circle"></i>
                <strong>Sistema de Gestión Académica</strong> | 
                Versión 1.0 | 
                Desarrollado para la Facultad de Ciencias de la Computación
            </p>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>