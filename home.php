<?php $activePage = 'home'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | TutorVideos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="./img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Bienvenido a TutorVideos</h1>
            <p>Tu plataforma de aprendizaje con videos tutoriales interactivos y personalizados.</p>
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

    <nav><?php include 'menu.inc.php'; ?></nav>

    <section>
        <h1>Descubre el aprendizaje del futuro</h1>
        <p>En TutorVideos, transformamos la educación a través de videos tutoriales dinámicos, adaptados a tu ritmo de aprendizaje. Explora cursos en matemáticas, ciencias, lenguajes y más.</p>

        <div class="grid">
            <article class="card">
                <h3>Aprendizaje Personalizado</h3>
                <p>Nuestros algoritmos adaptan el contenido a tu nivel y estilo de aprendizaje, maximizando la retención y el entendimiento.</p>
            </article>
            <article class="card">
                <h3>Comunidad Activa</h3>
                <p>Únete a miles de estudiantes y docentes en foros interactivos, donde compartes conocimientos y resuelves dudas en tiempo real.</p>
            </article>
            <article class="card">
                <h3>Certificaciones Reconocidas</h3>
                <p>Obtén certificados avalados por instituciones educativas, válidos para tu currículum profesional y académico.</p>
            </article>
            <article class="card">
                <h3>Tecnología Inmersiva</h3>
                <p>Experiencia 3D, realidad aumentada y gamificación hacen que aprender sea divertido y efectivo.</p>
            </article>
        </div>

        <div class="cta">
            <a href="verificacion.php" class="btn">Comienza Ahora</a>
            <a href="catalogo.php" class="btn">Explora Cursos</a>
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

                <p href="home.php">Inicio</p>
                <p href="catalogo.php">Cursos</p>
                <p href="preguntas.php">FAQ</p>
                <p href="mision.php">Misión</p>
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