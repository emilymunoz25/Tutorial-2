<?php
session_start();
$activePage = 'cerrar';
if(isset($_POST['confirmar'])){
    session_destroy();
    header("Location: verificacion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar Sesión | TutorVideos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <header>
        <div class="confirm-row">
            <img src="./img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Cerrar Sesión</h1>
            <p>¿Estás seguro de que quieres salir de tu cuenta?</p>  
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
        <h1>Confirmación de Cierre de Sesión</h1>
        <p>Al cerrar sesión, perderás acceso temporal a tu cuenta. Tus datos estarán seguros y podrás volver a iniciar sesión en cualquier momento.</p>

        <form action="#" method="post">
            <div class="form-block">
                <p><strong>¿Realmente deseas cerrar sesión?</strong></p>
                <div>
                    <button type="submit" name="confirmar" value="si">Sí, cerrar sesión</button>
                    <a href="home.php" class="btn">No, volver al inicio</a>
                </div>
            </div>
        </form>

        <div class="info">
            <h3>¿Qué sucede al cerrar sesión?</h3>
            <ul>
                <li>Se termina tu sesión actual de forma segura</li>
                <li>Tus datos personales permanecen guardados</li>
                <li>Podrás acceder nuevamente con tu usuario y contraseña</li>
                <li>Tu progreso en cursos se guarda automáticamente</li>
            </ul>
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