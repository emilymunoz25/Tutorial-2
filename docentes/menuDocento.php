<?php $activePage = 'inicio'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Docente | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Menú Docente</h1>
            <p>Gestiona tu perfil, formación y cursos con una experiencia moderna y clara.</p>
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
        <h1>Bienvenido</h1>
        <p>Utiliza este panel para navegar entre tu información docente y las páginas de gestión de cursos.</p>
        <div class="grid">
            <article class="card">
                <h3>Inicio</h3>
                <p>Regresa al inicio del área docente en cualquier momento.</p>
                <a class="btn" href="homedocente.php">Ir a inicio</a>
            </article>
            <article class="card">
                <h3>Perfil</h3>
                <p>Actualiza tu información profesional y de contacto.</p>
                <a class="btn" href="perfil.php">Ir al perfil</a>
            </article>
            <article class="card">
                <h3>Formación</h3>
                <p>Registra tus estudios, especializaciones y certificaciones.</p>
                <a class="btn" href="formacion.php">Ir a formación</a>
            </article>
            <article class="card">
                <h3>Cursos</h3>
                <p>Accede al curso 1 y planifica el contenido de tu área académica.</p>
                <a class="btn" href="curso1.php">Ir a curso 1</a>
            </article>
            <article class="card">
                <h3>Plan avanzado</h3>
                <p>Diseña estructuras pedagógicas y criterios de evaluación.</p>
                <a class="btn" href="curso2.php">Ir a curso 2</a>
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



