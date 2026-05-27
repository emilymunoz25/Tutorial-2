<?php $activePage = 'mision'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misión | TutorVideos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="./img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Nuestra Misión</h1>
            <p>Transformar la educación global a través de tecnología innovadora.</p>
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
        <h1>Misión de TutorVideos</h1>
        <p>En TutorVideos, nuestra misión es democratizar el acceso al conocimiento de calidad, utilizando videos tutoriales interactivos y tecnología de IA para personalizar el aprendizaje de cada individuo.</p>

        <div class="grid">
            <article class="card">
                <h3>Educación Accesible</h3>
                <p>Hacemos que el aprendizaje de alta calidad esté disponible para todos, sin importar ubicación geográfica o recursos económicos.</p>
            </article>
            <article class="card">
                <h3>Innovación Tecnológica</h3>
                <p>Utilizamos IA, VR y gamificación para crear experiencias de aprendizaje inmersivas y efectivas.</p>
            </article>
            <article class="card">
                <h3>Aprendizaje Personalizado</h3>
                <p>Adaptamos el contenido a las necesidades individuales de cada estudiante, maximizando su potencial.</p>
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