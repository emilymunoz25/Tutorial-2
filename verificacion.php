<?php
session_start();
$activePage = 'login';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TutorVideos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="./img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Iniciar Sesión</h1>
            <p>Accede a tu cuenta para continuar aprendiendo.</p>
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
        <h1>Acceso a TutorVideos</h1>
        <form action="verificacion.php" method="post">
            <div class="form-grid">
                <div>
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" placeholder="tu@email.com" required>
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
            </div>

            <div>
                <button type="submit" name="enviar">Iniciar Sesión</button>
            </div>

            <div class="form-links">
                <a href="#">¿Olvidaste tu contraseña?</a>
                <a href="#">Crear cuenta nueva</a>
            </div>
        </form>

        <div class="login-options">
            <p>O inicia sesión con:</p>
            <div class="social-login">
                <button class="btn">Google</button>
                <button class="btn">Facebook</button>
                <button class="btn">GitHub</button>
            </div>
        </div>
    </section>

    <?php

    $usuarios = [
        ['email' => 'docente1@tutorvideos.com', 'password' => '123', 'role' => 'docente'],
        ['email' => 'admin1@tutorvideos.com', 'password' => '123', 'role' => 'admin'],
        ['email' => 'invitado1@tutorvideos.com', 'password' => '123', 'role' => 'invitado']
    ];

    if(isset($_POST['enviar'])){
        $login = $_POST['email'];  
        $password = $_POST['password'];
        $usuario_valido = null;
        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $login && $usuario['password'] === $password) {
                $usuario_valido = $usuario;
                break;
            }
        }

        if ($usuario_valido) {
            $_SESSION['email'] = $login;
            $_SESSION['role'] = $usuario_valido['role'];
            if ($usuario_valido['role'] === 'docente') {
                header("Location: docentes/homedocente.php");
                exit();
            } elseif ($usuario_valido['role'] === 'admin') {
                header("Location: administrador/admin.php");
                exit();
            } elseif ($usuario_valido['role'] === 'invitado'){
                header("Location: home.php");
                exit();
            }
        } else {
            echo "<p>Credenciales incorrectas. Por favor, inténtalo de nuevo.</p>";
        }
    }
    ?>

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