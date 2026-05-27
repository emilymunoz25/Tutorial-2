<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'cursos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Cursos | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h2>Administrar Cursos</h2>
            <p>Crea y gestiona el catálogo completo de cursos.</p>
        </div>

        <div class="topbar-settings">
            <div class="accessibility-tools">
                <div class="language-selector">
                    <label for="idioma">Idioma:</label>

                    <select id="idioma">
                        <option>Español</option>
                        <option>English</option>
                        <option>Français</option>
                    </select>
                </div>

                <button class="theme-btn">
                    🌙 Modo Oscuro
                </button>
            </div>
        </div>
    </header>

    <nav><?php include 'menuAdmin.inc.php'; ?></nav>

    <section>
        <h1>Cursos del Sistema</h1>
        <div class="actions">
            <a href="#" class="btn">Crear Nuevo Curso</a>
            <a href="#" class="btn">Importar Cursos</a>
        </div>

        <table>
            <tr><th>ID</th><th>Título</th><th>Categoría</th><th>Docente</th><th>Estudiantes</th><th>Estado</th><th>Acciones</th></tr>
            <tr><td>101</td><td>Python Básico</td><td>Programación</td><td>Dr. Silva</td><td>1,234</td><td>Publicado</td><td><a href="#">Editar</a> | <a href="#">Archivar</a></td></tr>
            <tr><td>102</td><td>Machine Learning</td><td>IA</td><td>Dra. Morales</td><td>856</td><td>Publicado</td><td><a href="#">Editar</a> | <a href="#">Archivar</a></td></tr>
            <tr><td>103</td><td>SQL Avanzado</td><td>Bases de Datos</td><td>Prof. García</td><td>432</td><td>Borrador</td><td><a href="#">Editar</a> | <a href="#">Publicar</a></td></tr>
        </table>

        <div class="course-stats">
            <h2>Estadísticas de Cursos</h2>
            <div class="grid">
                <article class="card">
                    <h3>Total Cursos</h3>
                    <p class="stat">89</p>
                </article>
                <article class="card">
                    <h3>Cursos Activos</h3>
                    <p class="stat">76</p>
                </article>
                <article class="card">
                    <h3>En Desarrollo</h3>
                    <p class="stat">13</p>
                </article>
            </div>
        </div>
    </section>

    <footer class="main-footer">

        <div class="footer-grid">

            <div class="footer-brand">
                <h3>TutorVideos</h3>
                <p>
                    Plataforma educativa interactiva con cursos,
                    tutoriales y herramientas de aprendizaje digital.
                </p>
            </div>

            <div class="footer-links">
                <h4>Enlaces</h4>

                <p href="admin.php">Panel Admin</p>
                <p href="cursos.php">Cursos</p>
                <p href="reportes.php">Reportes</p>
                <p href="usuarios.php">Usuarios</p>
            </div>

            <div class="footer-contact">
                <h4>Contacto</h4>

                <p>📧 soporte@tutorvideos.com</p>
                <p>📍 Popayán, Colombia</p>
                <p>📞 +57 300 000 0000</p>
            </div>

            <div class="footer-social">
                <h4>Síguenos</h4>

                <div class="social-icons">
                    <p href="#">Facebook</p>
                    <p href="#">Instagram</p>
                    <p href="#">YouTube</p>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <p>
                © 2025 TutorVideos - Colegio Mayor del Cauca.
                Todos los derechos reservados.
            </p>
        </div>

    </footer>
    <div class="accessibility-float" title="Opciones de accesibilidad">
        👩🏻‍💻
    </div>    
</body>
</html>