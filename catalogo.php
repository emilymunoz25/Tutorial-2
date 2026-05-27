<?php $activePage = 'catalogo'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo | TutorVideos</title>
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <header>

        <div class="confirm-row">
            <img src="./img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Catálogo de Cursos</h1>
            <p>Explora nuestra amplia selección de cursos tutoriales en video.</p>
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
        <h1>Cursos Disponibles</h1>
        <p>Desde fundamentos hasta temas avanzados, encuentra el curso perfecto para tu aprendizaje.</p>

        <div class="grid">
            <article class="card">
                <span class="tag">Matemáticas</span>
                <h3>Álgebra Lineal con Aplicaciones</h3>
                <p>Domina matrices, vectores y sus aplicaciones en ciencia de datos y machine learning.</p>
                <a class="btn" href="#">Ver curso</a>
            </article>
            <article class="card">
                <span class="tag">Programación</span>
                <h3>Python para Ciencia de Datos</h3>
                <p>Aprende Python desde cero hasta análisis de datos con pandas y numpy.</p>
                <a class="btn" href="#">Ver curso</a>
            </article>
            <article class="card">
                <span class="tag">IA</span>
                <h3>Introducción a Machine Learning</h3>
                <p>Conceptos básicos de ML, algoritmos supervisados y no supervisados.</p>
                <a class="btn" href="#">Ver curso</a>
            </article>
            <article class="card">
                <span class="tag">Bases de Datos</span>
                <h3>SQL Avanzado</h3>
                <p>Optimización de consultas, índices y diseño de bases de datos relacionales.</p>
                <a class="btn" href="#">Ver curso</a>
            </article>
            <article class="card">
                <span class="tag">Ciencias</span>
                <h3>Física Cuántica para Principiantes</h3>
                <p>Explora los fundamentos de la mecánica cuántica con simulaciones interactivas.</p>
                <a class="btn" href="#">Ver curso</a>
            </article>
            <article class="card">
                <span class="tag">Idiomas</span>
                <h3>Inglés Técnico para IT</h3>
                <p>Vocabulario especializado en tecnología de la información y comunicación.</p>
                <a class="btn" href="#">Ver curso</a>
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