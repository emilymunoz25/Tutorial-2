<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'config';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Configuración del Sistema</h1>
            <p>Ajusta parámetros globales y configuraciones avanzadas.</p>
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
        <h1>Configuraciones</h1>
        <form action="#" method="post">
            <div class="form-grid">
                <div>
                    <label for="sitioNombre">Nombre del Sitio</label>
                    <input type="text" id="sitioNombre" name="sitioNombre" value="TutorVideos">
                </div>
                <div>
                    <label for="emailAdmin">Email Administrador</label>
                    <input type="email" id="emailAdmin" name="emailAdmin" value="admin@tutorvideos.com">
                </div>
                <div>
                    <label for="maxUsuarios">Límite de Usuarios</label>
                    <input type="number" id="maxUsuarios" name="maxUsuarios" value="50000">
                </div>
                <div>
                    <label for="moneda">Moneda Predeterminada</label>
                    <select id="moneda" name="moneda">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                        <option value="COP">COP</option>
                    </select>
                </div>
            </div>

            <div class="form-block">
                <label for="descripcion">Descripción del Sitio</label>
                <textarea id="descripcion" name="descripcion" rows="4">Plataforma de aprendizaje con videos tutoriales interactivos y personalizados.</textarea>
            </div>

            <div class="form-grid">
                <div>
                    <label for="mantenimiento">Modo Mantenimiento</label>
                    <select id="mantenimiento" name="mantenimiento">
                        <option value="0">Desactivado</option>
                        <option value="1">Activado</option>
                    </select>
                </div>
                <div>
                    <label for="registroAbierto">Registro Abierto</label>
                    <select id="registroAbierto" name="registroAbierto">
                        <option value="1" selected>Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div>
                <button type="submit">Guardar Configuraciones</button>
                <button type="reset" class="btn-secondary">Restablecer</button>
            </div>
        </form>

        <div class="danger-zone">
            <h2>Zona de Peligro</h2>
            <p>Acciones irreversibles - usar con precaución</p>
            <button class="btn danger">Reiniciar Base de Datos</button>
            <button class="btn danger">Eliminar Todos los Usuarios</button>
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