<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'docente'){
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'inicio';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Docente | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Hola, docente</h1>
            <p>Tu espacio para planificar, actualizar tu perfil y crear cursos con diseño actual.</p>
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
        <h1>Visión general</h1>
        <p>Accede de forma rápida a tus herramientas más importantes y mantén todo tu trabajo docente organizado.</p>

        <div class="grid">
            <article class="card">
                <span class="tag">Rápido</span>
                <h3>Actualizar perfil</h3>
                <p>Modifica tu información de contacto, experiencia y área académica en segundos.</p>
                <a class="btn" href="perfil.php">Ir al perfil</a>
            </article>
            <article class="card">
                <span class="tag">Certificado</span>
                <h3>Registrar formación</h3>
                <p>Guarda tus títulos, especialidades y estado de formación académica.</p>
                <a class="btn" href="formacion.php">Ir a formación</a>
            </article>
            <article class="card">
                <span class="tag">Curso</span>
                <h3>Gestión de Curso 1</h3>
                <p>Crea y edita la ficha de tu primer curso, con objetivos y recursos.</p>
                <a class="btn" href="curso1.php">Abrir curso 1</a>
            </article>
            <article class="card">
                <span class="tag">Avanzado</span>
                <h3>Planificación pedagógica</h3>
                <p>Diseña el programa, la metodología y los criterios de evaluación.</p>
                <a class="btn" href="curso2.php">Abrir curso 2</a>
            </article>
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




