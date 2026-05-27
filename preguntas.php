<?php $activePage = 'faq'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | TutorVideos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="./img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Preguntas Frecuentes</h1>
            <p>Resolvemos tus dudas sobre TutorVideos y nuestros cursos.</p>
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
        <h1>¿Tienes preguntas?</h1>
        <p>Aquí encontrarás respuestas a las consultas más comunes sobre nuestra plataforma.</p>

        <div class="faq-grid">
            <article class="card">
                <h3>¿Cómo me registro en TutorVideos?</h3>
                <p>Haz clic en "Login" y selecciona "Crear cuenta". Completa tus datos y verifica tu email para comenzar.</p>
            </article>
            <article class="card">
                <h3>¿Los cursos son gratuitos?</h3>
                <p>Ofrecemos cursos gratuitos introductorios. Los cursos avanzados requieren una suscripción mensual de $9.99.</p>
            </article>
            <article class="card">
                <h3>¿Puedo acceder desde móvil?</h3>
                <p>Sí, nuestra plataforma es totalmente responsive y compatible con dispositivos móviles y tablets.</p>
            </article>
            <article class="card">
                <h3>¿Cómo obtengo mi certificado?</h3>
                <p>Completa el 100% del curso y supera las evaluaciones. El certificado se descarga automáticamente.</p>
            </article>
            <article class="card">
                <h3>¿Hay soporte técnico?</h3>
                <p>Contamos con chat en vivo, email y foros de comunidad para resolver cualquier problema técnico.</p>
            </article>
            <article class="card">
                <h3>¿Puedo cancelar mi suscripción?</h3>
                <p>Sí, puedes cancelar en cualquier momento desde tu panel de usuario sin penalizaciones.</p>
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