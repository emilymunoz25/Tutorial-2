<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'docente') {
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'perfil';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Docente | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Perfil docente</h1>
            <p>Completa tu información profesional para que tus estudiantes te conozcan mejor.</p>
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

    <nav><?php include 'menuDocente.inc.php'; ?></nav>

    <section>
        <h1>Editar perfil</h1>
        <form action="#" method="post">
            <div class="form-grid">
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Juan" required>
                </div>
                <div>
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Pérez Gómez" required>
                </div>
                <div>
                    <label for="identificacion">Identificación</label>
                    <input type="text" id="identificacion" name="identificacion" placeholder="1234567890" required>
                </div>
                <div>
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" placeholder="docente@ejemplo.com" required>
                </div>
                <div>
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="+57 300 000 0000">
                </div>
                <div>
                    <label for="area">Área académica</label>
                    <input type="text" id="area" name="area" placeholder="Matemáticas, Ciencias, Lengua">
                </div>
            </div>

            <div class="form-grid">
                <div>
                    <label for="ciudad">Ciudad</label>
                    <input type="text" id="ciudad" name="ciudad" placeholder="Cali">
                </div>
                <div>
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" placeholder="Calle 12 #34-56">
                </div>
                <div>
                    <label for="nacimiento">Fecha de nacimiento</label>
                    <input type="date" id="nacimiento" name="nacimiento">
                </div>
                <div>
                    <label for="linkedin">Perfil LinkedIn</label>
                    <input type="text" id="linkedin" name="linkedin" placeholder="https://www.linkedin.com/in/usuario">
                </div>
            </div>

            <div class="form-block">
                <label for="resumen">Resumen profesional</label>
                <textarea id="resumen" name="resumen" rows="5" placeholder="Describe tu experiencia docente, metodologías y fortalezas."></textarea>
            </div>

            <div class="form-block">
                <label for="metodologia">Metodología preferida</label>
                <select id="metodologia" name="metodologia">
                    <option value="">Selecciona una opción</option>
                    <option>Aprendizaje activo</option>
                    <option>Gamificación</option>
                    <option>Proyectos colaborativos</option>
                    <option>Híbrida</option>
                </select>
            </div>

            <div>
                <button type="submit">Guardar cambios</button>
                <button type="reset" class="btn-secondary">Restablecer</button>
            </div>
        </form>
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

                <p href="homedocente.php">Inicio</p>
                <p href="curso1.php">Curso 1</p>
                <p href="curso2.php">Curso 2</p>
                <p href="ia.php">IA</p>
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