<?php $activePage = 'vision'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visión | TutorVideos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <header>
        <div class="confirm-row">
            <img src="./img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Nuestra Visión</h1>
            <p>Ser la plataforma líder en educación digital del futuro.</p>
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
        <h1>Visión de TutorVideos</h1>
        <p>Imaginamos un mundo donde el aprendizaje es ilimitado, personalizado y accesible para todos. En 2030, TutorVideos será la plataforma educativa más utilizada globalmente, revolucionando cómo las personas aprenden y enseñan.</p>

        <div class="grid">
            <article class="card">
                <h3>Mundo Sin Fronteras</h3>
                <p>Eliminar barreras geográficas y culturales en la educación, conectando estudiantes de todo el planeta.</p>
            </article>
            <article class="card">
                <h3>Educación del Futuro</h3>
                <p>Integrar IA avanzada, metaverso y neurociencia para crear experiencias de aprendizaje óptimas.</p>
            </article>
            <article class="card">
                <h3>Impacto Social</h3>
                <p>Contribuir al desarrollo sostenible reduciendo la brecha educativa y promoviendo el aprendizaje continuo.</p>
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