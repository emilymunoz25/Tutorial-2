<?php $activePage = 'ejemplos'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos | TutorVideos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="./img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Ejemplos de Cursos</h1>
            <p>Ve previews y demos de nuestros videos tutoriales interactivos.</p>
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
        <h1>Prueba nuestros cursos</h1>
        <p>Mira ejemplos gratuitos de nuestros videos tutoriales para conocer la calidad de nuestro contenido.</p>

        <div class="grid">
            <article class="card">
                <h3>Demo: Introducción a Python</h3>
                <p>Video de 5 minutos mostrando variables, bucles y funciones básicas.</p>
                <a class="btn" href="#">Ver demo</a>
            </article>
            <article class="card">
                <h3>Ejemplo: Algoritmos de ML</h3>
                <p>Preview de regresión lineal con visualizaciones interactivas.</p>
                <a class="btn" href="#">Ver ejemplo</a>
            </article>
            <article class="card">
                <h3>Tutorial: SQL Queries</h3>
                <p>Demo de consultas JOIN y subqueries con base de datos real.</p>
                <a class="btn" href="#">Ver tutorial</a>
            </article>
            <article class="card">
                <h3>Simulación: Física Cuántica</h3>
                <p>Ejemplo de experimento de doble rendija con animaciones 3D.</p>
                <a class="btn" href="#">Ver simulación</a>
            </article>
        </div>

        <div class="cta">
            <p>¿Te gustaron los ejemplos? <a href="verificacion.php">Regístrate gratis</a> para acceder a cursos completos.</p>
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