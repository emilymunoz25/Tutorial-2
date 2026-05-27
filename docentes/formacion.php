<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'docente'){
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'formacion';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formación Docente | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Formación académica</h1>
            <p>Registra tus títulos, instituciones y especialidades para tu hoja de vida docente.</p>
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
        <h1>Registrar formación</h1>
        <form action="#" method="post">
            <div class="form-grid">
                <div>
                    <label for="titulo">Título profesional</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Licenciatura en Matemáticas" required>
                </div>
                <div>
                    <label for="institucion">Institución</label>
                    <input type="text" id="institucion" name="institucion" placeholder="Universidad del Cauca" required>
                </div>
                <div>
                    <label for="especialidad">Especialidad</label>
                    <input type="text" id="especialidad" name="especialidad" placeholder="Educación STEM">
                </div>
                <div>
                    <label for="modalidad">Modalidad</label>
                    <select id="modalidad" name="modalidad">
                        <option value="">Selecciona</option>
                        <option>Presencial</option>
                        <option>Virtual</option>
                        <option>Híbrida</option>
                    </select>
                </div>
            </div>

            <div class="form-grid">
                <div>
                    <label for="inicio">Año de inicio</label>
                    <input type="number" id="inicio" name="inicio" min="1900" max="2030" placeholder="2016">
                </div>
                <div>
                    <label for="fin">Año de finalización</label>
                    <input type="number" id="fin" name="fin" min="1900" max="2030" placeholder="2020">
                </div>
                <div>
                    <label for="nivel">Nivel de formación</label>
                    <select id="nivel" name="nivel">
                        <option value="">Selecciona</option>
                        <option>Pregrado</option>
                        <option>Especialización</option>
                        <option>Maestría</option>
                        <option>Doctorado</option>
                        <option>Curso corto</option>
                    </select>
                </div>
                <div>
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado">
                        <option value="">Selecciona</option>
                        <option>Completado</option>
                        <option>En curso</option>
                        <option>Planeado</option>
                    </select>
                </div>
            </div>

            <div class="form-block">
                <label for="observaciones">Observaciones adicionales</label>
                <textarea id="observaciones" name="observaciones" rows="5" placeholder="Indica logros, certificaciones digitales y proyectos pedagógicos relevantes."></textarea>
            </div>

            <div>
                <button type="submit">Guardar formación</button>
                <input type="reset" value="Limpiar formulario">
            </div>
        </form>
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




