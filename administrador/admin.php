<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'admin';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Panel de Administración</h1>
            <p>Gestiona usuarios, cursos y configuraciones del sistema.</p>
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
        <h2>Bienvenido, Administrador</h2>
        <p>Desde aquí puedes controlar todos los aspectos de TutorVideos.</p>

        <div class="grid">
            <article class="card">
                <span class="tag">Usuarios</span>
                <h3>Gestión de Usuarios</h3>
                <p>Administra cuentas de estudiantes y docentes, permisos y accesos.</p>
                <a class="btn" href="usuarios.php">Ver usuarios</a>
            </article>
            <article class="card">
                <span class="tag">Cursos</span>
                <h3>Administrar Cursos</h3>
                <p>Crea, edita y supervisa todos los cursos disponibles en la plataforma.</p>
                <a class="btn" href="cursos.php">Gestionar cursos</a>
            </article>
            <article class="card">
                <span class="tag">Estadísticas</span>
                <h3>Reportes y Analytics</h3>
                <p>Visualiza métricas de uso, progreso de estudiantes y rendimiento del sistema.</p>
                <a class="btn" href="reportes.php">Ver reportes</a>
            </article>
            <article class="card">
                <span class="tag">Sistema</span>
                <h3>Configuración</h3>
                <p>Ajusta parámetros del sistema, integraciones y políticas de seguridad.</p>
                <a class="btn" href="config.php">Configurar</a>
            </article>
        </div>

        <div class="stats">
            <h2>Estadísticas Rápidas</h2>
            <table>
                <tr><th>Métrica</th><th>Valor</th></tr>
                <tr><td>Usuarios Activos</td><td>12,456</td></tr>
                <tr><td>Cursos Disponibles</td><td>89</td></tr>
                <tr><td>Completaciones Hoy</td><td>234</td></tr>
                <tr><td>Ingresos Mensuales</td><td>$45,678</td></tr>
            </table>
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