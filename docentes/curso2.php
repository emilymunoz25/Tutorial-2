<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'docente'){
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'curso2';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso 2 | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Curso 2 - Planificación pedagógica</h1>
            <p>Organiza objetivos, metodología y evaluaciones dentro de un formato fácil de usar.</p>
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
        <h1>Plan de curso avanzado</h1>
        <form action="#" method="post">
            <div class="form-grid">
                <div>
                    <label for="unidad">Unidad temática</label>
                    <input type="text" id="unidad" name="unidad" placeholder="Fundamentos de la comunicación" required>
                </div>
                <div>
                    <label for="duracionUnidad">Duración estimada</label>
                    <input type="text" id="duracionUnidad" name="duracionUnidad" placeholder="4 semanas / 24 horas">
                </div>
                <div>
                    <label for="publicoObjetivo">Público objetivo</label>
                    <input type="text" id="publicoObjetivo" name="publicoObjetivo" placeholder="Estudiantes de grado 10">
                </div>
                <div>
                    <label for="modalidadPlan">Modalidad de enseñanza</label>
                    <select id="modalidadPlan" name="modalidadPlan">
                        <option value="">Selecciona</option>
                        <option>Presencial</option>
                        <option>Virtual</option>
                        <option>Híbrida</option>
                    </select>
                </div>
            </div>

            <div class="form-block">
                <label for="objetivos">Objetivos de aprendizaje</label>
                <textarea id="objetivos" name="objetivos" rows="4" placeholder="Define los resultados de aprendizaje que los estudiantes deben alcanzar."></textarea>
            </div>

            <div class="form-block">
                <label for="metodologiaCurso2">Metodología</label>
                <textarea id="metodologiaCurso2" name="metodologiaCurso2" rows="4" placeholder="Describe la estrategia didáctica, actividades y recursos."></textarea>
            </div>

            <div class="form-grid">
                <div>
                    <label for="evaluacion">Evaluación</label>
                    <select id="evaluacion" name="evaluacion">
                        <option value="">Selecciona</option>
                        <option>Pruebas formales</option>
                        <option>Trabajo colaborativo</option>
                        <option>Portafolio</option>
                        <option>Autoevaluación</option>
                    </select>
                </div>
                <div>
                    <label for="recursosPlan">Materiales clave</label>
                    <input type="text" id="recursosPlan" name="recursosPlan" placeholder="Guías, videos, lecturas, laboratorios">
                </div>
            </div>

            <div class="form-block">
                <label for="cronograma">Cronograma</label>
                <textarea id="cronograma" name="cronograma" rows="4" placeholder="Describe la secuencia de sesiones y entregables."></textarea>
            </div>

            <div>
                <button type="submit">Guardar el plan</button>
                <input type="reset" value="Borrar contenido">
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




