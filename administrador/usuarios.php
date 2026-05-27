<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'usuarios';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Gestión de Usuarios</h1>
            <p>Administra todas las cuentas de usuarios en el sistema.</p>
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
        <h1>Usuarios Registrados</h1>
        <form action="#" method="get" class="search-form">
            <input type="text" name="buscar" placeholder="Buscar usuario por nombre o email">
            <button type="submit">Buscar</button>
        </form>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <tr>
                <td>1</td>
                <td>María González</td>
                <td>maria@email.com</td>
                <td>Estudiante</td>
                <td>Activo</td>
                <td><a href="#">Editar</a> | <a href="#">Suspender</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Carlos Rodríguez</td>
                <td>carlos@email.com</td>
                <td>Docente</td>
                <td>Activo</td>
                <td><a href="#">Editar</a> | <a href="#">Suspender</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Ana López</td>
                <td>ana@email.com</td>
                <td>Estudiante</td>
                <td>Inactivo</td>
                <td><a href="#">Editar</a> | <a href="#">Activar</a></td>
            </tr>
        </table>

        <div class="pagination">
            <a href="#">Anterior</a>
            <span>Página 1 de 15</span>
            <a href="#">Siguiente</a>
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