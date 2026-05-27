<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'docente'){
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'curso1';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso 1 | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Curso 1</h1>
            <p>Diseña tu curso con contenido estructurado y recursos actualizados.</p>
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
        <h1>Ficha del curso</h1>
        <form action="#" method="post">
            <div class="form-grid">
                <div>
                    <label for="nombreCurso">Nombre del curso</label>
                    <input type="text" id="nombreCurso" name="nombreCurso" placeholder="Introducción a la programación" required>
                </div>
                <div>
                    <label for="codigoCurso">Código del curso</label>
                    <input type="text" id="codigoCurso" name="codigoCurso" placeholder="DOC-101">
                </div>
                <div>
                    <label for="categoria">Categoría</label>
                    <input type="text" id="categoria" name="categoria" placeholder="Tecnología, Ciencias Sociales">
                </div>
                <div>
                    <label for="nivelCurso">Nivel</label>
                    <select id="nivelCurso" name="nivelCurso">
                        <option value="">Selecciona</option>
                        <option>Básico</option>
                        <option>Intermedio</option>
                        <option>Avanzado</option>
                    </select>
                </div>
            </div>

            <div class="form-grid">
                <div>
                    <label for="duracion">Duración</label>
                    <input type="text" id="duracion" name="duracion" placeholder="12 semanas / 48 horas">
                </div>
                <div>
                    <label for="modalidadCurso">Modalidad</label>
                    <select id="modalidadCurso" name="modalidadCurso">
                        <option value="">Selecciona</option>
                        <option>Presencial</option>
                        <option>Virtual</option>
                        <option>Híbrida</option>
                    </select>
                </div>
                <div>
                    <label for="cupo">Cupo</label>
                    <input type="number" id="cupo" name="cupo" min="1" max="200" placeholder="30">
                </div>
                <div>
                    <label for="inicioCurso">Fecha de inicio</label>
                    <input type="date" id="inicioCurso" name="inicioCurso">
                </div>
            </div>

            <div class="form-block">
                <label for="objetivoCurso">Objetivo del curso</label>
                <textarea id="objetivoCurso" name="objetivoCurso" rows="4" placeholder="Describe el propósito y los aprendizajes esperados."></textarea>
            </div>

            <div class="form-block">
                <label for="recursos">Recursos y enlaces</label>
                <textarea id="recursos" name="recursos" rows="4" placeholder="Incluye enlaces a videos, presentaciones y documentos de apoyo."></textarea>
            </div>

            <div>
                <button type="submit">Guardar curso</button>
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




